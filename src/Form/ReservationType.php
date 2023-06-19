<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numberOfCovers')
            ->add('date')
            ->add('timeSlots')
            ->add('user',  EntityType::class, [
                "multiple" => false,
                "expanded" => false, // radiobutton
                "class" => User::class,
                'choice_label' => 'firstname',
                'choice_label' => 'lastname',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
