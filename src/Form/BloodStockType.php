<?php

namespace App\Form;

use App\Entity\BloodStock;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BloodStockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            ->add('name')
            ->add('quantity_available')
            ->add('bloodtype')
=======
            ->add('name',null,['attr'=>['class'=>'form-control'],])
            ->add('quantity_available',null,['attr'=>['class'=>'form-control'],])
            ->add('bloodtype',null,['attr'=>['class'=>'form-control'],])
>>>>>>> 8b6d46d (Rayen)
            ->add('expiry_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', // Adjust the date format as needed
                'html5' => true, // Enable HTML5 date input
                'attr' => [
                    'class' => 'datepicker form-control-lg', // Add a custom class for styling
                    'autocomplete' => 'off', // Disable browser autocomplete
                ],
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BloodStock::class,
        ]);
    }
}
