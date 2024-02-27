<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('first_name', TextType::class, [
            'label' => 'First Name',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('last_name', TextType::class, [
            'label' => 'Last Name',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Password',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
