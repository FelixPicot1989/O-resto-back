<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('history', TextareaType::class, [
                "label" => "Historique du restaurant : ",
            ])
            ->add('openingLunch', TextType::class, [
                "label" => "Les heures d'ouverture midi du restaurant:",
            ])
            ->add('address', TextType::class, [
                "label" => "L'adresse du restaurant:",
            ])
            ->add('phone', TextType::class, [
                "label" => "Le numéro de téléphone du restaurant:",
            ])
            ->add('openingEvening', TextType::class, [
                "label" => "Les heures d'ouverture du soir du restaurant:",
            ])
            ->add('info', TextareaType::class, [
                "label" => "Infos du restaurant : ",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
