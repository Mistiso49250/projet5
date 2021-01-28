<?php

namespace App\DataFixtures;

use App\Entity\Tva;
use App\Entity\Marque;
use APP\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dataCategories = [
            [
                'description' => 'activité bébé',
                'code' => 'bébé',
                'slug' => 'bébé',
            ],
            [
                'description' => 'activité manuelle',
                'code' => 'manuelle',
                'slug' => 'manuelle',
            ],
            [
                'description' => 'arty toys',
                'code' => 'arty',
                'slug' => 'arty',
            ],
            [
                'description' => 'bain',
                'code' => 'bain',
                'slug' => 'bain',
            ],
            [
                'description' => 'cheval à bascule',
                'code' => 'bascule',
                'slug' => 'bascule',
            ],
            [
                'description' => 'boite a dent',
                'code' => 'dent',
                'slug' => 'dent',
            ],
            [
                'description' => 'boite a histoire',
                'code' => 'lunii',
                'slug' => 'lunii',
            ],
            [
                'description' => 'boite a musique',
                'code' => 'boiteMusique',
                'slug' => 'boiteMusique',
            ],
            [
                'description' => 'cartable',
                'code' => 'cartable',
                'slug' => 'cartable',
            ],
            [
                'description' => 'cartes',
                'code' => 'cartes',
                'slug' => 'cartes',
            ],
            [
                'description' => 'chevalier',
                'code' => 'chevalier',
                'slug' => 'chevalier',
            ],
            [
                'description' => 'coloriage',
                'code' => 'coloriage',
                'slug' => 'coloriage',
            ],
            [
                'description' => 'construction',
                'code' => 'construction',
                'slug' => 'construction',
            ],
            [
                'description' => 'decoration',
                'code' => 'decoration',
                'slug' => 'decoration',
            ],
            [
                'description' => 'doudou',
                'code' => 'doudou',
                'slug' => 'doudou',
            ],
            [
                'description' => 'draisienne',
                'code' => 'draisienne',
                'slug' => 'draisienne',
            ],
            [
                'description' => 'ecole',
                'code' => 'ecole',
                'slug' => 'ecole',
            ],
            [
                'description' => 'epicerie',
                'code' => 'epicerie',
                'slug' => 'epicerie',
            ],
            [
                'description' => 'espace',
                'code' => 'espace',
                'slug' => 'espace',
            ],
            [
                'description' => 'figurine',
                'code' => 'figurine',
                'slug' => 'figurine',
            ],
            [
                'description' => 'garage',
                'code' => 'garage',
                'slug' => 'garage',
            ],
            [
                'description' => 'imitation',
                'code' => 'imitation',
                'slug' => 'imitation',
            ],
            [
                'description' => 'jeux de société',
                'code' => 'société',
                'slug' => 'société',
            ],
            [
                'description' => 'jeux d\'extérieur',
                'code' => 'extérieur',
                'slug' => 'extérieur',
            ],
            [
                'description' => 'lampe a histoire',
                'code' => 'histoire',
                'slug' => 'histoire',
            ],
            [
                'description' => 'mobile',
                'code' => 'mobile',
                'slug' => 'mobile',
            ],
            [
                'description' => 'montre',
                'code' => 'montre',
                'slug' => 'montre',
            ],
            [
                'description' => 'musique',
                'code' => 'musique',
                'slug' => 'musique',
            ],
            [
                'description' => 'observation',
                'code' => 'observation',
                'slug' => 'observation',
            ],
            [
                'description' => 'pate intéligente',
                'code' => 'pate intéligente',
                'slug' => 'intéligente',
            ],
            [
                'description' => 'peluche',
                'code' => 'peluche',
                'slug' => 'peluche',
            ],
            [
                'description' => 'petite voiture',
                'code' => 'petite voiture',
                'slug' => 'petite voiture',
            ],
            [
                'description' => 'porteur',
                'code' => 'porteur',
                'slug' => 'porteur',
            ],
            [
                'description' => 'poupée',
                'code' => 'poupée',
                'slug' => 'poupée',
            ],
            [
                'description' => 'puzzle',
                'code' => 'puzzle',
                'slug' => 'puzzle',
            ],
            [
                'description' => 'reflextion/stratégie',
                'code' => 'reflextion',
                'slug' => 'reflextion',
            ],
            [
                'description' => 'tirelire',
                'code' => 'tirelire',
                'slug' => 'tirelire',
            ],
            [
                'description' => 'toise',
                'code' => 'toise',
                'slug' => 'toise',
            ],
            [
                'description' => 'trotinette',
                'code' => 'trotinette',
                'slug' => 'trotinette',
            ],
            [
                'description' => 'veilleuse',
                'code' => 'veilleuse',
                'slug' => 'veilleuse',
            ],
            [
                'description' => 'voyage',
                'code' => 'voyage',
                'slug' => 'voyage',
            ],
        ];
        $categories = [];
        foreach($dataCategories as $dataCategorie){
            $tempCategorie = new Categorie();
            $tempCategorie->setDescription($dataCategorie['description']);
            $tempCategorie->setCode($dataCategorie['code']);
            $tempCategorie->setSlug($dataCategorie['slug']);
            $manager->persist($tempCategorie);
            $categories[] = $tempCategorie;
        }
        $manager->flush();

        $dataMarques = [
            [
                'titre' => 'oiseaubateau',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'oiseaubateau',
            ],
            [
                'titre' => 'moulinroty',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'moulinroty',
            ],
            [
                'titre' => 'funkyframes',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'funkyframes',
            ],
            [
                'titre' => 'bergamotte',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'bergamotte',
            ],
            [
                'titre' => 'corolle',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'corolle',
            ],
            [
                'titre' => 'haba',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'haba',
            ],
            [
                'titre' => 'janod',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'janod',
            ],
            [
                'titre' => 'lilliputiens',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'lilliputiens',
            ],
            [
                'titre' => 'djeco',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'djeco',
            ],
            [
                'titre' => 'omy',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'omy',
            ],
            [
                'titre' => 'smartgame',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'smartgame',
            ],
            [
                'titre' => 'papo',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'papo',
            ],
            [
                'titre' => 'vilac',
                'image' => 'http://placehold.it/150x150',
                'slug' => 'vilac',
            ],
        ];
        $marques = [];
        foreach($dataMarques as $dataMarque){
            $tempMarque = new Marque();
            $tempMarque->setTitre($dataMarque['titre']);
            $tempMarque->setImage($dataMarque['image']);
            $tempMarque->setSlug($dataMarque['slug']);
            $manager->persist($tempMarque);
            $marques[] = $tempMarque;
        }
        $manager->flush();

        $dataTva = [
            [
                'valeur' => '20',
                'code' => '20',
                'slug' => '20',
            ],
            [
                'valeur' => '5.5',
                'code' => '5.5',
                'slug' => '5.5',
            ],
        ];
        $tva = [];
        foreach($dataTva as $valeurTva){
            $tempTVA = new Tva();
            $tempTVA->setValeurTVA($valeurTva['valeur']);
            $tempTVA->setCode($valeurTva['code']);
            $tempTVA->setSlug($valeurTva['slug']);
            $manager->persist($tempTVA);
            $tva[] = $tempTVA;
        }
        $manager->flush();

        // Article
        for($i = 1; $i <= 10; $i++){
            $article = new Article();
            $article->setTitre("Titre de l'article n°$i")
                    ->setContenu("Contenu de l'article n°$i")
                    ->setImage("http://placehold.it/150x150")
                    ->setExtrait("Extrait de l'article n°$i")
                    ->setDetail("Détatil de l'article n°$i")
                    ->setPrixTTC(10.25)
                    ->setSlug("titre_de_l_article_n_$i")
                    ->setNew(1);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
