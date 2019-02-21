<?php

namespace App\Form;

use App\Entity\Test;
use Artgris\Bundle\MediaBundle\Form\Type\MediaCollectionType;
use Artgris\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', MediaType::class, [
                'conf' => 'default',
                'help' => "Image public",
                'required' => true,
                'crop_options' => [
                    'display_crop_data' => false,
                    'allow_flip' => false,
                    'allow_rotation' => true,
                    'ratio' => 1.3
                ],
            ])
            ->add('private', MediaType::class, [
                'conf' => 'private',
                'help' => "Image privée"
            ])
            ->add('private_doc', MediaType::class, [
                'conf' => 'private_doc',
                'help' => "Document (pdf ou doc) privé"
            ])
            ->add('gallery', MediaCollectionType::class, [
                'conf' => 'default',
                'help' => "Gallerie d'image"
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
        ]);
    }
}
