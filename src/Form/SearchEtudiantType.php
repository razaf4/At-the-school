<?php

namespace App\Form;

use App\Entity\Niveau;
use App\Entity\Parcours;
use App\Entity\ListeEtudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchEtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idAuD',ChoiceType::class,[
                'label'=>'Année-Universitaire',
                'choices' => [
                    '2015'=> '2015',
                    '2016'=> '2016',
                    '2017'=> '2017',
                    '2018'=> '2018',
                    '2019'=> '2019',
                    '2020'=> '2020',
                    '2021'=> '2021',
                    '2022'=> '2022',
                    '2023'=> '2023',
                    '2024'=> '2024',
                    '2025'=> '2025',
                    '2026'=> '2026',
                    '2027'=> '2027',
                    '2028'=> '2028',
                    '2029'=> '2029',
                    '2030'=> '2030',
                    ]
            ])
            ->add('idAuF',ChoiceType::class,[
                'label'=>'-',
                'choices' => [
                    '2015'=> '2015',
                    '2016'=> '2016',
                    '2017'=> '2017',
                    '2018'=> '2018',
                    '2019'=> '2019',
                    '2020'=> '2020',
                    '2021'=> '2021',
                    '2022'=> '2022',
                    '2023'=> '2023',
                    '2024'=> '2024',
                    '2025'=> '2025',
                    '2026'=> '2026',
                    '2027'=> '2027',
                    '2028'=> '2028',
                    '2029'=> '2029',
                    '2030'=> '2030',
                    ]
            ])
            ->add('idNiveau',EntityType::class, [
                'class' => Niveau::class,
                'choice_label' => 'libelleNiveau'
            ])
            ->add('idParcours',EntityType::class, [
                'class' => Parcours::class,
                'choice_label' => 'libelleParcours'
            ])
            ->add('idGroupe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListeEtudiant::class,
        ]);
    }
}
