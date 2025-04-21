<?php

namespace App\Form;

use App\Entity\Order;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Panier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idUser', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name', // Use the new getName() method
                'attr' => ['class' => 'form-control'],
                'label' => 'User'
            ])
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'choice_label' => 'nameproduct', // Assuming the Product entity has a 'nameproduct' field
                'attr' => ['class' => 'form-control'],
                'label' => 'Product'
            ])
            ->add('panier', EntityType::class, [
                'class' => Panier::class,
                'choice_label' => 'id', // Assuming the Panier entity uses 'id' as a unique identifier
                'attr' => ['class' => 'form-control'],
                'label' => 'Panier'
            ])
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label' => 'Order Date'
            ])
            ->add('quantityOrder', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Quantity'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
