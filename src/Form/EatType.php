<?php

namespace App\Form;

use App\Entity\Eat;
use App\Entity\Image;
use App\Entity\Category;
use App\Entity\Menu;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class EatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Le nom:",
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description du plat : ",
            ])
            ->add('price', NumberType::class, [
                "label" => "Le prix",
                "scale" => 2,
            ])
            ->add('vegan', ChoiceType::class, [
                'choices'  => [
                    'Non' => 0,
                    "Oui" => 1
                ],
                "multiple" => false,
                "expanded" => true,
            ])
            ->add('glutenFree',  ChoiceType::class, [
                'choices'  => [
                    'Non' => 0,
                    "Oui" => 1
                ],
                "multiple" => false,
                "expanded" => true,
            ]) 
            ->add('category',  EntityType::class, [
                "multiple" => true,
                "expanded" => false, 
                "class" => Category::class,
                'choice_label' => 'name',
            ])
            ->add('menu', EntityType::class, [
                "multiple" => true,
                "expanded" => false, 
                "class" => Menu::class,
                'choice_label' => 'name',
                "placeholder" => "-",

            ])
            ->add('image', EntityType::class, [
                "multiple" => false,
                "expanded" => false, 
                "class" => Image::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eat::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
