<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Question' => 'question',
                    'Traiteur' => 'booking',
                    'Evenements' => 'events',
                ],
                'placeholder' => 'Choisissez un motif de contact',
                'required' => true,
                'label' => 'Motif',
            ])
            ->add('name', options: [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Votre nom'],
                'required' => true,
            ])
            ->add('email', options: [
                'label' => 'Email',
                'attr' => ['placeholder' => 'Votre email'],
                'required' => true,
            ])
            ->add('phone', options: [
                'label' => 'Téléphone',
                'attr' => ['placeholder' => 'Votre téléphone'],
            ])
            ->add('message', options: [
                'label' => 'Message',
                'attr' => ['placeholder' => 'Votre message'],
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
