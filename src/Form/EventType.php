<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Nom de l\'événement',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le nom de l\'événement est obligatoire',
                    ]),
                    new Length([
                        'min' => 3,
                        'max' => 100,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 4],
                'label' => 'Description',
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description est obligatoire',
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'La description doit contenir au moins {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('maxParticipants', IntegerType::class, [
                'required' => false,
                'label' => 'Nombre maximum de participants',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le nombre maximum de participants doit être positif ou nul.'
                    ])
                ]
            ])
            ->add('status', ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'choices' => [
                    'Brouillon' => 'draft',
                    'Actif' => 'active',
                    'Complet' => 'full',
                    'Annulé' => 'cancelled',
                    'Terminé' => 'completed',
                ],
                'label' => 'Statut',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez sélectionner un statut',
                    ]),
                ],
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => function(User $user) {
                    return method_exists($user, 'getEmail') ? $user->getEmail() : $user->getId();
                },
                'attr' => ['class' => 'form-control'],
                'label' => 'Organisateur',
                'constraints' => [
                    new NotNull([
                        'message' => 'L\'organisateur est obligatoire',
                    ]),
                ],
            ]);

        // Vérifiez si les nouvelles propriétés existent avant de les ajouter au formulaire
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $formEvent) {
            $eventEntity = $formEvent->getData();
            $form = $formEvent->getForm();
            
            // Ajouter les propriétés uniquement si elles existent dans l'entité
            if ($eventEntity) {
                // Image
                if (property_exists(Event::class, 'image')) {
                    $form->add('imageFile', FileType::class, [
                        'mapped' => false,
                        'required' => false,
                        'label' => 'Image (affiche de l\'événement)',
                        'constraints' => [
                            new File([
                                'maxSize' => '2048k',
                                'mimeTypes' => [
                                    'image/jpeg',
                                    'image/png',
                                    'image/gif',
                                ],
                                'mimeTypesMessage' => 'Veuillez uploader une image valide (JPG, PNG ou GIF)',
                            ])
                        ],
                        'attr' => [
                            'class' => 'form-control',
                            'accept' => 'image/*'
                        ],
                    ]);
                    
                    // Gardons le champ original pour stocker le chemin de l'image
                    $form->add('image', TextType::class, [
                        'attr' => ['class' => 'form-control d-none'],
                        'label' => false,
                        'required' => false,
                    ]);
                }
                
                // Localisation
                if (property_exists(Event::class, 'address')) {
                    $form->add('address', TextType::class, [
                        'attr' => ['class' => 'form-control', 'id' => 'event_address'],
                        'label' => 'Adresse',
                        'required' => false,
                    ]);
                }
                
                if (property_exists(Event::class, 'latitude')) {
                    $form->add('latitude', NumberType::class, [
                        'attr' => ['class' => 'form-control', 'id' => 'event_latitude', 'step' => 'any'],
                        'label' => 'Latitude',
                        'required' => false,
                        'constraints' => [
                            new Range([
                                'min' => -90,
                                'max' => 90,
                                'notInRangeMessage' => 'La latitude doit être comprise entre {{ min }} et {{ max }}',
                            ]),
                        ],
                    ]);
                }
                
                if (property_exists(Event::class, 'longitude')) {
                    $form->add('longitude', NumberType::class, [
                        'attr' => ['class' => 'form-control', 'id' => 'event_longitude', 'step' => 'any'],
                        'label' => 'Longitude',
                        'required' => false,
                        'constraints' => [
                            new Range([
                                'min' => -180,
                                'max' => 180,
                                'notInRangeMessage' => 'La longitude doit être comprise entre {{ min }} et {{ max }}',
                            ]),
                        ],
                    ]);
                }
                
                // Dates
                if (property_exists(Event::class, 'start_time')) {
                    $form->add('start_time', DateTimeType::class, [
                        'widget' => 'single_text',
                        'attr' => ['class' => 'form-control datepicker'],
                        'label' => 'Date de début',
                        'constraints' => [
                            new NotNull([
                                'message' => 'La date de début est obligatoire',
                            ]),
                        ],
                    ]);
                }
                
                if (property_exists(Event::class, 'break_time')) {
                    $form->add('break_time', DateTimeType::class, [
                        'widget' => 'single_text',
                        'attr' => ['class' => 'form-control datepicker'],
                        'label' => 'Pause (optionnelle)',
                        'required' => false,
                    ]);
                }
                
                if (property_exists(Event::class, 'end_time')) {
                    $form->add('end_time', DateTimeType::class, [
                        'widget' => 'single_text',
                        'attr' => ['class' => 'form-control datepicker'],
                        'label' => 'Date de fin',
                        'constraints' => [
                            new NotNull([
                                'message' => 'La date de fin est obligatoire',
                            ]),
                        ],
                    ]);
                }
                
                // Si les nouvelles propriétés n'existent pas, utiliser event_date
                if (!property_exists(Event::class, 'start_time') && property_exists(Event::class, 'event_date')) {
                    $form->add('event_date', DateTimeType::class, [
                        'widget' => 'single_text',
                        'attr' => ['class' => 'form-control datepicker'],
                        'label' => 'Date de l\'événement',
                        'constraints' => [
                            new NotNull([
                                'message' => 'La date de l\'événement est obligatoire',
                            ]),
                        ],
                    ]);
                }
                
                // Participants
                if (property_exists(Event::class, 'users')) {
                    $form->add('users', EntityType::class, [
                        'class' => User::class,
                        'choice_label' => function(User $user) {
                            return method_exists($user, 'getEmail') ? $user->getEmail() : $user->getId();
                        },
                        'multiple' => true,
                        'attr' => ['class' => 'form-control'],
                        'label' => 'Participants',
                        'required' => false,
                    ]);
                }
                
                // Dates de création et modification
                if (property_exists(Event::class, 'created_at')) {
                    $form->add('created_at', DateTimeType::class, [
                        'widget' => 'single_text',
                        'attr' => ['class' => 'form-control datepicker', 'hidden' => true],
                        'label' => false,
                    ]);
                }
                
                if (property_exists(Event::class, 'updated_at')) {
                    $form->add('updated_at', DateTimeType::class, [
                        'widget' => 'single_text',
                        'attr' => ['class' => 'form-control datepicker', 'hidden' => true],
                        'label' => false,
                    ]);
                }
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
