<?php

namespace App\Form;

use App\Entity\Cosplay;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CosplayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomcp')
            ->add('descriptioncp')
            ->add('personnage')
            ->add('imagecp')
            ->add('datecreation', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // ou un autre format de date approprié
            ])
           // ->add('nomma')
            ->add('idmateriaux')
            ->add('userid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cosplay::class,
        ]);
    }
}
