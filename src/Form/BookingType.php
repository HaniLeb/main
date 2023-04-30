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
        $currentDate = new \DateTime();
        $currentDate->setTime(12, 0);

        $builder
            ->add('date', type: DateTimeType::class, options: [
                'label' => 'Date',
                'data' => $currentDate,
                'required' => true,
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
                'placeholder' => '2',
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
