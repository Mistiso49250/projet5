<?php

namespace App\DataFixtures;

use App\Entity\Age;
use App\Entity\Tva;
use App\Entity\Genre;
use App\Entity\Marque;
use App\Entity\Slider;
use APP\Entity\Article;
use App\Entity\Categorie;
use App\Entity\CategoriePrincipal;
use App\Entity\CategorieSecondaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dataCategoriesPrincipal = [
            [
                'description' => 'Naissance',
                'code' => 'naissance',
            ],
            [
                'description' => 'Imitation',
                'code' => 'imitation',
            ],
            [
                'description' => 'Jeux et jouets',
                'code' => 'jeuxJouets',
            ],
            [
                'description' => 'Mobilier & decoration',
                'code' => 'mobilier',
            ],
            [
                'description' => 'Accessoire & textile',
                'code' => 'accessoire',
            ],
            [
                'description' => 'Plein air',
                'code' => 'exterieur',
            ],
        ];
        $categoriesPrincipal = [];
        foreach ($dataCategoriesPrincipal as $dataCategoriePrincipal) {
            $tempCategoriePrincipal = new CategoriePrincipal();
            $tempCategoriePrincipal->setDescription($dataCategoriePrincipal['description']);
            $tempCategoriePrincipal->setCode($dataCategoriePrincipal['code']);
            $manager->persist($tempCategoriePrincipal);
            $categoriesPrincipal[$dataCategoriePrincipal['code']] = $tempCategoriePrincipal;
        }
        $manager->flush();


        $dataCategoriesSecondaire = [
            [
                'description' => 'pour bébé',
                'code' => 'bébé',
                'princ' => $categoriesPrincipal['naissance'],
            ],
            [
                'description' => 'Premier âge',
                'code' => 'premierage',
                'princ' => $categoriesPrincipal['jeuxJouets'],
            ],
            [
                'description' => 'eveil',
                'code' => 'eveil',
                'princ' => $categoriesPrincipal['naissance'],
            ],
            [
                'description' => 'Loisirs créatifs',
                'code' => 'créatifs',
                'princ' => $categoriesPrincipal['jeuxJouets'],
            ],
            [
                'description' => 'Construction',
                'code' => 'construction',
                'princ' => $categoriesPrincipal['jeuxJouets'],
            ],
            [
                'description' => 'Jeux de sociétés',
                'code' => 'sociétés',
                'princ' => $categoriesPrincipal['jeuxJouets'],
            ],
            [
                'description' => 'Histoire du soir',
                'code' => 'histoire',
                'princ' => $categoriesPrincipal['jeuxJouets'],
            ],
            [
                'description' => 'Jouets en bois',
                'code' => 'jouetbois',
                'princ' => $categoriesPrincipal['imitation'],
            ],
            [
                'description' => 'Déguisements',
                'code' => 'déguisements',
                'princ' => $categoriesPrincipal['imitation'],
            ],
            [
                'description' => 'Espace',
                'code' => 'espace',
                'princ' => $categoriesPrincipal['imitation'],
            ],
            [
                'description' => 'decoration',
                'code' => 'decoration',
                'princ' => $categoriesPrincipal['mobilier'],
            ],
            [
                'description' => 'mobilier',
                'code' => 'mobilier',
                'princ' => $categoriesPrincipal['mobilier'],
            ],
            [
                'description' => 'bagagerie',
                'code' => 'bagagerie',
                'princ' => $categoriesPrincipal['accessoire'],
            ],
            [
                'description' => 'textile',
                'code' => 'textile',
                'princ' => $categoriesPrincipal['accessoire'],
            ],
            [
                'description' => 'Se déplacer',
                'code' => 'deplacer',
                'princ' => $categoriesPrincipal['exterieur'],
            ],
            [
                'description' => 'Jeux d\'extérieur',
                'code' => 'exterieur',
                'princ' => $categoriesPrincipal['exterieur'],
            ],

        ];
        $categoriesSecondaire = [];
        foreach ($dataCategoriesSecondaire as $dataCategorieSecondaire) {
            $tempCategorieSecondaire = new CategorieSecondaire();
            $tempCategorieSecondaire->setDescription($dataCategorieSecondaire['description']);
            $tempCategorieSecondaire->setCode($dataCategorieSecondaire['code']);
            $tempCategorieSecondaire->setCategoriePrincipal($dataCategorieSecondaire['princ']);
            $manager->persist($tempCategorieSecondaire);
            $categoriesSecondaire[$dataCategorieSecondaire['code']] = $tempCategorieSecondaire;
        }
        $manager->flush();

        $dataCategories = [
            [
                'description' => 'Doudous',
                'code' => 'doudou',
                'second' => $categoriesSecondaire['bébé'],
            ],
            [
                'description' => 'Peluches',
                'code' => 'peluche',
                'second' => $categoriesSecondaire['bébé'],
            ],
            [
                'description' => 'Albums photo',
                'code' => 'albums',
                'second' => $categoriesSecondaire['bébé'],
            ],
            [
                'description' => 'Protège carnet de santé',
                'code' => 'carnetsanté',
                'second' => $categoriesSecondaire['bébé'],
            ],
            [
                'description' => 'Jouets de bain',
                'code' => 'bain',
                'second' => $categoriesSecondaire['eveil'],
            ],
            [
                'description' => 'Jouets à tirer',
                'code' => 'tirer',
                'second' => $categoriesSecondaire['eveil'],
            ],
            [
                'description' => 'Jouets à suspendre',
                'code' => 'suspendre',
                'second' => $categoriesSecondaire['eveil'],
            ],
            [
                'description' => 'Mobile',
                'code' => 'mobile',
                'second' => $categoriesSecondaire['eveil'],
            ],
            [
                'description' => 'Hochets',
                'code' => 'hochet',
                'second' => $categoriesSecondaire['eveil'],
            ],
            [
                'description' => 'Cuisines',
                'code' => 'cuisine',
                'second' => $categoriesSecondaire['jouetbois'],
            ],
            [
                'description' => 'Epicerie',
                'code' => 'epicerie',
                'second' => $categoriesSecondaire['jouetbois'],
            ],
            [
                'description' => 'Garage',
                'code' => 'garage',
                'second' => $categoriesSecondaire['jouetbois'],
            ],
            [
                'description' => 'Poupée',
                'code' => 'poupée',
                'second' => $categoriesSecondaire['jouetbois'],
            ],
            [
                'description' => 'Miniature',
                'code' => 'miniature',
                'second' => $categoriesSecondaire['jouetbois'],
            ],
            [
                'description' => 'Figurine',
                'code' => 'figurine',
                'second' => $categoriesSecondaire['jouetbois'],
            ],
            [
                'description' => 'Chevalier',
                'code' => 'chevalier',
                'second' => $categoriesSecondaire['déguisements'],
            ],
            [
                'description' => 'Téléscope',
                'code' => 'telescope',
                'second' => $categoriesSecondaire['espace'],
            ],
            [
                'description' => 'Globe terrestre',
                'code' => 'globe',
                'second' => $categoriesSecondaire['espace'],
            ],
            [
                'description' => 'Premier jeux d\'éveil',
                'code' => 'premiereveil',
                'second' => $categoriesSecondaire['premierage'],
            ],
            [
                'description' => 'Chariots de marche',
                'code' => 'chariot',
                'second' => $categoriesSecondaire['premierage'],
            ],
            [
                'description' => 'Cheval à bascule',
                'code' => 'bascule',
                'second' => $categoriesSecondaire['premierage'],
            ],
            [
                'description' => 'Porteur',
                'code' => 'porteur',
                'second' => $categoriesSecondaire['premierage'],
            ],
            [
                'description' => 'Coloriage',
                'code' => 'coloriage',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Peinture',
                'code' => 'peinture',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Pâte à modeler',
                'code' => 'pâtemodeler',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Activités manuelle',
                'code' => 'manuelle',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Cartes à gratter',
                'code' => 'cartegratter',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Puzzle',
                'code' => 'puzzle',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Pate intélligente',
                'code' => 'pateInté',
                'second' => $categoriesSecondaire['créatifs'],
            ],
            [
                'description' => 'Premier jeux',
                'code' => 'premier',
                'second' => $categoriesSecondaire['sociétés'],
            ],
            [
                'description' => 'Educatif',
                'code' => 'educatif',
                'second' => $categoriesSecondaire['sociétés'],
            ],
            [
                'description' => 'Réflextion/stratégie',
                'code' => 'reflexion',
                'second' => $categoriesSecondaire['sociétés'],
            ],
            [
                'description' => 'Jeux de cartes',
                'code' => 'cartes',
                'second' => $categoriesSecondaire['sociétés'],
            ],
            [
                'description' => 'Voyage',
                'code' => 'voyage',
                'second' => $categoriesSecondaire['sociétés'],
            ],
            [
                'description' => 'Jouets à empiler, encastrer',
                'code' => 'empiler',
                'second' => $categoriesSecondaire['construction'],
            ],
            [
                'description' => 'Jouets magnétique',
                'code' => 'magnétique',
                'second' => $categoriesSecondaire['construction'],
            ],
            [
                'description' => 'Jeux de constructions',
                'code' => 'construction',
                'second' => $categoriesSecondaire['construction'],
            ],
            [
                'description' => 'Lunii',
                'code' => 'lunii',
                'second' => $categoriesSecondaire['histoire'],
            ],
            [
                'description' => 'Lampe à histoire',
                'code' => 'lampehistoire',
                'second' => $categoriesSecondaire['histoire'],
            ],
            [
                'description' => 'Petite tables & chaises',
                'code' => 'tableschaises',
                'second' => $categoriesSecondaire['mobilier'],
            ],
            [
                'description' => 'Boite à dents',
                'code' => 'boitedent',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Boite à musique',
                'code' => 'boiteMusique',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Tirelire',
                'code' => 'tirelire',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Toise',
                'code' => 'toise',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Tableaux',
                'code' => 'tableaux',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Veilleuse',
                'code' => 'veilleuse',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Luminaire',
                'code' => 'luminaire',
                'second' => $categoriesSecondaire['decoration'],
            ],
            [
                'description' => 'Cartable',
                'code' => 'cartable',
                'second' => $categoriesSecondaire['bagagerie'],
            ],
            [
                'description' => 'Voyage',
                'code' => 'valise',
                'second' => $categoriesSecondaire['bagagerie'],
            ],
            [
                'description' => 'Cape et kimono de bain',
                'code' => 'capebain',
                'second' => $categoriesSecondaire['textile'],
            ],
            [
                'description' => 'Serviettes',
                'code' => 'serviette',
                'second' => $categoriesSecondaire['textile'],
            ],
            [
                'description' => 'Plaid',
                'code' => 'plaid',
                'second' => $categoriesSecondaire['textile'],
            ],
            [
                'description' => 'Draisienne',
                'code' => 'draisienne',
                'second' => $categoriesSecondaire['deplacer'],
            ],
            [
                'description' => 'Trotinette',
                'code' => 'trotinette',
                'second' => $categoriesSecondaire['deplacer'],
            ],
            [
                'description' => 'Quilles, croquet',
                'code' => 'quille',
                'second' => $categoriesSecondaire['exterieur'],
            ],
        ];
        $categories = [];
        foreach ($dataCategories as $dataCategorie) {
            $tempCategorie = new Categorie();
            $tempCategorie->setDescription($dataCategorie['description']);
            $tempCategorie->setCode($dataCategorie['code']);
            $tempCategorie->addSecondaire($dataCategorie['second']);
            $manager->persist($tempCategorie);
            $categories[$dataCategorie['code']] = $tempCategorie;
        }
        $manager->flush();


        $dataMarques = [
            [
                'titre' => 'oiseaubateau',
                'image' => 'logo\oiseaubateau.jpg',
            ],
            [
                'titre' => 'buki',
                'image' => 'logo\buki-logo.jpg',
            ],
            [
                'titre' => 'dam',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'baForKids',
                'image' => 'logo\baforkid.png',
            ],
            [
                'titre' => 'moulinroty',
                'image' => 'logo\moulinroty.png',
            ],
            [
                'titre' => 'funkyframes',
                'image' => 'logo\funkyframes.png',
            ],
            [
                'titre' => 'fresk',
                'image' => 'logo\fresk.png',
            ],
            [
                'titre' => 'bergamotte',
                'image' => 'logo\bergamote.jpg',
            ],
            [
                'titre' => 'corolle',
                'image' => 'logo\corolle.png',
            ],
            [
                'titre' => 'haba',
                'image' => 'logo\haba.png',
            ],
            [
                'titre' => 'janod',
                'image' => 'logo\janod.png',
            ],
            [
                'titre' => 'lilliputiens',
                'image' => 'logo\lilliputiens.jpg',
            ],
            [
                'titre' => 'Lunii',
                'image' => 'logo\lunii.png',
            ],
            [
                'titre' => 'djeco',
                'image' => 'logo\djeco.png',
            ],
            [
                'titre' => 'omy',
                'image' => 'logo\omy.png',
            ],
            [
                'titre' => 'smartgame',
                'image' => 'logo\smartgame.png',
            ],
            [
                'titre' => 'papo',
                'image' => 'logo\papo.jpg',
            ],
            [
                'titre' => 'pixie',
                'image' => 'logo\pixie.jpg',
            ],
            [
                'titre' => 'ulysse',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'Ugears',
                'image' => 'logo\ugears.png',
            ],
            [
                'titre' => 'vilac',
                'image' => 'logo\vilac.jpg',
            ],
        ];
        $marques = [];
        foreach ($dataMarques as $dataMarque) {
            $tempMarque = new Marque();
            $tempMarque->setTitre($dataMarque['titre']);
            $tempMarque->setImage($dataMarque['image']);
            $manager->persist($tempMarque);
            $marques[$dataMarque['titre']] = $tempMarque;
        }
        $manager->flush();

        $dataTva = [
            [
                'valeur' => '20',
                'code' => 'normal',
            ],
            [
                'valeur' => '5.5',
                'code' => 'reduit',
            ],
        ];
        $tva = [];
        foreach ($dataTva as $valeurTva) {
            $tempTVA = new Tva();
            $tempTVA->setValeurTVA($valeurTva['valeur']);
            $tempTVA->setCode($valeurTva['code']);
            $manager->persist($tempTVA);
            $tva[$valeurTva['code']] = $tempTVA;
        }
        $manager->flush();

        $dataSlider = [
            [
                'image' => 'slider\moulinroty.jpg',
            ],
            [
                'image' => 'slider\wesko.jpg',
            ],
            [
                'image' => 'slider\trybike.jpg',
            ],
        ];
        $slider = [];
        foreach ($dataSlider as $imageSlider) {
            $tempSlider = new Slider();
            $tempSlider->setImage($imageSlider['image']);
            $manager->persist($tempSlider);
            $slider[] = $tempSlider;
        }
        $manager->flush();

        $dataGenre = [
            [
                'code' => 'fille',
            ],
            [
                'code' => 'garçon',
            ],
            [
                'code' => 'mixte',
            ],
        ];
        $genre = [];
        foreach ($dataGenre as $valeurGenre) {
            $tempGenre = new Genre();
            $tempGenre->setCode($valeurGenre['code']);
            $manager->persist($tempGenre);
            $genre[$valeurGenre['code']] = $tempGenre;
        }
        $manager->flush();

        $dataAge = [
            [
                'code' => '0 - 18 mois',
            ],
            [
                'code' => '2 - 4 ans',
            ],
            [
                'code' => '5 - 7 ans',
            ],
            [
                'code' => '8 ans et +',
            ],
        ];
        $age = [];
        foreach ($dataAge as $valeurAge) {
            $tempAge = new Age();
            $tempAge->setCode($valeurAge['code']);
            $manager->persist($tempAge);
            $age[$valeurAge['code']] = $tempAge;
        }
        $manager->flush();

        // $dataArticleImage = [
        //     [
        //         'image' => 'moulin\chat_moutarde_Lulu_Les_Moustaches2.jpg',
        //     ],
        // ];
        // $articleImage = [];
        // foreach ($dataArticleImage as $valeurArticleImage) {
        //     $tempArticleImage = new ArticleImage();
        //     $tempArticleImage->setImage($valeurArticleImage['image']);
        //     $manager->persist($tempArticleImage);
        //     $articleImage[] = $tempArticleImage;
        // }
        // $manager->flush();

        // Article
        $dataArticle = [
            [
                'titre' => 'Poulpus',
                'extrait' => 'Poulpus, Pirate à tête de pieuvre',
                'contenu' => ' un superbe pirate Arty Toys tout droit sorti des profondeurs de la mer avec sa tête de pieuvre, pour les enfants à partir de 4 ans.
                            Armé d\'un trident et et d\'une épée, il fera fuir tous ses adversaires pirates.',
                'image' => 'djeco\poulpus.jpg',
                'detail' => 'Dimension: 6,6 x 8,5 x 5 cm Dimensions de la boîte : 14 x 12 x 5,7 cm',
                'prixTTC' => 11,
                'new' => 1,
                'categorie' => $categories['figurine'],
                'marque' => $marques['djeco'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'genre'=>$genre['garçon'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Album photo Ignace',
                'extrait' => 'Album photo coloré',
                'contenu' => 'Avec cet album coloré, c’est toi le photographe. En tant que propriétaire, tu peux insérer une photo de toi sur la couverture.
                            Les 10 housses photo protègent tes photos préférées, pour toujours avoir une photo du chien, de papa ou maman, de grand-mère ou grand-père à portée de main.',
                'image' => 'lilli\Album-Photo.jpg',
                'detail' => 'Composition	100% polyester Lavable en surface',
                'prixTTC' => 25,
                'new' => 1,
                'categorie' => $categories['albums'],
                'marque' => $marques['lilliputiens'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['garçon'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Culbuto Eléphant',
                'extrait' => 'Petit éléphant très mignon qui amuse beaucoup les bébés !',
                'contenu' => 'Ce petit éléphant très mignon amuse beaucoup les bébés !  Dès qu\'on le touche, il bascule de droite à gauche à toute vitesse. Les enfants adorent ces mouvements rigolos 
                            et sont fascinés par le ravissant tintement des clochettes.',
                'image' => 'haba\culbuto-elephant.jpg',
                'detail' => 'Dimensions 17 x 10 x 10 cm
                           Âge	à partir de 6 mois',
                'prixTTC' => 17,
                'new' => 1,
                'categorie' => $categories['premiereveil'],
                'marque' => $marques['haba'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'genre'=>$genre['garçon'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Les tableaux qui bougent',
                'extrait' => 'Coffret pour une activité manuelle',
                'contenu' => 'Grâce à un système d’attaches parisiennes, les enfants inventent leur histoire tout en mouvement.
                            Ce coffret contient 4 cartes trouées à compléter, 4 enveloppes avec les éléments à ajouter, des attaches parisiennes colorées et 1 livret explicatif pas à pas en couleurs. ',
                'image' => 'djeco\Tableaux-qui-bougent.jpg',
                'detail' => 'Age minimum 4 ans
                           Thème Animaux',
                'prixTTC' => 20,
                'new' => 1,
                'categorie' => $categories['manuelle'],
                'marque' => $marques['djeco'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Jeu de bain 3 bateaux',
                'extrait' => '3 jolis bateaux colorés pour jouer dans le bain.',
                'contenu' => 'César, Alice et un martin-pecheur ont chacun embarqué sur leur voilier, prets à disputer une petite régate ! Oh ! Alice et César ont chaviré, leurs bateaux, tout inondés, sont devenus de véritables passoires !
                            Retourne-les et regarde l’eau s’écouler en jolis jets !',
                'image' => 'lilli\3-petits-bateaux-flottants.jpg',
                'detail' => 'Composition	Neoprene & polyester
                          Entretien 	Lavable à la main',
                'prixTTC' => 20,
                'new' => 1,
                'categorie' => $categories['bain'],
                'marque' => $marques['lilliputiens'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Boite à musique Les moustaches ',
                'extrait' => 'Une magnifique boîte à musique avec 2 personnages magnétiques',
                'contenu' => 'Boîte à musique de la collection Les moustaches de Moulin Roty, une magnifique boîte à musique avec 2 personnages 
                            magnétiques qui vont danser au son de la mélodie. Un adorable cadeau pour endormir ou éveiller bébé avec les illustrations mystérieuse et poétiques de la gamme.',
                'image' => 'moulin\boite-a-musique-les-moustaches-moulin-roty.jpg',
                'detail' => 'Dimensions : 12 x 12 cm
                           Matière : Bois et résine',
                'prixTTC' => 20,
                'new' => 1,
                'categorie' => $categories['boiteMusique'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'genre'=>$genre['garçon'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Boite dent de lait il était une fois',
                'extrait' => 'Boite à dent de lait de la collection il était une fois de Moulin roty',
                'contenu' => 'Cette adorable boîte à dent de lait ronde en résine colorée conservera précieusement les premières quenottes de votre petit. Joliment décorée dans les tons 
                            de rose et de parme, sur le couvercle le portrait en relief d\'une petite souris avec son chapeau de fée et sa baguette magique de la collection Il Etait Une Fois.',
                'image' => 'moulin\Boite_dent_de_lait_Il_Etait_Une_Fois.jpg',
                'detail' => 'Dimension  6 cm
                           Entretien	Lavage en surface avec un chiffon humide.
                           Couleur	Rose',
                'prixTTC' => 11,
                'new' => 0,
                'categorie' => $categories['boitedent'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['fille'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Ma fabrique à histoires Lunii',
                'extrait' => 'Une expérience magique d\'écoute mélangeant innovation et tradition',
                'contenu' => 'Pas d’écran, place à l’imagination !
                            Les enfants choisissent les différents éléments qui composeront leur histoire : un héros, un compagnon, un lieu et un objet.
                            48 histoires déjà incluses dans la boîte et des centaines d’autres à télécharger sur le Luniistore !
                            
                            La Fabrique à Histoires est équipée d\'une prise Jack et d\'un haut parleur intégré, d\'une autonomie de batterie de 10h qui se recharge via USB,
                            d\'une capacité de 30 heures d\'écoute : très pratique pour les longs voyages en famille. Elle est aussi rechargeable en histoires, les enfants ne seront donc jamais à court de nouveaux récits. 
                            Tout le contenu des Éditions Lunii est accessible sur le Luniistore, une bibliothèque interactive.
                            
                            Compatible Mac, PC et Linux, le Luniistore est une véritable librairie numérique dans laquelle les parents peuvent sélectionner de nouvelles aventures à télécharger pour leurs enfants dans 8 langues disponibles. Chaque récit est une création originale Lunii. Auteurs, conteurs et designers sonore créent avec passion des récits inédits afin d’enrichir l’univers de la marque.',
                'image' => 'lunii\ma-fabrique-a-histoires-lunii.jpg',
                'detail' => 'À partir de 3 ans',
                'prixTTC' => 60,
                'new' => 1,
                'categorie' => $categories['lunii'],
                'marque' => $marques['Lunii'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Cheval à bascule diamant',
                'extrait' => 'Ce magnifique modèle de cheval à bascule original est parfait pour les enfants ',
                'contenu' => 'Un modèle de cheval à bascule en bois inédit qui apportera une touche très déco et contemporaine dans votre intérieur. A monter soit même. A partir de 3 ans et plus.',
                'image' => 'vilac\cheval-bascule-diamant.jpg',
                'detail' => 'Hauteur de l\'assise 46 cm.
                           Age	3 ans et +
                           Dimensions	80 x 69 x 46 cm',
                'prixTTC' => 180,
                'new' => 0,
                'categorie' => $categories['bascule'],
                'marque' => $marques['vilac'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Chariot multi-activités Chat',
                'extrait' => 'Ce joli chariot en bois multi-activités, à pousser, est particulièrement adapté à l’apprentissage de la marche.',
                'contenu' => 'Grâce à sa poignée ajustable en hauteur (de 47 à 53 cm), ce chariot est évolutif et s’adapte à la taille de votre enfant. Il l\'accompagnera de 12 mois à 3 ans : son frein invisible et amovible
                            permet de bloquer les roues (à 12 mois) et de les libérer progressivement afin de maitriser la vitesse du chariot pendant l’apprentissage. En plus de la marche, votre enfant pourra tester 
                            sa motricité fine ainsi que sa dextérité avec les 8 activités ludiques proposées : looping, boite à formes, souris à glisser, descendeur, engrenage, bouton sonore, yeux rotatifs et joues en feutrine
                            pour développer le toucher. Enfin, avec ses 4 roues silencieuses en caoutchouc, il ne marque pas le sol.',
                'image' => 'janod\chariot-multi-activites-chat-bois.jpg',
                'detail' => 'Dimensions	39,5 x 34,2 x 54 cm
                            Matière	Bois (contreplaqué et MDF)',
                'prixTTC' => 65,
                'new' => 0,
                'categorie' => $categories['chariot'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Cartable baleine gris',
                'extrait' => 'Le cartable baleine gris est issu de la nouvelle collection de sacs de FRESK ',
                'contenu' => 'un cartable durable et super tendance réalisé en PET recyclé. Ce matériau léger, écologique et imperméable est issu du recyclage des bouteilles en plastique.
                            Ce cartable gris orné de baleines est doté de 2 compartiments pouvant accueillir des cahiers et livres format A4, d\'une pochette zippée, d\'une poignée robuste, de bretelles ajustables et d\'une fermeture réglable.
                            Le cartable idéal pour rentrer en maternelle ! ',
                'image' => 'fresk\cartable-whale-dawn-grey-en-pet-recycle.jpg',
                'detail' => 'Composition : 100% PET recyclé - certifié GOTS - détails en similicuir
                            Dimensions : 33 x 25 x 9 cm
                            Age : à partir de 2,5 ans',
                'prixTTC' => 45,
                'new' => 0,
                'categorie' => $categories['cartable'],
                'marque' => $marques['fresk'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Jeu de cartes Pipolo ',
                'extrait' => 'Pour gagner, il faut savoir mentir avec aplomb. Tout nu, à plumes ou poilu ?',
                'contenu' => 'Pipolo, le jeu du menteur avec des règles inspirées des grands classiques des jeux de cartes, un jeu de cartes pour les enfants à partir de 5 ans.',
                'image' => 'djeco\Jeu_de_cartes_Pipolo_Djeco.jpg',
                'detail' => 'Dimension 8,7x11,8x2,8 cm
                           Matières	carton / papier
                           Age	Dès 5 ans
                           Nombre de joueurs	2-4',
                'prixTTC' => 9,
                'new' => 0,
                'categorie' => $categories['cartes'],
                'marque' => $marques['djeco'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Bouclier et épée loup',
                'extrait' => 'Pour les apprentis chevaliers.',
                'contenu' => 'Un bouclier et une épée en bois pour les apprentis chevaliers. Les loups vont montrer leurs crocs ! Bouclier en bois diamètre 35 cm.',
                'image' => 'vilac\bouclier-et-epee-loup-vilac.jpg',
                'detail' => 'Age	4 ans et +
                           Dimensions	35 x 35 x 1 cm
                           Composition  bois',
                'prixTTC' => 22,
                'new' => 0,
                'categorie' => $categories['chevalier'],
                'marque' => $marques['vilac'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => '3D Licorne Lily',
                'extrait' => 'Quand le coloriage prend forme ',
                'contenu' => 'Jouet gonflable en papier à colorier
                Lily, la licorne est un jouet gonflable ou un joli décor pour sa chambre.',
                'image' => 'omy\lily-3d-air-toy.jpg',
                'detail' => 'AGE : 3-9 ANS',
                'prixTTC' => 15,
                'new' => 0,
                'categorie' => $categories['coloriage'],
                'marque' => $marques['omy'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['fille'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Navire de recherche',
                'extrait' => 'un hommage aux explorateurs et pionniers',
                'contenu' => 'Le Navire de recherche ». La structure en bois, qui se compose d\'un total de 575 pièces en bois individuelles, est un travail habile et fait sur mesure qui 
                            fait revivre les temps des grandes découvertes. La conquête du cercle arctique nord ou sud, du continent africain ou des latitudes sud-américaines n\'aurait 
                            pas été possible sans un développement technique supplémentaire.

                            Le navire, conçu par UGEARS dans le style steampunk, est un hommage aux explorateurs et pionniers, dont l\'esprit de recherche se reflète dans ce modèle de navire.
                            De plus, la conception rétrofuturiste de la coque était équipée de quelques extras, dont une grue pivotante et une rampe Drop . 
                            L\'illustration claire des modes techniques de mouvement peut être suivie avec précision et a donc un caractère d\'apprentissage. ',
                'image' => 'ugears\Ugears-Research-Vessel.jpg',
                'detail' => 'Nombre de composants: 575
                           Temps d\'installation: 10 heures
                           Taille du modèle : 38,5 x 11 x 25 cm',
                'prixTTC' => 55,
                'new' => 1,
                'categorie' => $categories['construction'],
                'marque' => $marques['Ugears'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['8 ans et +'],
            ],
            [
                'titre' => 'Chat moutarde Lulu Les Moustaches',
                'extrait' => 'Doudou chat moutarde Lulu, Les Moustaches',
                'contenu' => 'doudou tout doux Lulu de la collection Les Moustaches fera le bonheur de votre petit. Ce compagnon de forme carrée est en velours
                             couleur moutarde d\'un côté et en tissu rayé de l\'autre. Ce matou possède une attache-tétine afin de pas égarer la sucette de bébé',
                'image' => 'moulin\chat_moutarde_Lulu_Les_Moustaches.jpg',
                'detail' => 'Dimension: 22cm 
                           Matières: coton, polyester, élasthanne
                           Entretien: lavage en machine 30° délicat
                           Couleur: jaune
                           Age: dés la naissance',
                'prixTTC' => 22,
                'new' => 1,
                'categorie' => $categories['doudou'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Draisienne Indian',
                'extrait' => 'Cette draisienne pourra accompagner votre petit aventurier de 3 à 6 ans.',
                'contenu' => 'Son premier vélo sans pédale aidera votre enfant à entraîner son sens de l\'équilibre et le préparera au "vrai" vélo, sans forcément devoir passer par l\'étape "petites roues". 
                            Cette draisienne pourra accompagner votre petit aventurier de 3 à 6 ans.
                            Les pneus, en 12 pouces (30 cm), sont "pleins" c\'est-à-dire sans chambre à air, et donc sans aucun risque de perte de gonflage. 
                            La selle est réglable en hauteur sur 3 positions : 33, 35 et 37 cm du sol. Une poignée usinée dans le cadre permet de facilement transporter la draisienne.',
                'image' => 'ulysse\draisienne-indien.jpg',
                'detail' => 'Dimension : 86 x 40 x 58 cm
                           Age  de 3 à 6 ans 
                           Réglage de la selle 33, 35 et 37 cm du sol',
                'prixTTC' => 90,
                'new' => 1,
                'categorie' => $categories['draisienne'],
                'marque' => $marques['ulysse'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Sac à dos primaire Ours Polaire',
                'extrait' => 'Grâce à ce charmant sac à dos Fresk, votre enfant sera fin prêt pour l\'école primaire.',
                'contenu' => 'Sac à dos orné d\'ours polaires et de détails en cuir pour rentrer à l\'école maternelle avec style ! Les plus grands pourront l\'utiliser comme sac de natation ou de gym. 
                            Cerise sur le gâteau : ce sac à dos est conçu en bouteilles PET recyclées. 

                            Ce sac à dos est doté d\'un grand compartiment, d\'une pochette séparée pour la gourde, d\'une poche avant avec une fermeture aimantée, de bretelles ajustables, d\'une fermeture éclair,
                            de 2 poignées et d\'une étiquette pour indiquer le nom de l\'heureux propriétaire.',
                'image' => 'fresk\Sac_dos_primaire_Ours_Polaire_Fresk.jpg',
                'detail' => 'Dimension du produit	40x25x10 cm
                           Entretien	lavage en surface avec un chiffon humide
                           Couleur	Gris
                           Age	Dès 6 ans
                           Label	Eco-friendly, GOTS',
                'prixTTC' => 46,
                'new' => 0,
                'categorie' => $categories['cartable'],
                'marque' => $marques['fresk'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Eduludo spacio',
                'extrait' => 'un jeu éducatif pour apprendre à votre enfant à se repérer dans l\'espace.',
                'contenu' => 'Devant, derrière, à-côté... la notion d\'espace est difficile à appréhender pour les enfants, c\'est pourquoi il 
                            est plus facile de leur expliquer avec des figurines. Eduludo Spacio de Djeco est un beau jeu pour se repérer dans l\'espace.

                            Pour reproduire la photo, l\'enfant doit placer correctement les figurines sur le plateau. Où est la girafe, devant ou derrière l\'éléphant?
                            Le coffret comprend un plateau en bois, 6 figurines en plastique, 20 cartes défis avec la solution au dos des cartes et la règle du jeu',
                'image' => 'djeco\eduludo-spacio-djeco.jpg',
                'detail' => 'Dimensions : 21,5 x 21,5 x 6 cm
                           Age de 4 à 6 ans',
                'prixTTC' => 20,
                'new' => 0,
                'categorie' => $categories['educatif'],
                'marque' => $marques['djeco'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Poulet rôti à découper',
                'extrait' => 'Cuisine ce délicieux poulet, découpe-le et à table !',
                'contenu' => 'Poulet rôti à découper se composant de 9 pièces en bois, tout le nécessaire pour déguster un bon poulet rôti ! Une dinette en bois à partir de 3 ans.

                Ce plateau se compose d\'une planche à découper, un couper, une broche et un poulet avec les ailes et les cuisses.
                Votre enfant s\'amusera à découper le poulet grâce au velcro.',
                'image' => 'vilac\poulet-roti-a-decouper-vilac.jpg',
                'detail' => 'Matières : Bois
                           Dimensions : 10 x 15 x 7 cm
                           Nombre de composants : 9
                           Age	3 ans et +',
                'prixTTC' => 20,
                'new' => 0,
                'categorie' => $categories['epicerie'],
                'marque' => $marques['vilac'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Télescope 50 activités',
                'extrait' => 'Découvrir l\'espace et les sciences avec ce télescope éducatif',
                'contenu' => 'Un télescope réflecteur avec une notice de 50 activités pour découvrir le ciel étoilé, les planètes et les cratères lunaires.',
                'image' => 'buki\telescope-50.jpg',
                'detail' => 'Lentille de 76 mm de diamètre et 3 oculaires de 20 mm ; 12.5 mm et 4 mm interchangeables.

                            Trépied de sol de 76 cm. Le tube et le trépied sont en métal.
                            Age De 8 ans jusqu\'à 12 ans',
                'prixTTC' => 80,
                'new' => 0,
                'categorie' => $categories['telescope'],
                'marque' => $marques['buki'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['8 ans et +'],
            ],
            [
                'titre' => 'Allosaure',
                'extrait' => 'foulez la terre du Jurassique',
                'contenu' => 'Avec les dinosaures, foulez la terre du Jurassique, côtoyez le légendaire T-Rex, parcourez de vastes plaines avec le vélociraptor ou envolez-vous avec un ptéranodon.',
                'image' => 'papo\allosaure.jpg',
                'detail' => 'Longueur: 25 cm
                            Hauteur: 10,5 cm
                            Matériau: PVC norme C.E.
                            Age: à partir de 3 ans',
                'prixTTC' => 28,
                'new' => 0,
                'categorie' => $categories['figurine'],
                'marque' => $marques['papo'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Garage station service',
                'extrait' => 'Tut tut ! Les voitures et scooters s\'avancent pour faire le plein d\'essence et passent au nettoyage pour être rutilantes !',
                'contenu' => 'Tut tut ! Les voitures et scooters s\'avancent pour faire le plein d\'essence et passent au nettoyage pour être rutilantes ! Ce grand garage station service en bois 
                            est sur trois niveaux et est équipé d\'un ascenseur manuel et d\'un centre de lavage au premier niveau. Il comprend 8 accessoires en bois pour s\'imaginer des tas d\'histoires !
                            Il contient 4 véhicules, 1 pompe à essence, 3 personnages "en activité" ( 2 garagistes et personnages en scooter) et une planche de stickers de format A4 pour décorer le garage !',
                'image' => 'janod\garage-station-service-bois.jpg',
                'detail' => 'Dimensions	46,2 x 31,2 x 35 cm
                           Matière	Bois',
                'prixTTC' => 70,
                'new' => 0,
                'categorie' => $categories['garage'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Hochet bois Pakou',
                'extrait' => 'Cet hochet à mâchouiller soutiendra aussi bébé lors des poussées dentaires un peu douloureuses.',
                'contenu' => 'Ce hochet en bois de hêtre aux joyeuses couleurs tropicales accompagnera bébé dans sa première année. 
                            Il se compose de plusieurs éléments, quelques feuilles aux jolies teintes vertes, rouges et bleues, et d’un petit toucan. Facile à saisir, le jouet d’éveil aide bébé dans son apprentissage de la motricité fine',
                'image' => 'moulin\Hochet_bois_Pakou.jpg',
                'detail' => 'Dimension 10,5x2,5x12,5 cm
                           Détails des matières	Bois, plastique
                           Couleur	Multicolore
                           Age	Dès 12 mois',
                'prixTTC' => 12,
                'new' => 0,
                'categorie' => $categories['hochet'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Épicerie green market',
                'extrait' => 'Comme au marché ! Quelle jolie épicerie avec ses couleurs fraîches et son décor fruits et légumes ! ',
                'contenu' => 'Avec ses nombreux accessoires, elle est parfaite pour les apprentis marchands ! La marchande Green Market est équipée d\'une horloge, d\'un panneau ardoise pour poser
                            les additions ou noter les horaires d\'ouverture, d\'une boite de craies, de six boites d\'aliments en carton (farine, riz, jus d\'orange, cacao, pâte et fromage), 
                            d\'une caisse enregistreuse et d\'une balance. Dans les petits casiers les enfants pourront placer les fruits et légumes suivants : trois pommes, trois bananes,
                            trois fraises, trois carottes, trois radis et trois pommes de terre. Sur le devant de chaque casier une petite partie ardoise permettra également d\'inscrire le prix de chaque article. 
                            Pour les plus petits, un marche pied permet d\'être à la bonne hauteur. Pour faire les courses comme des grands, trois sacs de courses en papier au nom de la petite boutique sont inclus ! 
                            Pour compléter ces accessoires, les enfants auront bien sûr pièces et billets afin de régler la note. Au total, ce sont 32 accessoires inclus dans cette épicerie en bois !',
                'image' => 'janod\epicerie-green-market-bois.jpg',
                'detail' => 'Dimensions	43 x 30 x 93 cm
                           Matière	Bois, papier, carton',
                'prixTTC' => 100,
                'new' => 0,
                'categorie' => $categories['epicerie'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 1,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Quilles jurassiennes',
                'extrait' => 'Beau jeu de 12 quilles jurassiennes au bâton en bois massif livrées avec la règle du jeu franc-comtoise.',
                'contenu' => 'Beau jeu de 12 quilles jurassiennes au bâton en bois massif livrées avec la règle du jeu franc-comtoise. Pour jouer, il faut faire 63 points et ne pas sortir de l’aire de jeu au risque d’être éliminé. 
                            Compatible avec la règle du jeu des quilles finlandaises. Fabriqué en France.',
                'image' => 'janod\quilles-jurassiennes-bois.jpg',
                'detail' => 'Dimensions	26 x 10 x 20,5 cm
                           Matière	Bois massif
                           Nb Joueurs	2 et plus',
                'prixTTC' => 35,
                'new' => 0,
                'categorie' => $categories['quille'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
                'age'=>$age['8 ans et +'],
            ],
            [
                'titre' => 'Escargot à promener',
                'extrait' => 'Cet escargot en bois à promener est très rigolo ! La coquille tourne lorsqu\'on le promène',
                'contenu' => 'Cet escargot en bois à promener est très rigolo ! La coquille tourne lorsqu\'on le promène et s\'enlève pour révéler un tambourin et un petit xylophone ! Les antennes de l\'escargot sont 
                            également amovibles et forment les baguettes. Un joli compagnon aux tons très doux et très actuels qui éveillera votre enfant à la musique de façon ludique !',
                'image' => 'janod\escargot-a-promener-pure-bois.jpg',
                'detail' => 'Dimensions	20,5 x 8,9 x 20 cm
                           Matière	Bois (hêtre et contreplaqué)',
                'prixTTC' => 30,
                'new' => 0,
                'categorie' => $categories['tirer'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Jouet à suspendre Georges hochet clap clap',
                'extrait' => ' se suspend par la queue et soulage les gencives douloureuses',
                'contenu' => 'Clap Clap ! Georges applaudit avec ses pattes anneau de dentition. Suspend-le par la queue et fais retentir le petit grelot placé dans son cerceau.',
                'image' => 'lilli\Georges-hochet-clap-clap.jpg',
                'detail' => 'Composition	Tissu externe: 100% Polyester T/C: 80% Polyester - 20% coton
                           Lavage	Lavable en machine à 30°C – cycle délicat',
                'prixTTC' => 25,
                'new' => 0,
                'categorie' => $categories['suspendre'],
                'marque' => $marques['lilliputiens'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'genre'=>$genre['garçon'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Lampe à histoires Chien pourri !',
                'extrait' => 'Une lampe torche qui projette des images en couleurs pour raconter de jolies histoires',
                'contenu' => '3 disques, 3 histoires originales pour découvrir les aventures de ce chien et ses amis.
                            Chacun des 3 disques projetés sur le mur raconte les aventures délirantes de Chien pourri, héros farceur de l\'école des loisirs. Les illustrations colorées embarquent l\'enfant dans un monde
                            imaginaire où il y a tout à inventer! ',
                'image' => 'moulin\lampe-a-histoires-chien-pourri.jpg',
                'detail' => 'La lampe projette des images jusqu\'à 90 cm de large.
                            Fonctionne avec 3 piles bouton fournies (1,5 V AG13/LR44)
                            Dimensions : 16 x 4 cm',
                'prixTTC' => 13,
                'new' => 0,
                'categorie' => $categories['lampehistoire'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Lampe ballon',
                'extrait' => 'Plafonnier Encastré en Forme de Ballon',
                'contenu' => 'Son design poétique trouve parfaitement sa place dans n’importe quelle pièce que cela soit chambre, salon ou encore entrée et l’illusion des ballons gonflables est parfaite
 La cordelette ! Le petit truc en plus de ces étonnants luminaires c’est la cordelette. Outre sa fonction décorative, celle-ci a une vraie utilité puisqu’il s’agit de l’interrupteur.',
                'image' => 'lampe_ballon.jpg',
                'detail' => 'Tension 220V-240V
                            Couleur Blanc
                            Type D\'ampoule LED/Incandescent/Fluorescent
                            Matière Acrylique
                            Taille 30cm
                            Type De Lampe Plafonnier
                            Ampoule non incluse 
                            Base D\'ampoule E26/E27',
                'prixTTC' => 45,
                'new' => 1,
                'categorie' => $categories['luminaire'],
                'marque' => $marques['buki'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Mobile musical Le voyage d\'Olga',
                'extrait' => 'Ravissant mobile musical croisillon de la collection Le voyage d\'Olga',
                'contenu' => 'Un mobile en bois pour éveiller le jour et endormir la nuit. Un mobile à accrocher au lit de bébé ou au parc destiné à la stimulation visuelle et auditive de bébé. Il sera bercé par les oies, les étoiles et la lune ',
                'image' => 'moulin\mobile-musical-le-voyage-d-olga.jpg',
                'detail' => 'Dimensions : 35 x 65 cm Mobile vendu avec la potence en bois. Lavage en surface, pas de sèche-linge Matière : coton, polyester, lin et bois',
                'prixTTC' => 80,
                'new' => 0,
                'categorie' => $categories['mobile'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'genre'=>$genre['fille'],
                'age'=>$age['0 - 18 mois'],
            ],
            // [
            //     'titre'=>'Montre Cheval',
            //     'extrait'=>'Ludique, originale et colorée',
            //     'contenu'=>'La montre pédagogique Cheval est issue de la collection Little Big Room de la marque française Djeco. Elle se compose de 3 aiguilles et d\'un double cadran avec au centre les heures et autour les minutes. Son bracelet en polyester de 20 cm et sa fermeture de type boucle ardillon ',
            //     'image'=>'djeco\montre-cheval.jpg',
            //     'detail'=>'Pile incluse SR626SW Sony Dimensions de la montre : 3 x 20 x 1,4 cm, poids de 15 grammes Dimensions de la boite : 5,3 x 22,5 x 1,5 cm Les montres Djeco sont garanties 2 ans et sans bisphénol A.',
            //     'prixTTC'=>23,
            //     'new'=>0,
            //     'categorie'=>$categories['montre'],
            //     'marque'=>$marques['djeco'],
            //     'tva'=>$tva['normal'],
            //     'selection'=>0,
                // 'genre'=>$genre['fille'],
                // 'age'=>$age['5 - 7 ans'],       
            // ],
            // [
            //     'titre'=>'Kalimba Le Voyage d\'Olga',
            //     'extrait'=>'Idéal pour les petits musiciens',
            //     'contenu'=>'Les lamelles en métal émettent des sons différents selon la taille. La sonorité est harmonieuse quelque soit l\'âge du joueur. Illustré du renard de la gamme, cet instrument de musique permettra à votre enfant de s\'éveiller à la musique',
            //     'image'=>'moulin\kalimba.jpg',
            //     'detail'=>'Dimension du produit	13x14 cm
            //             Détails des matières	MDF, métal
            //             Marque	Moulin Roty
            //             Couleur	Multicolore
            //             Age	Dès 4 ans',
            //     'prixTTC'=>25,
            //     'new'=>0,
            //     'categorie'=>$categories['musique'],
            //     'marque'=>$marques['moulinroty'],
            //     'tva'=>$tva['normal'],
            //'selection'=>0,
            //  'genre'=>$genre['mixte'],
            //  'age'=>$age['5 - 7 ans'],  
         // ],
            [
                'titre' => 'Pate intélligente crazy aaron - baguette de sorcier',
                'extrait' => 'A manipuler, à modeler mais pas que',
                'contenu' => 'Elle rebondit et chaque pâte de la gamme Crazy Aaron a une propriété en plus. Violette aux étincelles dorées elle devient bleut électrique dans le noir',
                'image' => 'pate-crazy-aaron-baguette-de-sorcier-crazy-aaron.jpg',
                'detail' => 'boite de 10cm de diamètre Conseillé à partir de 6 ans',
                'prixTTC' => 15,
                'new' => 0,
                'categorie' => $categories['pateInté'],
                'marque' => $marques['dam'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Pantin lapin Rose',
                'extrait' => 'On peut l’accrocher partout',
                'contenu' => 'Ce joyeux lapin rose a de si longues oreilles, on peut l’accrocher partout pour le  garder et ne jamais le perdre. Il peut tout faire avec : le poirier, de la balançoire, s’accroche au fil à linge, et va même jusqu’à se balancer à la lune. Avec ses si longues oreilles, il enveloppe les bébés de tendres câlins et partage des moments de douceur avec eux. Lavable en machine. Présenté dans un joli coffret cadeau personnalisable avec un message dans l\'espace disponible sous le couvercle.',
                'image' => 'janod\pantin-lapin-rose-medium.jpg',
                'detail' => 'Matière(s) Velours Couleur Rose Taille 35 cm',
                'prixTTC' => 25,
                'new' => 0,
                'categorie' => $categories['peluche'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['fille'],
                'age'=>$age['0 - 18 mois'],
            ],
            // [
            //     'titre'=>'',
            //     'extrait'=>'',
            //     'contenu'=>'',
            //     'image'=>'',
            //     'detail'=>'',
            //     'prixTTC'=>180,
            //     'new'=>0,
            //     'categorie'=>$categories['petite voiture'],
            //     'marque'=>$marques[''],
            //     'tva'=>$tva['normal'],
            // 'selection'=>0,
            // 'genre'=>$genre[''],
            // 'age'=>$age[''],
           // ],
            [
                'titre' => 'Porteur voiture vintage en métal',
                'extrait' => 'Porteur pour les enfants dès 18 mois ',
                'contenu' => 'la voiture en métal bleu pétrole de Vilac, un porteur idéal pour les enfants à partir de 18 mois au look qui fera craquer tous les parents. Un cadeau à offrir dès la naissance ou le baptême pour décorer la chambre ou pour le premier anniversaire. Ce porteur est un petit bijou avec sa carrosserie en métal bleu pétrole.',
                'image' => 'vilac\voiture-porteur-metal-bleu-petrole-vilac.jpg',
                'detail' => 'Couleur bleu pétrole Age 18 mois et + Dimensions	76 x 38 x 40 cm À monter soi-même. Hauteur de l\'assise = 28 cm.',
                'prixTTC' => 110,
                'new' => 0,
                'categorie' => $categories['porteur'],
                'marque' => $marques['vilac'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Ma Corolle Priscille',
                'extrait' => 'Priscille de Corolle est parée pour passer un Hiver Polaire !',
                'contenu' => 'La poupée Ma Corolle Priscille de Corolle est parée pour passer un Hiver Polaire ! Poupée de 36 cm en édition limitée, Priscille a un corps souple « effet » sous-vêtement avec de longs cheveux soyeux faciles à coiffer. Son visage, ses bras et ses jambes, à la délicate senteur de vanille, sont en vinyle doux au toucher. Avec ses yeux dormeurs, elle dort quand on la couche sur le dos. Elle est habillée d\'une toque en fausse fourrure et lainage écrue, d\'une veste sans manches en fausse fourrure écrue avec un petit nœud bleu constellé de pois argentés, d\'une robe à pois argentés, d\'une paire de collants écrus et chaussée d\'une paire de bottines argentés avec de la fausse fourrure.',
                'image' => 'corolle\Priscille.jpg',
                'detail' => 'Âge De 4 à 8 ans Marque	Corolle Poids 706 g Poupée de 36cm Emballage 18.5 x 13 x 40 cm',
                'prixTTC' => 70,
                'new' => 0,
                'categorie' => $categories['poupée'],
                'marque' => $marques['corolle'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['fille'],
                'age'=>$age['2 - 4 ans'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Georges housse Carnet de santé ',
                'extrait' => 'Un magnifique protège carnet de santé pratique et coloré',
                'contenu' => 'Un cadeau utile et tout en douceur pour les jeunes mamans, cette housse zippée de Georges le lémurien protègera le carnet de santé de bébé. Très pratique, vous y glisserez son carnet, y écrirez son nom et y glisserez toutes les informations indispensables dans les pochettes intérieures, pour tout transporter dans les meilleures conditions.',
                'image' => 'lilli\georges-housse-carnet-de-sante-lilliputiens.jpg',
                'detail' => 'Dimensions : 24 x 17 cm Matière : polyester et coton  lavable à 30° en mâchine.',
                'prixTTC' => 26,
                'new' => 0,
                'categorie' => $categories['carnetsanté'],
                'marque' => $marques['lilliputiens'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['garçon'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Puzzle dodo 350 pièces Puzz\'art',
                'extrait' => 'Un Puzz\'art au format inédit sans coins ni bordures',
                'contenu' => ' le puzzle Dodo de 350 pièces, un Puzz\'art Djeco au format inédit sans coins ni bordures pour les enfants dès 7 ans. Un oiseau qui vous demandera de la patience et de la concentration. Un format inédit et une façon ludique et originale de réaliser un puzzle avec une grande silhouette dans laquelle de nombreuses illustrations sont représentées.',
                'image' => 'djeco\puzzle-dodo-350-pieces-puzz-art-djeco.jpg',
                'detail' => 'Dimension du puzzle : 46 x 62 cm Dimension de la boîte : 34 x 23 x 5 cm',
                'prixTTC' => 15,
                'new' => 0,
                'categorie' => $categories['puzzle'],
                'marque' => $marques['djeco'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Pagodes édition du dragon',
                'extrait' => 'Construisez chemins et ponts pour relier les pagodes entre elles!',
                'contenu' => 'Placez judicieusement les pièces nécessaires à la construction de chemins et de ponts pour vous rendre d’une pagode à l’autre!
                Quels étages de chaque pagode relierez-vous ensemble pour trouver la solution ? Propose 80 défis de niveau de difficulté croissant.
                Dans cette édition de luxe, un dragon d’or vous fournira des indices supplémentaires !',
                'image' => 'smart\smartgames_templeconnectiondragonedition-FR_banner.jpg',
                'detail' => 'Âge 7+ Défis 80 Joueurs 1
                Dans la boîte Un plan de jeu, 3 pagodes, 7 pièces de jeu, 1 Dragon et 1 livret de 80 défis et toutes les solutions.',
                'prixTTC' => 25,
                'new' => 0,
                'categorie' => $categories['reflexion'],
                'marque' => $marques['smartgame'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['5 - 7 ans'],
            ],
            [
                'titre' => 'Poule poule',
                'extrait' => 'Le Festival de Cinéma vient de commencer, et l’avant-première du film Poule Poule est en train de virer au drame...',
                'contenu' => 'Un peu moins d’une heure avant la projection, ce maladroit de Waf a mélangé l’ensemble des pellicules. Pour aider Cocotte, qui n’a pas une minute à perdre, et pour éviter que Crack ne craque pour de bon, il faut reconstituer le film au plus vite. Et n’oubliez pas, l’histoire ne prend fin qu\'à l\'apparition du cinquième œuf!
                Le réalisateur, appelé le "Maître Poule Poule", va empiler les cartes, une par une, les unes sur les autres au centre de la table. Pendant ce temps, les autres joueurs devront "juste" compter les oeufs "disponibles" et être le premier à taper sur le tas dès qu’il y en a 5… facile non? Attendez-vous à quelques perturbations tout de même… car : Lorsqu\'une poule vient couver un oeuf, il disparait! Lorsqu\'un renard chasse une poule, elle s\'enfuit... et l\'oeuf réapparait!               
                Et c\'est sans compter sur le reste du casting... comprenant : Rico Coco (le coq au passé tumultueux), Waf (le cousin de Paf), Tiger Worm (le ver qui fera son trou), Crack et Double (qui ont bien l\'intention de percer... leur coquille), Coin (l’ambitieux canard bruyant), Grrr (qui essaye de se faire passer pour une poule), et le Fermier...',
                'image' => 'pixie\Poule-Poule.jpg',
                'detail' => 'De 2 à 8 joueurs à partir de 8 ans.
                Durée de la partie : 20 min',
                'prixTTC' => 15,
                'new' => 0,
                'categorie' => $categories['cartes'],
                'marque' => $marques['pixie'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['8 ans et +'],
            ],
            [
                'titre' => 'HORS-JEU',
                'extrait' => 'Boule & Bill, c’est l’histoire d’une amitié extraordinaire',
                'contenu' => 'Boule & Bill, c’est l’histoire d’une amitié extraordinaire entre un petit garçon et son chien ! Le cocker le plus célèbre de la bande dessinée fait équipe avec son meilleur ami Boule et la tortue Caroline pour de nouvelles aventures hors du cadre! Un design qui séduira autant les enfants que les collectionneurs. Cette oeuvre est issue d’une belle collaboration entre les studios créations Mediatoon et Funky Frame',
                'image' => 'funkyframe\xbouleetbill_hors-jeu-600x600.png',
                'detail' => 'D’après l’univers de Boule et Bill par Roba.
                Cadre en bois
                Finition du design: mate
                Dimensions du cadre : 50 x 50 x 3 cm
                Dimension du design externe : 35 cm maximum en dehors du cadre ( 1 cm d’épaisseur)
                Poids : 1.3 kg
                Système d’accroche : cadre avec huit accroches murales sur sa partie dorsale.
                Emballage : un emballage sous forme de mallette, 100% recyclable, facile à transporter et idéal
                pour offrir.
                Copyright Studio Boule et Bill, 2019',
                'prixTTC' => 150,
                'new' => 0,
                'categorie' => $categories['tableaux'],
                'marque' => $marques['funkyframes'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Table et Chaises Banquise',
                'extrait' => 'Pour les artistes en herbe',
                'contenu' => ' 
                Avec cette table en bois et ses 2 chaises aux couleurs douces, les enfants pourront dessiner et jouer à volonté. Les chaises sont adaptées à la taille des enfants dès 3 ans. Au centre de la table, le pot à crayon permettra de ranger les feutres et crayons de couleurs. Le pot à crayon amovible est fourni. Crayons de couleurs non inclus.',
                'image' => 'janod\AB0005676068_1.jpg',
                'detail' => 'Dimensions 60 x 60 x 47 cm Matière Bois 
                La table a un diamètre de 60 cm et mesure 47 cm de haut. Les chaises mesurent 49 cm de haut. La hauteur de l\'assise est de 26 cm et mesure 29 cm par 27 cm.',
                'prixTTC' => 90,
                'new' => 0,
                'categorie' => $categories['tableschaises'],
                'marque' => $marques['janod'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Tirelire éléphant Sous mon baobab',
                'extrait' => 'Bergamote l\'éléphant se promène avec Paprika le lion sur le dos.',
                'contenu' => 'Une jolie tirelire en résine avec Paprika le lion et ses amis les oiseaux qui se baladant à dos d\'éléphant. Un cadeau de naissance très décoratif pour la chambre des bébés. 
                En résine, elle participera à la décoration de chambre de votre enfant et renfermera dans le ventre de cet éléphant les sous de votre enfant.',
                'image' => 'moulin\tirelire_sous_mon_baobab.jpg',
                'detail' => 'Dimensions de la tirelire : 14 x 14 cm',
                'prixTTC' => 29,
                'new' => 0,
                'categorie' => $categories['tirelire'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Toise carnet Les Moustaches',
                'extrait' => 'toise en carton avec stickers déco reprenant les couleurs et illustrations de la gamme.',
                'contenu' => 'une fois dépliée vous pourrez inscrire le prénom de l\'enfant, sa date de naissance, et sa taille de naissance. Puis vous aurez à votre disposition des stickers pour compléter la toise au fil des années. Des stickers "c\'est mon anniversaire, j\'ai...ans !" et des stickers marquants les étapes de la vie de votre bébé : "je sais faire mes lacets","je sais lire", "je sais compter jusqu\'à 10", "mon premier jour d\'école"...',
                'image' => 'moulin\Toise_carnet_Les_Moustaches_-_Moulin_Roty.jpg',
                'detail' => 'Dimensions de la toise dépliée : 15 x 138 cm',
                'prixTTC' => 18,
                'new' => 0,
                'categorie' => $categories['toise'],
                'marque' => $marques['moulinroty'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Porteur & trottinette Scoot & ride',
                'extrait' => 'Un porteur intelligent qui se transforme en trottinette.',
                'contenu' => 'Le Highwaykick 1 de Scoot and Ride est un porteur intelligent qui se transforme en trottinette pour le plus grand plaisir de votre bambin. Alors qu\'il sait à peine marcher, dès qu\'il a soufflé sa première bougie, il peut goûter à la joie de se déplacer en toute autonomie grâce au mode porteur. L\'engin a été conçu pour apporter un maximum de confort et de sécurité à votre enfant. Quand il marche enfin et se tient debout, vous pouvez très facilement modifier la configuration du porteur. Sans outil, vous le passez en mode trottinette en quelques secondes.',
                'image' => 'baForKids\scoot-and-ride-highwaykick-1-kiwi-04.jpg',
                'detail' => 'Pour les enfants de 1 à 5 ans
                Porteur/trottinette 2 en 1
                Supporte un poids de 20 kg en mode porteur et 50 kg en mode trottinette
                Passe du mode porteur au mode trottinette en quelques secondes sans outil
                Trotteur à 3 roues : 1 petite à l\'arrière et 2 à l\'avant très larges pour plus de stabilité
                Possède un tampon de sécurité breveté entre les roues avant pour éviter à l\'engin de basculer
                En mode porteur, large assise souple pour plus de confort
                Assise réglable en hauteur de 22,5 à 29 cm
                Guidon réglable en hauteur pour s\'adapter à la taille de l\'enfant de 82 à 118 cm
                Roue arrière munie d\'un garde-boue',
                'prixTTC' => 105,
                'new' => 1,
                'categorie' => $categories['trotinette'],
                'marque' => $marques['baForKids'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
                'age'=>$age['2 - 4 ans'],
            ],
            [
                'titre' => 'Luciole Perceval',
                'extrait' => 'Lampe d\'ambiance à poser pour lire et écouter des histoires',
                'contenu' => 'aussi jolie éteinte qu\'allumée, entièrement décorée à la main : un futur compagnon de chambre, à la personnalité affirmée.
                Lampe avec transformateur basse tension à la prise, entièrement sécurisée l\'enfant ne peut pas toucher l\'ampoule.             
                Coque en résine incassable et ampoule protégée et inaccessible par l\'enfant. Seul un adulte est habilité à changer l\'ampoule.  Répond parfaitement aux normes CE et à l\'esprit de celles-ci.',
                'image' => 'oiseauBateau\luciole-perceval.jpg',
                'detail' => 'Coloris	Bleu
                Matiere	Résine
                Profil	Garçon
                Dimension	300x180x180',
                'prixTTC' => 80,
                'new' => 0,
                'categorie' => $categories['veilleuse'],
                'marque' => $marques['oiseaubateau'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['garçon'],
                'age'=>$age['0 - 18 mois'],
            ],
            [
                'titre' => 'Sac week-end Pingouin',
                'extrait' => 'idéal pour les sorties du week-end, les activités sportives ou encore les séjours chez les grands-parents',
                'contenu' => 'Fabriqué à partir de bouteilles en PET recyclées, ce sac à motifs possède une poche extérieure avec une fermeture éclair ainsi qu\'un compartiment interne. De plus, grâce à ses doubles poignées adaptées aux petites mains, votre bambin pourra le transporter facilement lors de ses déplacements. Ultra pratique pour ranger les petites affaires de votre bout de chou et les maintenir bien en sécurité, cet adorable sac cylindrique est à la fois esthétique, résistant et fonctionnel. Un allié parfait pour les premiers voyages de votre petit. Disponibles dans de nombreux motifs.',
                'image' => 'fresk\Sac_weekend_enfant_Pingouin_Fresk.jpg',
                'detail' => 'Dimension du produit	46x21x21 cm
                Conseils d\'entretien	lavage en surface avec un chiffon humide
                Couleur	Jaune
                Age	Dès 12 mois
                Label	Eco-friendly, GOTS',
                'prixTTC' => 180,
                'new' => 0,
                'categorie' => $categories['valise'],
                'marque' => $marques['fresk'],
                'tva' => $tva['normal'],
                'selection' => 0,
                'genre'=>$genre['mixte'],
                'age'=>$age['0 - 18 mois'],
            ],
        ];
        $article = [];
        foreach ($dataArticle as $dataArticles) {
            $tempArticle = new Article();
            $tempArticle->setTitre($dataArticles['titre']);
            $tempArticle->setContenu($dataArticles['contenu']);
            $tempArticle->setImage($dataArticles['image']);
            $tempArticle->setExtrait($dataArticles['extrait']);
            $tempArticle->setDetail($dataArticles['detail']);
            $tempArticle->setPrixTTC($dataArticles['prixTTC']);
            $tempArticle->setNew($dataArticles['new']);
            $tempArticle->setTva($dataArticles['tva']);
            $tempArticle->setMarque($dataArticles['marque']);
            $tempArticle->setCategorie($dataArticles['categorie']);
            $tempArticle->setSelection($dataArticles['selection']);
            $manager->persist($tempArticle);
            $article[] = $tempArticle;
        }
        $manager->flush();
    }
}