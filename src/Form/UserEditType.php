<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "label" => "Indiquez votre email de connexion"
            ])
            ->add('password', PasswordType::class, [
                "mapped" => false,
                "label" => "Le mot de passe",
                "attr" => [
                    "placeholder" => "Ne rien mettre si vous ne voulez pas modifier le mot de passe"
                ],
                'constraints' => [
                    new Regex(
                        "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])\S{6,12}$/",
                        "Le mot de passe doit contenir au minimum 6 caractères, une majuscule, un chiffre"
                    ),
                ],
            ])
            ->add('roles', ChoiceType::class, [
                "multiple" => true,
                "expanded" => true,
                "choices" => [
                    "ADMIN" => "ROLE_ADMIN",
                    "USER" => "ROLE_USER",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            "attr" => ["novalidate" => "novalidate"]
        ]);
    }
}