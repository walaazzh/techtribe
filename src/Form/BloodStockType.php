<?php

namespace App\Form;

use App\Entity\BloodStock;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BloodStockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
<<<<<<< HEAD
            ->add('name')
            ->add('quantity_available')
            ->add('bloodtype')
=======
            ->add('name',null,['attr'=>['class'=>'form-control'],])
            ->add('quantity_available',null,['attr'=>['class'=>'form-control'],])
            ->add('bloodtype',null,['attr'=>['class'=>'form-control'],])
>>>>>>> 8b6d46d (Rayen)
=======
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
>>>>>>> 175bd6f (changes)
            ->add('expiry_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // Define the date format
                'html5' => true,
                'attr' => [
                    'class' => 'datepicker form-control-lg', // Add CSS class for styling
                    'autocomplete' => 'off', // Disable browser autocomplete
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // Configure the default options for the form
        $resolver->setDefaults([
            'data_class' => BloodStock::class, // Set the data class to BloodStock entity
        ]);
    }
}
