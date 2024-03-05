<?php

namespace App\Form;

use App\Entity\BloodTransaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BloodTransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BloodTransaction::class,
        ]);
    }
}
