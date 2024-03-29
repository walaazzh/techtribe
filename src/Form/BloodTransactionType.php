<?php

namespace App\Form;

use App\Entity\BloodTransaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Hospital;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BloodTransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Add form fields for the BloodTransaction entity
            ->add('quantity_donated', null, [
                'attr' => [
                    'class' => 'form-control', // Add CSS class for styling
                ],
            ])
            ->add('donation_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // Define the date format
                'html5' => true,
                'attr' => [
                    'class' => 'datepicker form-control-lg', // Add CSS class for styling
                    'autocomplete' => 'off', // Disable browser autocomplete
                ],
            ])
            ->add('transaction_type', null, [
                'attr' => [
                    'class' => 'form-control', // Add CSS class for styling
                ],
            ])
            ->add('hospital', EntityType::class, [
                'class' => Hospital::class, // Set the related entity class
                'choice_label' => function (Hospital $hospital) {
                    return $hospital->getName(); // Set the field used as the choice label
                },
                'attr' => [
                    'class' => 'form-control', // Add CSS class for styling
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // Configure the default options for the form
        $resolver->setDefaults([
            'data_class' => BloodTransaction::class, // Set the data class to BloodTransaction entity
        ]);
    }
}
