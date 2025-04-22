<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Tournoi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nom de l\'équipe est requis.']),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 255,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères.'
                    ]),
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter team name'
                ]
            ])
            ->add('categorie', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La catégorie est requise.']),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 255,
                        'minMessage' => 'La catégorie doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'La catégorie ne peut pas dépasser {{ limit }} caractères.'
                    ]),
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter category'
                ]
            ])
            ->add('modeJeu', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le mode de jeu est requis.']),
                    new Assert\Choice([
                        'choices' => ['EN_GROUPE', 'PAR_2'],
                        'message' => 'Le mode de jeu doit être "EN_GROUPE" ou "PAR_2".',
                    ]),
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter game mode'
                ]
            ])
            ->add('nombreJoueurs', IntegerType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nombre de joueurs est requis.']),
                    new Assert\Range([
                        'min' => 2,
                        'max' => 10,
                        'notInRangeMessage' => 'Le nombre de joueurs doit être entre {{ min }} et {{ max }}.'
                    ]),
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter number of players'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Add Team',
                'attr' => [
                    'class' => 'btn btn-primary',
                    'id' => 'submitTeamForm'
                ]
            ])
            // ->add('logoPath')
            // ->add('tournoi', EntityType::class, [
            //     'class' => Tournoi::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ],
        ]);

    }
}
