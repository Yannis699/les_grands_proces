<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Question;
use App\Form\CommentType;
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
    public function show(Request $request, Question $question, EntityManagerInterface $em): Response
    {
        $comment = new Comment();
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        if($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setCreatedAt(new \DateTimeImmutable);
            $comment->setRating(0);
            $comment->setQuestion($question);
            $question->setAnswers($question->getAnswers() + 1);
            $em->persist($comment);
            $em->flush();
            $this->addFlash('success', 'Votre réponse a bien été enregistrée');
            return $this->redirect($request->getUri());
        }
        return $this->render('question/show.html.twig', [
            'question' => $question,
            'comment_form' => $commentForm->createView() 
        ]);
    }
}
