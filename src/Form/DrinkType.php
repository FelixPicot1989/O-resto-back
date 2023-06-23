<?php

namespace App\Form;

use App\Entity\Drink;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DrinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Le nom:",
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description de la boisson : ",
            ])
            ->add('price', NumberType::class, [
                "label" => "Le prix",
                "scale" => 2,
            ])
            ->add('alcool', ChoiceType::class, [
                'choices'  => [
                    'Sans alcool' => 0,
                    "Avec alcool" => 1
                ],
                "multiple" => false,
                "expanded" => true,
            ])
            ->add('category',  EntityType::class, [
                "label" => "La catégorie :",
                "multiple" => false,
                "expanded" => false, // radiobutton
                "class" => Category::class,
                'choice_label' => 'name',
                "query_builder" => function (EntityRepository $entityrepository) {
                    return $entityrepository->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Drink::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
