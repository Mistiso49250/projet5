<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Marque;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('Rechercher', SubmitType::class, [
                'attr'=>[
                    'class'=>'btn primary',
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
