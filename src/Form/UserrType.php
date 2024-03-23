<?php

namespace App\Form;

use App\Entity\Userr;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserrType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo')
            ->add('cin')
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('numTel')
            ->add('email')
            ->add('mdp')
            ->add('role')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Userr::class,
        ]);
    }
}
