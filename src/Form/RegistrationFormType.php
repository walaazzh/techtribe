<?php

namespace App\Form;
<<<<<<< HEAD

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints as Assert;
// use EWZ\Bundle\RecaptchaBundle\Form\Type\RecaptchaType;
use App\Form\Type\ReCAPTCHAType;
=======
// src/Form/RegistrationFormType.php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

>>>>>>> chiheb+walaa/syrinecopie_branch
class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
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
=======

        ->add('first_name', TextType::class, [
            'label' => false,
            'attr' => [
                'class' => 'bg-transparent block mt-10 mx-auto border-b-2 w-1/5 h-20 text-2xl outline-none',
                'placeholder' => 'First Name',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter your first name',
                ]),
            ],
        ])
        ->add('last_name', TextType::class, [
            'label' => false,
            'attr' => [
                'class' => 'bg-transparent block mt-10 mx-auto border-b-2 w-1/5 h-20 text-2xl outline-none',
                'placeholder' => 'Last Name',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter your last name',
                ]),
            ],
        ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'email',
                    'class' => 'bg-transparent block mt-10 mx-auto border-b-2 w-1/5 h-20 text-2xl outline-none',
                    'placeholder' => 'Email',
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'bg-transparent block mt-10 mx-auto border-b-2 w-1/5 h-20 text-2xl outline-none',
                    'placeholder' => 'Password',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            
>>>>>>> chiheb+walaa/syrinecopie_branch
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
