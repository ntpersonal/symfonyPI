<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date de réservation',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'La date de réservation est obligatoire']),
                ],
            ])
            ->add('event', EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'nom',
                'label' => 'Événement',
                'placeholder' => 'Choisir un événement',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'événement est obligatoire']),
                ],
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => function(User $user) {
                    if (method_exists($user, 'getEmail')) {
                        return $user->getEmail() . ' (' . $user->getFirstname() . ' ' . $user->getLastname() . ')';
                    }
                    return 'Utilisateur #' . $user->getId();
                },
                'label' => 'Utilisateur',
                'placeholder' => 'Choisir un utilisateur',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'utilisateur est obligatoire']),
                ],
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'En attente' => 'pending',
                    'Approuvé' => 'approved',
                    'Rejeté' => 'rejected',
                    'Annulé' => 'cancelled'
                ],
                'placeholder' => 'Choisir un statut',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'Le statut est obligatoire']),
                ],
                'data' => 'pending',
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Commentaire',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                    'placeholder' => 'Ajoutez un commentaire (optionnel)'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
