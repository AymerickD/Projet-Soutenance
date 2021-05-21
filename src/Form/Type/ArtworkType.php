<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\FormBuilderInterface;

class ArtworkType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'required' => true,
                'allow_delete' => true,
                'delete_label' => 'Remove Image',
                'download_label' => true,
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => false,
            ])
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('price', MoneyType::class)
            //->add('is_sold', BooleanType::class)
            //->add('view_count', IntegerType::class)
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }
}
