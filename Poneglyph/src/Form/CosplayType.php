<?php

namespace App\Form;

use App\Entity\Cosplay;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;
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
            'required' => false, 
            'mapped' => false,
            'constraints' => [
                new Assert\Image([
                    'maxSize' => '5M', // Adjust the maximum file size as needed
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                        // Add more allowed mime types if necessary
                    ],
                    'mimeTypesMessage' => 'Please upload a valid image file (JPEG or PNG).',
                ]),
            ],
        ])
        
        ->add('datecreation', DateTimeType::class, [
            'label' => 'Date de création',
            
                
        ])
           // ->add('nomma')
           ->add('idmateriaux', null, [
            'label' => 'Matériaux',
        ])
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
