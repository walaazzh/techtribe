<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', null, [
                'attr' => ['class' => 'inline-field'] // Add a class to the type field
            ])
            ->add('quantite_dispo')
            ->add('date_creation', DateType::class, [
                'data' => new \DateTime(), 
                'widget' => 'single_text', 
                'attr' => ['class' => 'inline-field'], 
            ])
            ->add('eventId', HiddenType::class, [
                'mapped' => false, // Indique à Symfony de ne pas mapper ce champ à une propriété de l'entité Ticket
            ])
           ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
