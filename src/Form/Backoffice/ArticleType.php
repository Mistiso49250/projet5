<?php

namespace App\Form\Backoffice;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => ['class' => 'mb-2'],
                'label_attr' => ['class' => 'mr-2'],
            ])
            ->add('extrait', TextType::class, [
                'attr' => ['class' => 'mb-2'],
                'label_attr' => ['class' => 'mr-2'],
            ])
            ->add('detail', TextareaType::class, [
                'attr' => ['class' => 'mb-2'],
                'label_attr' => ['class' => 'mr-2'],
            ])
            ->add('contenu', TextareaType::class, [
                'attr' => ['class' => 'mb-2'],
                'label_attr' => ['class' => 'mr-2'],
            ])
            ->add('image', FileType::class, [
                'required' => true,
                'label' => false, 
                'mapped' => false,
            ])
            ->add('prixTTC', TextType::class, [
                'attr' => ['class' => 'mb-2'],
                'label_attr' => ['class' => 'mr-2'],
            ])
            ->add('new', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input'],
                'label_attr' => ['class' => 'form-check-label'],
                'required' => false,
            ])
            ->add('selection', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input'],
                'label_attr' => ['class' => 'form-check-label'],
                'required' => false,
            ])
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
