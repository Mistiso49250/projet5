<?php

namespace App\Form\Backoffice;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => ['class' => 'mb-2 article-title'],
                'label_attr' => ['class' => 'mr-2 article-title-label'],
            ])
            ->add('extrait', TextType::class, [
                'attr' => ['class' => 'mb-2 extrait-title'],
                'label_attr' => ['class' => 'mr-2 extrait-title-label'],
            ])
            ->add('detail', TextareaType::class, [
                'attr' => ['class' => 'mb-2 detail-title'],
                'label_attr' => ['class' => 'mr-2 detail-title-label'],
            ])
            ->add('contenu', TextareaType::class, [
                'attr' => ['class' => 'mb-2 contenu-title'],
                'label_attr' => ['class' => 'mr-2 contenu-title-label'],
            ])
            ->add('image', FileType::class, [
                'required' => true,
                'label' => false, 
                'mapped' => false,
            ])
            ->add('prixTTC', TextType::class, [
                'attr' => ['class' => 'mb-2 prix-title'],
                'label_attr' => ['class' => 'mr-2 prix-title-label'],
            ])
            ->add('new', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input new-checkbox'],
                'label_attr' => ['class' => 'form-check-label new-checkbox-label'],
                'required' => false,
            ])
            ->add('selection', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input selection-checkbox'],
                'label_attr' => ['class' => 'form-check-label selection-checkbox-label'],
                'required' => false,
            ])
            ->add('categorie', ChoiceType::class, [
                'attr' => ['class'=> 'select-categorie'],
                'label_attr'=> ['class'=> 'select-label-categorie'],
                'required'=> true,
            ])
            ->add('marque', ChoiceType::class, [
                'attr' => ['class'=> 'select-marque'],
                'label_attr'=> ['class'=> 'select-label-marque'],
                'required'=> true,
            ])
            ->add('tva', ChoiceType::class, [
                'attr' => ['class'=> 'select-tva'],
                'label_attr'=> ['class'=> 'select-label-tva'],
                'required'=> true,
            ])
            ->add('genre', ChoiceType::class, [
                'attr' => ['class'=> 'select-genre'],
                'label_attr'=> ['class'=> 'select-label-genre'],
                'required'=> true,
            ])
            ->add('age', ChoiceType::class, [
                'attr' => ['class'=> 'select-age'],
                'label_attr'=> ['class'=> 'select-label-age'],
                'required'=> true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
