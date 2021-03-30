<?php

namespace App\Form\Backoffice;

use App\Entity\CategorieSecondaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieSecondaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('code')
            ->add('slug')
            ->add('categoriePrincipal')
            ->add('secondaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CategorieSecondaire::class,
        ]);
    }
}
