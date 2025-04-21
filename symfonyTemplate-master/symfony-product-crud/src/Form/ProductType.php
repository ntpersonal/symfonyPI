<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameproduct', TextType::class, [
                'label' => 'Product Name',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('priceproduct', NumberType::class, [
                'label' => 'Price',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('stock', TextType::class, [
                'label' => 'Stock',
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('category', TextType::class, [
                'label' => 'Category',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('image', FileType::class, [
                'label' => 'Product Image',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}