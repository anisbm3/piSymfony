<?php

namespace App\Form;

use App\Entity\Cosplay;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class CosplayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nomcp', null, [
            'label' => 'Nom du Cosplay',
        ])
             ->add('descriptioncp', null, [
            'label' => 'Description du Cosplay',
        ])
        ->add('personnage', null, [
            'label' => 'Personnage',
        ])
        ->add('imagecp', FileType::class, [
            'label' => 'Image du Cosplay',
            'required' => true, 
            'mapped' => false,])
        ->add('datecreation', DateType::class, [
            'label' => 'Date de création',
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd', 
        ])
           // ->add('nomma')
           ->add('idmateriaux', null, [
            'label' => 'Matériaux',
        ]);
           // ->add('userid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cosplay::class,
        ]);
    }
}
