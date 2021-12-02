<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\ListeEtudiant;
use App\Form\EditEtudiantType;
use App\Services\ListeStudent;
use App\Form\ListeEtudiantType;
use App\Form\SearchEtudiantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    #[Route('/student/search_list_student', name:'search_list_student')]
    public function search_list_student(Request $request,RequestStack $requestStack): Response
    {
        $etudiant_search = new ListeEtudiant();
        $form = $this->createForm(SearchEtudiantType::class, $etudiant_search);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $idAuD = $form->get('idAuD')->getData();
            $idAuF = $form->get('idAuF')->getData();
            $idNiveau = $form->get('idNiveau')->getData();
            $idParcours = $form->get('idParcours')->getData();
            $idGroupe = $form->get('idGroupe')->getData();
            //insertion dans session
            $session = $requestStack->getSession();
                $session->set('AuD', $idAuD);
                $session->set('AuF', $idAuF );
                $session->set('Niveau', $idNiveau);
                $session->set('Parcours', $idParcours);
                $session->set('Groupe', $idGroupe);
            //tester la variable groupe
            if($idGroupe != null)
            {
                //faire la recherche
                $resultats = $this->getDoctrine()
                            ->getRepository(ListeEtudiant::class)
                            ->findByValueWithGroup($idAuD,$idAuF,$idNiveau,$idParcours,$idGroupe);
            }else{
                //faire la recherche sans groupe
                $resultats = $this->getDoctrine()
                            ->getRepository(ListeEtudiant::class)
                            ->findByValueWithoutGroup($idAuD,$idAuF,$idNiveau,$idParcours);
            }
                            return $this->render('student/search_list_student.html.twig', [
                                'controller_name' => 'StudentController',
                                'searchEtudiant' =>$form->createView(),
                                'resultats' =>$resultats
                            ]);
            
        }

        return $this->render('student/search_list_student.html.twig', [
            'controller_name' => 'StudentController',
            'searchEtudiant' =>$form->createView()
        ]);
    }

    #[Route('/student/add_student', name:'add_student')]
    public function add_student(): Response
    {
        return $this->render('student/add_student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/student/delete_student/{id}', name:'delete_student')]
    public function delete_student(ListeEtudiant $listeAsupprimer): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($listeAsupprimer);
        $em->flush();

        return $this->redirectToRoute('list_student');
    }

    #[Route('/student/edit_student/{id}', name:'edit_student')] //route pour l'edit
    public function edit_student(ListeEtudiant $listEdit=null, Request $request): Response
    {
        //pour l'edit des etudiants
        $form = $this->createForm(EditEtudiantType::class, $listEdit);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listEdit);
            $entityManager->flush();
            return $this->redirectToRoute('list_student');
        }
        return $this->render('student/edit_student.html.twig', [
            'controller_name' => 'StudentController',
             'formEditEtudiant' =>$form->createView()
        ]);
    }

    #[Route('/student/inscription_student', name:'inscription_student')]
    public function inscription_student(Request $request): Response
    {
        // $data = $request->getContent();
        // $data = json_decode($data);
        // if($data)
        //     {
        //         $matricule= $data->matricule;
        //         $nom= $data->nom;
        //         $niveau= $data->niveau;
        //         $parcours= $data->parcours;
        //         $phone= $data->phone;
        //         $email= $data->email;
        //         $sexe= $data->sexe;
        //         $naissance= $data->naissance;

        //         $etudiant = new Etudiant();
        //         $etudiant->setMatricule($matricule);
        //         $etudiant->setNom($nom);
        //         $etudiant->setNiveau($niveau);
        //         $etudiant->setParcours($parcours);
        //         $etudiant->setPhone($phone);
        //         $etudiant->setEmail($email);
        //         $etudiant->setSexe($sexe);
        //         $etudiant->setNaissance($naissance);
                
        //         $entityManager = $this->getDoctrine()->getManager();
        //         $entityManager->persist($etudiant);
        //         $entityManager->flush();

        //         return $this->redirectToRoute('list_student');
        //     }
        return $this->render('student/inscription_student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/student/import_list_student', name:'import_list_student')]
    public function import_list_student(Request $request, RequestStack $requestStack): Response
    {   
        $listEtudiant = new ListeEtudiant();
        $session = $requestStack->getSession();
        $form = $this->createForm(ListeEtudiantType::class, $listEtudiant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $idAuD = $form->get('idAuD')->getData();
            $idAuF = $form->get('idAuF')->getData();
            $idNiveau = $form->get('idNiveau')->getData();
            $idParcours = $form->get('idParcours')->getData();
            $idGroupe = $form->get('idGroupe')->getData();
            
            $file = $form->get('photo')->getData();
            if ($file) {
                $fileOpen = fopen($file, "r");
                fgetcsv($fileOpen);//L'ajout de cette ligne sautera la lecture de la première ligne du fichier csv et le processus de lecture commencera à partir de la deuxième ligne
                
                // Insertion de données à la session
                $session->set('AuD', $idAuD);
                $session->set('AuF', $idAuF );
                $session->set('Niveau', $idNiveau);
                $session->set('Parcours', $idParcours);
                $session->set('Groupe', $idGroupe);

                while (($column = fgetcsv($fileOpen, 10000, ";")) !== FALSE) 
                {
                    $matricule = $column[0];
                    $nom = $column[1];
                    $email = $column[2];
                    $phone = $column[3];
                    $dateNaissance = $column[4];
                    $photo = $column[5];

                    $etudiant = new ListeEtudiant();

                    $etudiant->setIdAuD($idAuD);
                    $etudiant->setIdAuF($idAuF);
                    $etudiant->setIdNiveau($idNiveau);
                    $etudiant->setIdParcours($idParcours);
                    $etudiant->setIdGroupe($idGroupe);
                    $etudiant->setMatricule($matricule);
                    $etudiant->setNom($nom);
                    $etudiant->setEmail($email);
                    $etudiant->setTelephone($phone);
                    $etudiant->setDateNaissance($dateNaissance);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($etudiant);
                    $entityManager->flush();

                }
                fclose($fileOpen);
                return $this->redirectToRoute('list_student');
            }
        }
          
        return $this->render('student/import_list_student.html.twig', [
            'controller_name' => 'StudentController',
            'form' => $form->createView()
        ]);
    }
    #[Route('/student/list_student', name:'list_student')] //route pour la liste des étudiants
    public function list_student(RequestStack $requestStack, ListeEtudiant $listEdit=null, Request $request): Response
    {
        //pour l'edit des etudiants
        $form = $this->createForm(EditEtudiantType::class, $listEdit);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listEdit);
            $entityManager->flush();
            return $this->redirectToRoute('list_student');
        }
        //pour la liste des étudiants
        $session = $requestStack->getSession();
        $AuD = $session->get('AuD');
        $AuF = $session->get('AuF');
        $Niveau = $session->get('Niveau');
        $Parcours = $session->get('Parcours');
        $Groupe = $session->get('Groupe');

         //tester la variable groupe
         if($Groupe != null)
         {
             //faire la recherche
             $liste_etudiants = $this->getDoctrine()
                         ->getRepository(ListeEtudiant::class)
                         ->findByValueWithGroup($AuD,$AuF,$Niveau,$Parcours,$Groupe);
         }else{
             //faire la recherche sans groupe
             $liste_etudiants = $this->getDoctrine()
                         ->getRepository(ListeEtudiant::class)
                         ->findByValueWithoutGroup($AuD,$AuF,$Niveau,$Parcours);
         }
         
        return $this->render('student/list_student.html.twig', [
            'controller_name' => 'StudentController',
             'liste_etudiants' => $liste_etudiants,
             'AuD' => $AuD,
             'AuF' => $AuF,
             'Niveau' => $Niveau,
             'Parcours' => $Parcours,
             'Groupe' => $Groupe,
             'formEditEtudiant' =>$form->createView()
        ]);
    }
}

// if(isset($_POST['Submit']))
// {
//     $fileName = $_FILES["file"]["tmp_name"];
//     if ($_FILES["file"]["size"] > 0) 
//     {
//         $file = fopen($fileName, "r");
//         fgetcsv($file);//L'ajout de cette ligne sautera la lecture de la première ligne du fichier csv et le processus de lecture commencera à partir de la deuxième ligne
//         while (($column = fgetcsv($file, 10000, ";")) !== FALSE) 
//         {
//              $annee1 = $_POST['annee1'];
//              $annee2 = $_POST['annee2'];
//              $niveau = $_POST['niveau'];
//              $parcours = $_POST['parcours'];

//             $matricule = $column[0];
//             $nom = $column[1];
//             $email = $column[2];
//             $phone = $column[3];
//             $dateNaissance = $column[4];
//             $photo = $column[5];

//             $etudiant = new ListeEtudiant();
//             $etudiant->setIdAuD('2014');
//             $etudiant->setIdAuF('2015');
//             // $etudiant->setIdNiveau(1);
//             // $etudiant->setIdParcours(1);
//             // $etudiant->setMatricule($matricule);
//             // $etudiant->setNom($nom);
//             // $etudiant->setEmail($email);
//             // $etudiant->setTelephone($phone);
//             // // $etudiant->setDateNaissance(new \Date());
//             // $etudiant->setPhoto($photo);

//             // $entityManager = $this->getDoctrine()->getManager();
//             //  $entityManager->persist($etudiant);
//             //  $entityManager->flush();
            
//             return $this->redirectToRoute('list_student');
                 
//        }fclose($file);
//     }else{echo "Auccun fichier ajouter";}
    
// }