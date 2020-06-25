<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom :'
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :'
            ])
            ->add('email',  EmailType::class, [
        'label' => 'Adresse mail :'
    ])
            ->add('destination',  TextType::class, [
                'label' => 'Destination :'
            ])
            ->add('vehicle', CheckboxType::class, [
                'label'    => 'Je cherche une voiture.',
                'required' => false,
            ])
            ->add('accommodation', CheckboxType::class, [
                'label'    => 'je cherche à partagé un logement.',
                'required' => false,

            ])
            ->add('support', CheckboxType::class, [
                'label'    => 'je cherche un accompagnateur.',
                'required' => false,
            ])
            ->add('destination', DestinationType::class)


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
