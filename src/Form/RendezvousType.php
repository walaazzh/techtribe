<?php

namespace App\Form;

use App\Entity\Rendezvous;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
=======
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
>>>>>>> 6f2e479 (walaa+bundles)
=======
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
>>>>>>> c98b2fa (walaa+chiheb integration)

class RendezvousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_heure')
            ->add('statue')
            ->add('date_heure_creation')
            ->add('date_heure_der_modif')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rendezvous::class,
        ]);
    }
}
