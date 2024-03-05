<?php

namespace App\Form;

use App\Entity\BloodTransaction;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
=======
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Hospital;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
>>>>>>> Rayen_Majdoub

class BloodTransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            ->add('quantity_donated')
            ->add('donation_date')
            ->add('transaction_type')
=======
            ->add('quantity_donated',null,['attr'=>['class'=>'form-control'],])
            ->add('donation_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // Adjust the date format as needed
                'html5' => true, // Enable HTML5 date input
                'attr' => [
                    'class' => 'datepicker form-control-lg', // Add a custom class for styling
                    'autocomplete' => 'off', // Disable browser autocomplete
                ],
            ])
            ->add('transaction_type',null,['attr'=>['class'=>'form-control'],])
            ->add('hospital', EntityType::class, [
                'class' => Hospital::class,
                'choice_label' => function (Hospital $hospital) {
                    return $hospital->getName();
                }, // ou un autre champ approprié pour l'étiquette
                'attr' => ['class' => 'form-control'],
            ])
>>>>>>> Rayen_Majdoub
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BloodTransaction::class,
        ]);
    }
}
