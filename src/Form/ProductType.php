<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameproduct', TextType::class, [
                'label' => 'Product Name',
                'attr' => [
                    'class' => 'form-control',
                    'novalidate' => 'novalidate'
                ],
            ])
            ->add('priceproduct', IntegerType::class, [
                'label' => 'Price',
                'attr' => [
                    'class' => 'form-control',
                    'novalidate' => 'novalidate'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a price']),
                    new Positive(['message' => 'Price must be a positive number']),
                ],
            ])
            ->add('stock', ChoiceType::class, [
                'label' => 'Stock',
                'required' => true,
                'choices' => [
                    'Yes' => 'yes',
                    'Coming' => 'coming',
                    'No' => 'no',
                ],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('category', ChoiceType::class, [
                'label' => 'Category',
                'required' => true,
                'choices' => [
                    'Tournement' => 'tournement',
                    'Clothes' => 'clothes',
                    'Trophies' => 'trophies',
                ],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('image', FileType::class, [
                'label' => 'Product Image',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'ERROR: Only JPG, JPEG and PNG files are allowed!',
                    ])
                ],
            ])
            ->add('productdescription', TextareaType::class, [
                'label' => 'Product Description',
                'required' => false,
                'mapped' => true,  // Ensure this field is mapped to the entity
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 5,
                    'placeholder' => 'Enter product description or use the AI generator'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
