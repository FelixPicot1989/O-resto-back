<?php

namespace App\Form;

use App\Entity\Eat;
use App\Entity\Menu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            "label" => "Le nom:",
        ])
        ->add('price', NumberType::class, [
            "label" => "Le prix",
            "scale" => 2,
        ])
        ->add('eats',  EntityType::class, [
            "multiple" => true,
            "expanded" => false, 
            "class" => Eat::class,
            'choice_label' => 'name',
            "placeholder" => "-",
            
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
