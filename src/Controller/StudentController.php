<?php

namespace App\Controller;

use App\Services\ListeStudent;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    #[Route('/student/add_student', name:'add_student')]
    public function add_student(): Response
    {
        return $this->render('student/add_student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/student/inscription_student', name:'inscription_student')]
    public function inscription_student(): Response
    {
        return $this->render('student/inscription_student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/student/import_list_student', name:'import_list_student')]
    public function import_list_student(): Response
    {
        return $this->render('student/import_list_student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/student/list_student', name:'list_student')]
    public function list_student(ListeStudent $listeStudent): Response
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Student List');

        $sheet->getCell('A1')->setValue('Matricule');
        $sheet->getCell('B1')->setValue('Nom');
        $sheet->getCell('C1')->setValue('Niveau');
        $sheet->getCell('D1')->setValue('Parcours');
        $sheet->getCell('E1')->setValue('Phone');
        $sheet->getCell('F1')->setValue('Email');
        $sheet->getCell('G1')->setValue('Sexe');
        $sheet->getCell('H1')->setValue('Naissance');
        // Increase row cursor after header write
        $sheet->fromArray($listeStudent->getData(),null, 'A2', true);
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('helloworld.xlsx');

        return $this->render('student/list_student.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
}
