<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\User;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numberOfCovers', NumberType::class, [
                "label" => "Nombre de couverts",
                ])
            ->add('date', DateType::class, [
                "format" => "yyyy-MM-dd"
            ])
            ->add('timeSlots',  ChoiceType::class, [
                // la liste fermée de choix
                'choices'  => [
                    "12H00" => new DateTime ('12:00:00'),
                    "12H30" => new DateTime ('12:30:00'), 
                    "13H00" => new DateTime ('13:00:00'),
                    "13H30" => new DateTime ('13:30:00'),
                    "14H00" => new DateTime ('14:00:00'),
                    "19H00" => new DateTime ('19:00:00'),
                    "19H30" => new DateTime ('19:30:00'),
                    "20H00" => new DateTime ('20:00:00'),
                    "20H30" => new DateTime ('20:30:00'),
                    "21H00" => new DateTime ('21:00:00'),
                    "21H30" => new DateTime ('21:30:00'),
                    "22H00" => new DateTime ('22:00:00'),]
            ])
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
