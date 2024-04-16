<?php

namespace App\Form;

use App\Entity\Facture;
use App\Entity\Livraison;
use Doctrine\ORM\EntityRepository; // Importez EntityRepository
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType; // Importez DateType
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FactureFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('Remise')
        ->add('MontantAvecRemise')
        ->add('dateFacture', DateType::class, [
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
        ])
        ->add('Livraison', EntityType::class, [
            'class' => Livraison::class,
            'choice_label' => function (Livraison $livraison) {
                return sprintf('%s - %s - %s - %s',
                    $livraison->getNomprenomclient(),
                    $livraison->getPrix(),
                    $livraison->getDate()->format('Y-m-d'),
                    $livraison->getQuantity()
                );
            },
            'placeholder' => 'Sélectionnez une livraison',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('l')
                    ->orderBy('l.id', 'ASC');
            },
        ])
        ->add('Add', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary font-weight-bold mt-3',
            ],
        ]);
}}
            
