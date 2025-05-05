<?php

namespace App\Form;

use App\Entity\Reclamation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message', TextareaType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Écrivez votre message ici...', 'rows' => 8],
                'required' => true,
            ]);
            
        // Ajouter le champ status seulement pour les administrateurs (dans l'interface admin)
        if ($options['include_status'] ?? false) {
            $builder->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => Reclamation::getStatusChoices(),
                'expanded' => false,
                'multiple' => false,
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ]);
        }
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
            'include_status' => false, // Par défaut, ne pas inclure le champ status
        ]);
        
        $resolver->setAllowedTypes('include_status', 'bool');
    }
}
