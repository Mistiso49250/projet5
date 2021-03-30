<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=>'Les mots de passe doivent être identique',
                'options'=>[
                    'attr'=>[
                        'class'=>'password-field',
                    ]
                ],
                'required'=>true,
                'first_options'=>[
                    'label'=>'Mot de passe'
                ],
                'second_options'=>[
                    'label'=>'Confirmez le mot de passe'
                ],
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
