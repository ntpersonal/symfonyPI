<?php

namespace App\Form;

use App\Entity\Ranking;
use App\Entity\Team;
use App\Entity\Tournoi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RankingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('points')
            ->add('position')
            ->add('wins')
            ->add('draws')
            ->add('losses')
            ->add('goals_scored')
            ->add('goals_conceded')
            ->add('goal_difference')
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'id',
            ])
            ->add('tournoi', EntityType::class, [
                'class' => Tournoi::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ranking::class,
        ]);
    }
}
