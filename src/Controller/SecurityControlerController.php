<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityControlerController extends AbstractController
{
    #[Route('/security/login', name:'security_login')]
    public function login(): Response
    {
        return $this->render('security_controler/login.html.twig', [
            'controller_name' => 'SecurityControlerController',
        ]);
    }

    #[Route('/', name: 'home_page')]
    public function home_page(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'SecurityControlerController',
        ]);
    }
}
