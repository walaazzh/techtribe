<?php

namespace App\Form;

use App\Entity\BloodTransaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('donation_date')
            ->add('transaction_type',null,['attr'=>['class'=>'form-control'],])
>>>>>>> 8b6d46d (Rayen)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BloodTransaction::class,
        ]);
    }
}
