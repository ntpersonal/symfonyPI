<?php

namespace App\Form;

use App\Entity\Answer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message', TextareaType::class, [
                'label' => 'Réponse',
                'attr' => [
                    'rows' => 6,
                    'placeholder' => 'Écrivez votre réponse ici...',
                    'class' => 'form-control'
                ],
            ]);
            // We don't expose `admin` and `reclamation` here, they'll be set in the controller.
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
