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
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\CallbackTransformer;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'First Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter first name'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'First name is required']),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'First name must be at least {{ limit }} characters long',
                        'maxMessage' => 'First name cannot be longer than {{ limit }} characters'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z\s\-]+$/',
                        'message' => 'First name can only contain letters, spaces, and hyphens'
                    ])
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Last Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter last name'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Last name is required']),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Last name must be at least {{ limit }} characters long',
                        'maxMessage' => 'Last name cannot be longer than {{ limit }} characters'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z\s\-]+$/',
                        'message' => 'Last name can only contain letters, spaces, and hyphens'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter email address'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Email is required']),
                    new Length([
                        'max' => 180,
                        'maxMessage' => 'Email cannot be longer than {{ limit }} characters'
                    ])
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
                'required' => $options['is_new'],
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => $options['is_new'] ? 'Enter password' : 'Leave blank to keep current password'
                ],
                'constraints' => $options['is_new'] ? [
                    new NotBlank(['message' => 'Password is required']),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Password must be at least {{ limit }} characters long'
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                        'message' => 'Password must include at least one uppercase letter, one lowercase letter, and one number'
                    ])
                ] : []
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
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'nom',
                'label' => 'Team',
                'required' => false,
                'placeholder' => 'Select a team',
                'attr' => ['class' => 'form-control']
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
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'YYYY-MM-DD'
                ],
                'html5' => false,
                'input' => 'datetime_immutable'
            ])
            ->add('coachinglicense', TextType::class, [
                'label' => 'Coaching License',
                'required' => false,
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_new' => false,
            'attr' => ['novalidate' => 'novalidate'],
            ]);
    }
} 