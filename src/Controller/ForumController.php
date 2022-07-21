<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ForumController extends AbstractController
{
    #[Route('/forum', name: 'forum')]
    public function index(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAll();

        return $this->render('forum/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
