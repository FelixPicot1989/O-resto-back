<?php

namespace App\Form;

use App\Entity\Eat;
use App\Entity\Image;
use App\Entity\Restaurant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("name", TextType::class, [
            "label" => "Le nom:",
            ])
            ->add("image_file", VichImageType::class, [
                "label" => "Image",
                "required" => false,
                "allow_delete" => true,
                "delete_label" => "Supprimer l'image",
                "download_label" => true,
            ])
            ->add("restaurant", EntityType::class, [
                "multiple" => false,
                "expanded" => false, // radiobutton
                "class" => Restaurant::class,
                "choice_label" => "id",
                "placeholder" => "-",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "data_class" => Image::class,
            "attr" => ["novalidate" => "novalidate"]

        ]);
    }
}
