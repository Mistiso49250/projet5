<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use APP\Entity\Article;
use App\Entity\Categorie;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $dataCategories = [
        //     [
        //         'description' => 'toto',
        //         'code' => 'tott',
        //     ],
        // ];
        // $categories = [];
        // foreach($dataCategories as $dataCategorie){
        //     $tempCategorie = new Categorie();
        //     $tempCategorie->setDescription($dataCategorie['description']);
        //     $tempCategorie->setCode($dataCategorie['code']);
        //     $manager->persist($tempCategorie);
        //     $categories[] = $tempCategorie;
        // }
        // $manager->flush();

        for($i = 1; $i <= 10; $i++){
            $article = new Article();
            $article->setTitre("Titre de l'article n°$i")
                    ->setContenu("Contenu de l'article n°$i")
                    ->setImage("http://placehold.it/150x150")
                    ->setExtrait("Extrait de l'article n°$i")
                    ->setDetail("Détatil de l'article n°$i")
                    ->setPrixTTC(10.25)
                    // ->setSlug("titre_de_l_article_n_$i")
                    ->setNew(1);

            // $product = new Product();
            $manager->persist($article);
        }

        $manager->flush();
    }
}
