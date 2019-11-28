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
                'help' => 'Images (conf: default)',
                'required' => true,
//                'crop_options' => [
//                    'display_crop_data' => false,
//                    'allow_flip' => false,
//                    'allow_rotation' => true,
//                    'ratio' => 1.3
//                ],
            ])
            ->add('gallery', MediaCollectionType::class, [
                'conf' => 'perso',
                'help' => "Images collection (conf: perso)",
            ])
            ->add('private', MediaType::class, [
                'conf' => 'private',
                'help' => 'Images (conf: private)'
            ])
            ->add('private_doc', MediaType::class, [
                'conf' => 'private_doc',
                'help' => 'Documents .pdf or .doc (conf: private_doc)'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
        ]);
    }
}
