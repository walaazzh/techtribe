<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
<<<<<<< HEAD
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints\NotNull;
=======
>>>>>>> 6f2e479 (walaa+bundles)
=======
use Symfony\Component\Validator\Constraints\NotNull;
>>>>>>> 7caf93a (walaa+bundles+final)

class ResetPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'required' => false, // Set required to false
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7caf93a (walaa+bundles+final)
            'first_options' => [
                'label' => 'Password',
                'attr' => [
                    'class' => 'form-control password-input',
                    'style' => 'width: 100%; height: 40px; border-radius: 5px; border: 1px solid #ccc;'
                ]
            ],
            'second_options' => [
                'label' => 'Repeat Password',
                'attr' => [
                    'class' => 'form-control password-input',
                    'style' => 'width: 100%; height: 40px; border-radius: 5px; border: 1px solid #ccc;'
                ]
            ],
<<<<<<< HEAD
            'constraints' => [
                new NotNull(), 
=======
            'first_options' => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat Password'],
            'constraints' => [
>>>>>>> 6f2e479 (walaa+bundles)
=======
            'constraints' => [
                new NotNull(), 
>>>>>>> 7caf93a (walaa+bundles+final)
                new Length([
                    'min' => 8,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
                new Regex([
                    'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
                    'message' => 'Your password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.',
                ]),
            ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
            'options' => ['attr' => ['class' => 'form-control']],
            
>>>>>>> 6f2e479 (walaa+bundles)
=======
>>>>>>> 7caf93a (walaa+bundles+final)
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}