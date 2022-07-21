<?php

namespace App\Controller;

use id;
use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class QuestionController extends AbstractController
{
    #[Route('/question/ask', name: 'question_form')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {   
        
        $question = new Question();
        $formQuestion = $this->createForm(QuestionType::class, $question);

        $formQuestion->handleRequest($request);

        if($formQuestion->isSubmitted()&& $formQuestion->isValid()) {
           $question->setAnswers(0);
           $question->setRating(0);
           $question->setCreatedAt(new \DateTimeImmutable());
           $em->persist($question);
           $em->flush();
           $this->addFlash('success', 'Votre question a bien été soumise');
           
           return $this->redirectToRoute('home');
        }

        return $this->render('question/index.html.twig', [
            'form_ask_question' => $formQuestion->createView(),
        ]);
    }

    #[Route('/question/{id}', name: 'question_show')]
    public function show(Request $request, string $id): Response
    {
        $question = [
            
                'title' => 'Ceci est ma question 2', 
                'content' => 'test content 3',
                'upvotes' => 23, 
                'author' => [
                    'name' => 'Yannis Cristini', 
                    'avatar' => 'https://randomuser.me/api/portraits/men/79.jpg'
                ],
                'answers' => 18
            
        ];

        return $this->render('question/show.html.twig', [
            'question' => $question
        ]);
    }
}
