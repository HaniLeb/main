<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
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
                'data' => new \DateTime(),
                'required' => true,
            ])
            ->add('nbPlaces', options: [
                'label' => 'Nombre de couverts',
                'attr' => ['placeholder' => '2'],
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
                'attr' => ['placeholder' => 'Votre numéro de téléphone'],
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
