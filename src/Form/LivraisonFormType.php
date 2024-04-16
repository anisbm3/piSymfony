<?php

namespace App\Form;

use App\Entity\Livraison;
use App\Entity\Panier; // Ajout de l'import pour Panier
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Ajout de l'import pour EntityType

class LivraisonFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomPrenomClient', TextType::class)
            ->add('Adresse', TextType::class)
            ->add('quantity')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('panier', EntityType::class, [
                'class' => Panier::class,
                'choice_label' => 'price',
                'label' => 'Select prix:',
            ])
        
        ->add('Add', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary font-weight-bold mt-3',
            ],
        ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livraison::class,
        ]);
    }
}
