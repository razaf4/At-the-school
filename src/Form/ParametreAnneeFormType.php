<?php

namespace App\Form;

use App\Entity\AnneeCourante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ParametreAnneeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anneeDebut', ChoiceType::class, [
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
            ->add('anneeFin', ChoiceType::class, [
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnneeCourante::class,
        ]);
    }
}
