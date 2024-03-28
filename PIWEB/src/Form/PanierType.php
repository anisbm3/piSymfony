<?php

namespace App\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;
use App\Entity\Panier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;

class PanierType extends AbstractType
{   private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('prod_name', TextType::class, [
                'label' => 'Nom du produit',
                'data' => $options['nom_produit'],
                'attr' => ['readonly' => true]
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Quantite',
                'data' => $options['quantity'],
                'attr' => ['readonly' => true]
            ] )
            ->add('price', NumberType::class, [
                'label' => 'Price',
                'data' => $options['prix_produit'],
                'attr' => ['readonly' => true], 
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'data' => new \DateTime(), 
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => ['readonly' => true]
            ])
            ->add('panier_id')
            ->add('User', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'label' => 'User',
                'data' => $this->entityManager->getReference(User::class, 1), // Récupère l'utilisateur avec l'ID 1 depuis la base de données
                'attr' => ['readonly' => true],
            ]);   
            ;
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($options) {
                $form = $event->getForm();
                $data = $event->getData();
              
                if ($data instanceof Panier && null !== $data->getQuantity() && isset($options['prix_produit'])) {
                    $quantity = $data->getQuantity();
                    $initialPrice = $options['prix_produit'];
                    $newPrice = $quantity * $initialPrice;
    
                    // Set the new price value to the price field
                    $form->get('price')->setData(12);
                }
            });
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panier::class,
            'nom_produit' => null,
            'prix_produit' => null,
            'quantity' => null, // Définir l'option "quantity" avec une valeur par défaut

        ]);
    }
}