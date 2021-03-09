<?php

namespace App\Form;

use App\Entity\Age;
use App\Entity\Genre;
use App\Entity\Marque;
use App\Entity\Categorie;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchArticleAllType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', EntityType::class, [
                'class'=>Categorie::class,
                'label'=>'Catégorie',
                'attr'=>[
                    'class'=>'form-select',
                ],
                'required'=>false,
                'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('c')
                    ->orderBy('c.description', 'ASC');
                }
            ])
            ->add('marque', EntityType::class, [
                'class'=>Marque::class,
                'label'=>'Marque',
                'attr'=>[
                    'class'=>'form-select',
                ],
                'required'=>false,
                'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('m')
                    ->orderBy('m.titre', 'ASC');
                }
            ])
            // ->add('genre', EntityType::class, [
            //     'class'=>Genre::class,
            //     'label'=>'Genre',
            //     'attr'=>[
            //         'class'=>'form-select',
            //     ],
            //     'required'=>false,
            //     'query_builder'=>function(EntityRepository $er){
            //         return $er->createQueryBuilder('g')
            //         ->orderBy('g.code', 'ASC');
            //     }
            // ])
            // ->add('age', EntityType::class, [
            //     'class'=>Age::class,
            //     'label'=>'Age',
            //     'attr'=>[
            //         'class'=>'form-select',
            //     ],
            //     'required'=>false,
            //     'query_builder'=>function(EntityRepository $er){
            //         return $er->createQueryBuilder('a')
            //         ->orderBy('a.code', 'ASC');
            //     }
            // ])
            ->add('Rechercher', SubmitType::class, [
                'attr'=>[
                    'class'=>'btn btn-info btn-rounded btn-formSearch',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
