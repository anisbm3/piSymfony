<?php

namespace App\Form;

use App\Entity\Commentaire;
use App\Entity\Debat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;





class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Message')
            ->add('BLOCK')
            ->add('Debat', EntityType::class, [
                'class' => Debat::class,
                'choice_label' => 'SujetDebat',
                'label' => 'Debat Name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
