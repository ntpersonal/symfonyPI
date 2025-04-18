<?php
// src/Form/MatchesType.php

namespace App\Form;

use App\Entity\Matches;
use App\Entity\Team;
use App\Entity\Tournoi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class MatchesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('teamA', EntityType::class, [
                'class'        => Team::class,
                'choice_label' => 'nom',
                'placeholder'  => 'Select Team A',
                'constraints'  => [new NotBlank(['message' => 'Please select Team A'])]
            ])
            ->add('teamB', EntityType::class, [
                'class'        => Team::class,
                'choice_label' => 'nom',
                'placeholder'  => 'Select Team B',
                'constraints'  => [new NotBlank(['message' => 'Please select Team B'])]
            ])
            ->add('scoreTeamA', IntegerType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Score Team A required']),
                    new PositiveOrZero(['message' => 'Score must be ≥ 0'])
                ]
            ])
            ->add('scoreTeamB', IntegerType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Score Team B required']),
                    new PositiveOrZero(['message' => 'Score must be ≥ 0'])
                ]
            ])
            ->add('status', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Status is required'])]
            ])
            ->add('matchTime', DateTimeType::class, [
                'widget'      => 'single_text',
                'constraints' => [new NotBlank(['message' => 'Match time is required'])]
            ])
            ->add('locationMatch', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Location is required'])]
            ])
            ->add('tournoi', EntityType::class, [
                'class'        => Tournoi::class,
                'choice_label' => 'nom',
                'placeholder'  => 'Select Tournament',
                'label'        => 'Tournament',
                'constraints'  => [new NotBlank(['message' => 'Please select a Tournament'])]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Matches::class,
        ]);
    }
}
