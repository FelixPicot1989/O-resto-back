<?php

namespace App\Form;

use App\Entity\Eat;
use App\Entity\Category;
use App\Entity\Image;
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

class EatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Le nom :",
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description du plat : ",
            ])
            ->add('price', NumberType::class, [
                "label" => "Le prix :" ,
                "scale" => 2,
            ])
            ->add('vegetarian', ChoiceType::class, [
                "label" => "Végétarien :",
                'choices'  => [
                    'Non' => 0,
                    "Oui" => 1
                ],
                "multiple" => false,
                "expanded" => false,
            ])
            ->add('glutenFree',  ChoiceType::class, [
                "label" => "Sans gluten :",
                'choices'  => [
                    'Non' => 0,
                    "Oui" => 1
                ],
                "multiple" => false,
                "expanded" => false,
            ]) 
            ->add('category',  EntityType::class, [
                "multiple" => true,
                "expanded" => true, 
                "class" => Category::class,
                "label" => "La categorie:",
                'choice_label' => 'name',
                "empty_data" => 'false',
                "query_builder" => function(EntityRepository $entityrepository){
                    return $entityrepository->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                }
            ])
            ->add('menu', EntityType::class, [
                "multiple" => true,
                "expanded" => true, 
                "class" => Menu::class,
                "choice_label" => 'name',
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
