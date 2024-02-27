<?php

namespace App\Form;

use App\Entity\User;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
=======
>>>>>>> 23a1a9b (walaa new commit)
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
=======

>>>>>>> 23a1a9b (walaa new commit)
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('first_name', TextType::class, [
            'label' => 'First Name',
<<<<<<< HEAD
            'required' => false, // Set required to false
=======
>>>>>>> 23a1a9b (walaa new commit)
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('last_name', TextType::class, [
            'label' => 'Last Name',
<<<<<<< HEAD
            'required' => false, // Set required to false
=======
>>>>>>> 23a1a9b (walaa new commit)
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
<<<<<<< HEAD
            'required' => false, // Set required to false
=======
>>>>>>> 23a1a9b (walaa new commit)
            'attr' => [
                'class' => 'form-control',
            ],
        ])
<<<<<<< HEAD
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'required' => false, // Set required to false
            'first_options' => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat Password'],
            'constraints' => [
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
            'options' => ['attr' => ['class' => 'form-control']],
            
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
=======
        ->add('password', PasswordType::class, [
            'label' => 'Password',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
    ;
>>>>>>> 23a1a9b (walaa new commit)
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
