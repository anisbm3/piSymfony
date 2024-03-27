<?php

namespace App\Form;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\Panier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('prod_name', TextType::class, [
            'label' => 'Nom du produit',
            'data' => $options['nom_produit'], // Initialiser le champ avec le nom du produit
            'attr' => ['readonly' => true] // Le rendre en lecture seule si nécessaire
        ])
            ->add('quantity')
            ->add('price')
            ->add('date')
            ->add('panier_id')
            ->add('User', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'label' => 'User'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panier::class,
            'nom_produit' => null, // Ajoutez cette option pour passer le nom du produit
        ]);
    }
}
