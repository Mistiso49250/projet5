<?php

namespace App\Form\Backoffice;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('extrait')
            ->add('detail')
            ->add('contenu')
            ->add('image', FileType::class, [
                'required' => true,
                'label' => false, 
                'mapped' => false,
            ])
            ->add('prixTTC')
            ->add('new')
            ->add('selection')
            ->add('categorie')
            ->add('marque')
            ->add('tva')
            ->add('genre')
            ->add('age')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
