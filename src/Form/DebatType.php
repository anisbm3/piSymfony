<?php

namespace App\Form;

use App\Entity\Debat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;

class DebatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('SujetDebat')
            ->add('DescriptionDebat')
            ->add('NomAnime')
            ->add('NoteAnime')
            ->add('User', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'label' => 'User'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Debat::class,
        ]);
    }
}
