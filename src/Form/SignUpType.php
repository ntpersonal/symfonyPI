<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class SignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control rounded-pill',
                    'placeholder' => 'First Name',
                ],
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control rounded-pill',
                    'placeholder' => 'Last Name',
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control rounded-pill',
                    'placeholder' => 'Email',
                ],
            ])
            ->add('dateofbirth', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control rounded-pill',
                ],
            ])
            ->add('password', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control rounded-pill',
                    'placeholder' => 'Password',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Password is required.',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Password must be at least {{ limit }} characters.',
                    ]),
                ],
            ])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Select Role' => '',
                    'Player' => 'player',
                    'Organizer' => 'organizer',
                ],
                'attr' => [
                    'class' => 'form-control rounded-pill',
                ],
            ])
            ->add('coachinglicense', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control rounded-pill',
                    'placeholder' => 'Coaching License',
                ],
            ])
            ->add('profilePicture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'file-input',
                    'accept' => 'image/jpeg,image/png,image/gif',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file (JPEG, PNG, or GIF, max 2MB)',
                    ]),
                ],
            ]);

        // Add conditional validation for coaching license
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();
            
            if ($data['role'] === 'organizer') {
                $form = $event->getForm();
                $form->add('coachinglicense', TextType::class, [
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control rounded-pill',
                        'placeholder' => 'Coaching License',
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Coaching license is required for organizer.',
                        ]),
                        new Length([
                            'min' => 5,
                            'max' => 20,
                            'minMessage' => 'Coaching license must be at least {{ limit }} characters.',
                            'maxMessage' => 'Coaching license cannot be longer than {{ limit }} characters.',
                        ]),
                    ],
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
} 