<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use APP\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i = 1; $i <= 10; $i++){
            $article = new Article();
            $article->setTitre("Titre de l'article n°$i")
                    ->setContenu("<p>Contenu de l'article n°$i</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setExtrait("<p>Extrait de l'article n°$i</p>")
                    ->setDetail("<p>Détatil de l'article n°$i</p>")
                    ->setPrixTTC("<p>Prix de l'article n°$i</p>");

            // $product = new Product();
            $manager->persist($article);
        }

        $manager->flush();
    }
}
