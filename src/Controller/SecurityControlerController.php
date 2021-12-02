<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityControlerController extends AbstractController
{
    #[Route('/security/login', name:'security_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        //$error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security_controler/login.html.twig', [
            'controller_name' => 'SecurityControlerController',
            // 'last_username' => $lastUsername
           //'error'         => $error,
        ]);
    }
    #[Route('/security/logout', name:'security_logout')]
    public function logout(): Response
    {

    }

    #[Route('/', name: 'home_page')]
    public function home_page(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'SecurityControlerController',
        ]);
    }
}
