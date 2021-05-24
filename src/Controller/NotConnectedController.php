<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotConnectedController extends AbstractController
{
    #[Route('/not/connected', name: 'not_connected')]
    public function index(): Response
    {
        return $this->render('not_connected/index.html.twig', [
            'controller_name' => 'NotConnectedController',
        ]);
    }
}
