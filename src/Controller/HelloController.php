<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        ['message' => 'Hello', 'created' => '2022/11/26'],
        ['message' => 'Hi', 'created' => '2022/10/12'],
        ['message' => 'Bye!', 'created' => '2021/05/12'],
    ];

    #[Route('/{limit?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        // $message = implode(', ', array_slice($this->messages, 0, $limit)) . " world!";
        // $messages = array_slice($this->messages, 0, $limit);

        return $this->render(
            'hello/index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => $limit,
            ]
        );
    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne(int $id): Response
    {

        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->messages[$id]
            ]
        );

        // return new Response($this->messages[$id]);
    }
}
