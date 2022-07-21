<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    #[Route('/forum', name: 'app_forum')]
    public function index(): Response
    {
        $questions = [
            [
                'id' => '1',
                'title' => 'Pourquoi Landru a-t-il décidé de tuer ses femmes ? ', 
                'content' => 'Voici ma question je me demande, Voici ma question je me demandeVoici ma question je me demandeVoici ma question je me demandeVoici ma question je me demandeVoici ma question je me demandeVoici ma question je me demandeVoici ma question je me demandeVoici ma question je me demande',
                'upvotes' => 20, 
                'author' => [
                    'name' => 'Yannis Cristini', 
                    'avatar' => 'https://randomuser.me/api/portraits/men/76.jpg'
                ],
                'answers' => 15
            ],
            [
                'id' => '2',
                'title' => 'Ceci est ma question 2', 
                'content' => 'test content 2',
                'upvotes' => 25, 
                'author' => [
                    'name' => 'Yannis Cristini', 
                    'avatar' => 'https://randomuser.me/api/portraits/men/79.jpg'
                ],
                'answers' => 13

            ],
            [
                'id' => '3',
                'title' => 'Ceci est ma question 2', 
                'content' => 'test content 3',
                'upvotes' => 23, 
                'author' => [
                    'name' => 'Yannis Cristini', 
                    'avatar' => 'https://randomuser.me/api/portraits/men/79.jpg'
                ],
                'answers' => 18
            ],

        ];
        return $this->render('forum/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
