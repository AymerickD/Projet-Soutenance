<?php

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ...
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('email', EmailType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('country', CountryType::class)
            ->add('address', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }
}
