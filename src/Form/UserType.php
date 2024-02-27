<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            'required' => false, // Set required to false
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('last_name', TextType::class, [
            'label' => 'Last Name',
            'required' => false, // Set required to false
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'required' => false, // Set required to false
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'required' => false, // Set required to false
            'attr' => [
                'class' => 'form-control', // Add your custom class here
                'placeholder'=>'Password',
            ],
            'first_options' => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat Password'],
        ])
        ->add('roles', ChoiceType::class, [
            'label' => 'Roles',
            'choices' => [
                'User' => 'ROLE_USER',
                'Admin' => 'ROLE_ADMIN',
            ],
            'multiple' => true,
            'expanded' => true,
            'required' => false,
        ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
