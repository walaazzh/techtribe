<?php

namespace App\Form;

use App\Entity\Event;
<<<<<<< HEAD
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
=======
use App\Entity\EventCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

>>>>>>> chiheb+walaa/syrinecopie_branch

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('date_debut')
            ->add('date_fin')
            ->add('organisateur')
            ->add('contact')
            ->add('max_participant')
<<<<<<< HEAD
            ->add('statut')
=======
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'confirmed' => 'confirmed',
                    'cancelled' => 'cancelled',
                    'Postponed' => 'Postponed',
                    
                ],
            ])
            ->add('imageFile', VichFileType::class, [
                'label' => 'Event Image',
                'required' => false,
            ])
            ->add('EventCategory', EntityType::class, [
                'class' => EventCategory::class,
                'choice_label' => 'name',
               
            ])
>>>>>>> chiheb+walaa/syrinecopie_branch
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
