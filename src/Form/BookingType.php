<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', type: DateTimeType::class, options: [
                'label' => 'Date',
                'required' => true,
                'hours' => [12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
                'minutes' => [0, 15, 30, 45],
                'years' => [date('y'), date('y') + 1],
            ])
            ->add('nbPlaces',  ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10
                ],
                'label' => 'Nombre de couverts',
                'placeholder' => 'Choisissez un nombre',
                'required' => true,
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
                'attr' => ['placeholder' => '0607080910'],
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
