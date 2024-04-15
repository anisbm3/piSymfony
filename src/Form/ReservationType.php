<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Evenement;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('NomReservation')
        ->add('NbPlace')
        ->add('Etat', ChoiceType::class, [
            'choices' => [
                'Handicapé' => 'handicape',
                'Aveugle' => 'aveugle',
                'Normal' => 'normal',
            ],
            'label' => 'Etat'
        ])
        //->add('Etat')
        ->add('User', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'id',
            'label' => 'User'
        ])
        ->add('Evenement', EntityType::class, [
            'class' => Evenement::class,
            'choice_label' => 'NomEvent',
            'label' => 'Event Name'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }

}
