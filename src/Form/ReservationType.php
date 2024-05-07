<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Evenement;
use App\Entity\Utilisateurs;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomReservation')
            ->add('NbPlace')
           // ->add('Etat')
           ->add('Etat', ChoiceType::class, [
            'choices' => [
                'Handicapé' => 'handicape',
                'Aveugle' => 'aveugle',
                'Normal' => 'normal',
            ],
            'label' => 'Etat'
        ])
            ->add('resdate')
          //  ->add('Evenement')
          ->add('user', EntityType::class, [
            'class' => Utilisateurs::class,
            'choice_label' => 'pseudo',
            'label' => 'Utilisateurs'
        ])
          // ->add('user')
          ->add('Evenement', EntityType::class, [
            'class' => Evenement::class,
            'choice_label' => 'NomEvent',
            'label' => 'Event Name'
        ]);
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
