<?php

namespace App\Form;

use App\Entity\Centredecollect;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentredecollectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome', null, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('adress', null, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('ville', null, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('code_postal', null, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('payes', null, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('num_tel', null, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('heure_ouverture')
            ->add('capacite_max', null, [
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Centredecollect::class,
        ]);
    }
}
