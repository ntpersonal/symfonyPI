<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\When;
use Symfony\Component\Form\CallbackTransformer;

class AddUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'First Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter first name'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Last Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter last name'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter email address'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter password'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Password is required']),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Password must be at least {{ limit }} characters long'
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                        'message' => 'Password must include at least one uppercase letter, one lowercase letter, and one number'
                    ])
                ]
            ])
            ->add('role', ChoiceType::class, [
                'label' => 'Role',
                'choices' => [
                    'Admin' => 'Admin',
                    'Organizer' => 'organizer',
                    'Player' => 'player'
                ],
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'Role is required'])
                ]
            ])
            ->add('profilepicture', FileType::class, [
                'label' => 'Profile Picture',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file (JPEG, PNG, or GIF)',
                        'maxSizeMessage' => 'The file is too large. Maximum size allowed is {{ limit }} {{ suffix }}'
                    ])
                ]
            ])
            ->add('phonenumber', TextType::class, [
                'label' => 'Phone Number',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter phone number'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9+\s()-]{8,20}$/',
                        'message' => 'Please enter a valid phone number'
                    ])
                ]
            ])
            ->add('dateofbirth', DateType::class, [
                'label' => 'Date of Birth',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('is_active', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    'Active' => true,
                    'Inactive' => false
                ],
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check'],
                'constraints' => [
                    new NotBlank(['message' => 'Status is required'])
                ]
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'nom',
                'label' => 'Team',
                'required' => false,
                'placeholder' => 'Select a team',
                'attr' => ['class' => 'form-control']
            ])
            ->add('coachinglicense', TextType::class, [
                'label' => 'Coaching License',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter coaching license number'
                ],
                'constraints' => [
                    new When(
                        expression: 'this.getParent().get("role").getData() === "organizer"',
                        constraints: [
                            new NotBlank(['message' => 'Coaching license is required for organizers']),
                            new Length([
                                'min' => 5,
                                'max' => 20,
                                'minMessage' => 'License must be at least {{ limit }} characters long',
                                'maxMessage' => 'License cannot be longer than {{ limit }} characters'
                            ])
                        ]
                    )
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,'attr' => ['novalidate' => 'novalidate'],
        ]);
    }
} 