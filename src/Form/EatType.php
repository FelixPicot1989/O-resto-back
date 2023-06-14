<?php

namespace App\Form;

use App\Entity\Eat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('vegan')
            ->add('glutenFree')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('menu')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eat::class,
        ]);
    }
}
