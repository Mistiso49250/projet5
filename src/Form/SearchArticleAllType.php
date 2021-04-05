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
        $searchDatas = $options['searchdatas'];
        $filters = $options['filters'];
        if (in_array('categorie', $filters)) {
            $builder->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'label' => 'Catégorie',
                'attr' => [
                    'class' => 'form-select',
                ],
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.description', 'ASC');
                },
                'data' => array_key_exists('categorie', $searchDatas) ? $searchDatas['categorie'] : null,
            ]);
        }
        if (in_array('marque', $filters)) {
            $builder->add('marque', EntityType::class, [
                'class' => Marque::class,
                'label' => 'Marque',
                'attr' => [
                    'class' => 'form-select',
                ],
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.titre', 'ASC');
                },
                'data' => array_key_exists('marque', $searchDatas) ? $searchDatas['marque'] : null,
            ]);
        }
        if (in_array('genre', $filters)) {
            $builder->add('genre', EntityType::class, [
                'class' => Genre::class,
                'label' => 'Genre',
                'attr' => [
                    'class' => 'form-select',
                ],
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->orderBy('g.code', 'ASC');
                },
                'data' => array_key_exists('genre', $searchDatas) ? $searchDatas['genre'] : null,
            ]);
        }
        if (in_array('age', $filters)) {
            $builder->add('age', EntityType::class, [
                'class' => Age::class,
                'label' => 'Age',
                'attr' => [
                    'class' => 'form-select',
                ],
                'required' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.code', 'ASC');
                },
                'data' => array_key_exists('age', $searchDatas) ? $searchDatas['age'] : null,
            ]);
        }
        $builder->add('Rechercher', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-info btn-rounded btn-formSearch',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'searchdatas' => 'none',
            'filters' => ['categorie', 'marque', 'genre', 'age'],
        ]);
    }
}
