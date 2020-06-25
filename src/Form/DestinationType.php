<?php

namespace App\Form;

use App\Entity\Destination;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DestinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', TextType::class, [
                'label' => 'Pays :'
            ])
            ->add('location', TextType::class, [
                'label' => 'Clinique :'
            ])
            ->add('arrival', DateType::class, [
                'label' => 'Arrivé'
            ])
            ->add('departure', DateType::class, [
                'label' => 'Départ :'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Destination::class,
        ]);
    }
}
