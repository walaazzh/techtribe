<?php

namespace App\Form;

use App\Entity\BloodStock;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD
=======
use Symfony\Component\Form\Extension\Core\Type\TextType;
>>>>>>> 23a1a9b (walaa new commit)

class BloodStockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            // Add form fields for the BloodStock entity
            ->add('name', null, [
                'attr' => [
                    'class' => 'form-control', // Add CSS class for styling
                ],
            ])
            ->add('quantity_available', null, [
                'attr' => [
                    'class' => 'form-control', // Add CSS class for styling
                ],
            ])
            ->add('bloodtype', null, [
                'attr' => [
                    'class' => 'form-control', // Add CSS class for styling
                ],
            ])
            ->add('expiry_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // Define the date format
                'html5' => true,
                'attr' => [
                    'class' => 'datepicker form-control-lg', // Add CSS class for styling
                    'autocomplete' => 'off', // Disable browser autocomplete
                ],
            ]);
=======
            ->add('name')
            ->add('quantity_available')
            ->add('bloodtype')
            ->add('expiry_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // Adjust the date format as needed
                'html5' => true, // Enable HTML5 date input
                'attr' => [
                    'class' => 'datepicker form-control-lg', // Add a custom class for styling
                    'autocomplete' => 'off', // Disable browser autocomplete
                ],
            ]);
            
>>>>>>> 23a1a9b (walaa new commit)
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
<<<<<<< HEAD
        // Configure the default options for the form
        $resolver->setDefaults([
            'data_class' => BloodStock::class, // Set the data class to BloodStock entity
=======
        $resolver->setDefaults([
            'data_class' => BloodStock::class,
>>>>>>> 23a1a9b (walaa new commit)
        ]);
    }
}
