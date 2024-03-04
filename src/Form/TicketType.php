<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', null, [
                'attr' => ['class' => 'inline-field'] // Add a class to the type field
            ])
            ->add('quantite_dispo')
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->add('date_creation', null, [
                'attr' => ['class' => 'inline-field'] // Add a class to the date_creation field
            ]);
=======
            ->add('date_creation', DateType::class, [
                'data' => new \DateTime(), 
                'widget' => 'single_text', 
                'attr' => ['class' => 'inline-field'], 
            ])
            ->add('eventId', HiddenType::class, [
                'mapped' => false, // Indique à Symfony de ne pas mapper ce champ à une propriété de l'entité Ticket
            ])
           ;
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
            ->add('date_creation', null, [
                'attr' => ['class' => 'inline-field'] // Add a class to the date_creation field
            ]);
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
            ->add('date_creation', null, [
                'attr' => ['class' => 'inline-field'] // Add a class to the date_creation field
            ]);
>>>>>>> 8b6d46d (Rayen)
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
