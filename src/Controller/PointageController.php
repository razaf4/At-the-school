<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Form\SeanceFormType;
use App\Entity\AnneeCourante;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PointageController extends AbstractController
{
    #[Route('/pointage/seance', name: 'pointage_seance')]
    public function seance(Request $request, RequestStack $requestStack): Response
    {
        $seance = new Seance();
        $form = $this->createForm(SeanceFormType::class, $seance);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            // récupération de la valeur du formulaire
            $idMatiere = $form->get('idMatiere')->getData();
            $idNiveau = $form->get('idNiveau')->getData();
            $idParcours = $form->get('idParcours')->getData();

            // insertion de variable global session
            $session = $requestStack->getSession();
            $session->set('Matiere', $idMatiere);
            $session->set('Niveau', $idNiveau );
            $session->set('Parcours', $idParcours);

            return $this->redirectToRoute('list_seance');
        }
        // recupération d'année universitaire courant
        $entityManager = $this->getDoctrine()->getManager();
        $anneeUniversitaire = $entityManager->getRepository(AnneeCourante::class)->find(4);
        $anneeDebut = $anneeUniversitaire->getAnneeDebut();
        $anneeFin = $anneeUniversitaire->getAnneeFin();

        return $this->render('pointage/seance.html.twig', [
            'controller_name' => 'PointageController',
            'formSeance' => $form->createView(),
            'anneeDebut' => $anneeDebut,
            'anneeFin' => $anneeFin,
        ]);
    }

    #[Route('/pointage/liste_seance', name: 'list_seance')]
    public function list_seance(Request $request, RequestStack $requestStack): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $anneeUniversitaire = $entityManager->getRepository(AnneeCourante::class)->find(4);
        $anneeDebut = $anneeUniversitaire->getAnneeDebut();
        $anneeFin = $anneeUniversitaire->getAnneeFin();
        // récupération du variable de session
        $session = $requestStack->getSession();
        $matiere = $session->get('Matiere');
        $niveau = $session->get('Niveau');
        $parcours = $session->get('Parcours');
        
        return $this->render('pointage/liste_seance.html.twig', [
            'controller_name' => 'PointageController',
            'anneeDebut' => $anneeDebut,
            'anneeFin' => $anneeFin,
            'matiere' => $matiere,
            'niveau' => $niveau,
            'parcours' => $parcours
        ]);
    }
}
