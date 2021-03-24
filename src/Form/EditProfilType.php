<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>"Prénom",
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir un prénom',
                    ]),
                ],
            ])
            ->add('lastname', TextType::class, [
                'label'=>"Nom",
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir un nom',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label'=>"Email",
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Veuillez saisir un email',
                    ]),
                ],
            ])
        ->add('Enregistrer', SubmitType::class,[
            'attr'=>[
                'class'=>'btn btn-primary',
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
