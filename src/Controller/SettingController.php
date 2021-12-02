<?php

namespace App\Controller;

use App\Entity\AnneeCourante;
use App\Form\ParametreAnneeFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SettingController extends AbstractController
{
    #[Route('/setting/year', name: 'setting_year')]
    public function setting(Request $request): Response
    {
        $anneeCourante = new AnneeCourante();
        $form = $this->createForm(ParametreAnneeFormType::class, $anneeCourante);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
            {
                // récupération de valeur du formulare
                $anneeDebut = $form->get('anneeDebut')->getData();
                $anneeFin = $form->get('anneeFin')->getData();
                // Mise à jour de valeur 
                $entityManager = $this->getDoctrine()->getManager();
                $anneeUniversitaire = $entityManager->getRepository(AnneeCourante::class)->find(4);
                $anneeUniversitaire->setAnneeDebut($anneeDebut);
                $anneeUniversitaire->setAnneeFin($anneeFin);
                $entityManager->flush();
                $this->addFlash('success', 'Mise à jour de l\'année universitaire avec succès!');
            }

        return $this->render('setting/year.html.twig', [
            'controller_name' => 'SettingController',
            'formAnneeCourante' => $form->createView(),
        ]);
    }
}
