<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OxygenController extends AbstractController
{
    /**
     * @Route("/oxygen", name="oxygen")
     */
    public function index(): Response
    {
        return $this->render('oxygen/index.html.twig', [
            'controller_name' => 'OxygenController',
        ]);
    }
}
