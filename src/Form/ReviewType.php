<?php

namespace App\Form;

use App\Entity\Review;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment', TextareaType::class, [
                "label" => "Votre avis : ",
            ])
            ->add('rating', ChoiceType::class, [
                // la liste fermée de choix
                'choices'  => [
                    'Excellent' => 5,
                    "Très bon" => 4, 
                    "Bon" => 3,
                    "Peut mieux faire" => 2, 
                    "A éviter" => 1
                ],
                "multiple" => false,
                "expanded" => false,
            ])
            ->add('user',  EntityType::class, [
                "multiple" => false,
                "expanded" => false, // radiobutton
                "class" => User::class,
                'choice_label' => 'firstname',
                'choice_label' => 'lastname',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
            "attr" => ["novalidate" => 'novalidate']
        ]);
    }
}
