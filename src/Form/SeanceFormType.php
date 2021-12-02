<?php

namespace App\Form;

use App\Entity\Seance;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class SeanceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idMatiere')
            ->add('idNiveau')
            ->add('idParcours')
            ->add('dateSeance', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ])
            ->add('heureDebut', TimeType::class,[
                // 'input'  => 'datetime',
                'widget' => 'single_text',
            ])
            ->add('heureFin', TimeType::class,[
                'widget' => 'single_text',
            ]);
        // pour test
        $builder->addEventListener(FormEvents::PRE_SUBMIT,function (FormEvent $event) {
            
            // $idMatiere = $form->get('idMatiere')->getData();
            $product = $event->getData();
            $form = $event->getForm();
                
            // if($product != null){
            //         $form->add('colonneTeste', TextType::class);
            //     }
                if (!$product) {
                    return;
                }
                if (isset($product['idMatiere']) && $product['idMatiere']) {
                    $form->add('colonneTeste', TextType::class);
                } else {
                    unset($product['colonneTeste']);
                    $event->setData($product);
                }
            });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
        ]);
    }
}
?>
<script>
    $(document).ready(function(){
    //alert(" This a form");
//iam just testing if i am accessing to it's value or not
})
</script>
