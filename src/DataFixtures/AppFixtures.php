<?php

namespace App\DataFixtures;

use App\Entity\Tva;
use App\Entity\Marque;
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
        $dataCategories = [
            [
                'description' => 'arty toys',
                'code' => 'arty',
            ],
            [
                'description' => 'albums photos',
                'code' => 'albums',
            ],
            [
                'description' => 'activité bébé',
                'code' => 'bébé',
            ],
            [
                'description' => 'activité manuelle',
                'code' => 'manuelle',
            ],
            [
                'description' => 'bain',
                'code' => 'bain',
            ],
            [
                'description' => 'boite a musique',
                'code' => 'boiteMusique',
            ],
            [
                'description' => 'boite a dent',
                'code' => 'dentition',
            ],
            [
                'description' => 'boite a histoire',
                'code' => 'lunii',
            ],
            [
                'description' => 'cheval à bascule',
                'code' => 'bascule',
            ],
            [
                'description' => 'chariots de marche',
                'code' => 'chariot',
            ],
            [
                'description' => 'cartable',
                'code' => 'cartable',
            ],
            [
                'description' => 'cartes',
                'code' => 'cartes',
            ],
            [
                'description' => 'chevalier',
                'code' => 'chevalier',
            ],
            [
                'description' => 'coloriage',
                'code' => 'coloriage',
            ],
            [
                'description' => 'construction',
                'code' => 'construction',
            ],
            [
                'description' => 'doudou',
                'code' => 'doudou',
            ],
            [
                'description' => 'draisienne',
                'code' => 'draisienne',
            ],
            [
                'description' => 'ecole',
                'code' => 'ecole',
            ],
            [
                'description' => 'educatif',
                'code' => 'educatif',
            ],
            [
                'description' => 'epicerie',
                'code' => 'epicerie',
            ],
            [
                'description' => 'espace',
                'code' => 'espace',
            ],
            [
                'description' => 'figurine',
                'code' => 'figurine',
            ],
            [
                'description' => 'garage',
                'code' => 'garage',
            ],
            [
                'description' => 'hochet',
                'code' => 'hochet',
            ],
            [
                'description' => 'imitation',
                'code' => 'imitation',
            ],
            [
                'description' => 'jeux d\'extérieur',
                'code' => 'extérieur',
            ],
            [
                'description' => 'jouets a tirer',
                'code' => 'a tirer',
            ],
            [
                'description' => 'jouets a suspendre',
                'code' => 'a suspendre',
            ],
            [
                'description' => 'lampe a histoire',
                'code' => 'histoire',
            ],
            [
                'description' => 'luminaire',
                'code' => 'luminaire',
            ],
            [
                'description' => 'mobile',
                'code' => 'mobile',
            ],
            [
                'description' => 'montre',
                'code' => 'montre',
            ],
            [
                'description' => 'musique',
                'code' => 'musique',
            ],
            [
                'description' => 'observation',
                'code' => 'observation',
            ],
            [
                'description' => 'pate intéligente',
                'code' => 'pate intéligente',
            ],
            [
                'description' => 'peluche',
                'code' => 'peluche',
            ],
            [
                'description' => 'petite voiture',
                'code' => 'petite voiture',
            ],
            [
                'description' => 'porteur',
                'code' => 'porteur',
            ],
            [
                'description' => 'poupée',
                'code' => 'poupée',
            ],
            [
                'description' => 'Protèges carnet de santé',
                'code' => 'carnet',
            ],
            [
                'description' => 'puzzle',
                'code' => 'puzzle',
            ],
            [
                'description' => 'reflextion/stratégie',
                'code' => 'reflextion',
            ],
            [
                'description' => 'jeux de société',
                'code' => 'société',
            ],
            [
                'description' => 'tableaux',
                'code' => 'tableaux',
            ],
            [
                'description' => 'table et chaise',
                'code' => 'table',
            ],
            [
                'description' => 'tirelire',
                'code' => 'tirelire',
            ],
            [
                'description' => 'toise',
                'code' => 'toise',
            ],
            [
                'description' => 'trotinette',
                'code' => 'trotinette',
            ],
            [
                'description' => 'veilleuse',
                'code' => 'veilleuse',
            ],
            [
                'description' => 'voyage',
                'code' => 'voyage',
            ],
        ];
        $categories = [];
        foreach($dataCategories as $dataCategorie){
            $tempCategorie = new Categorie();
            $tempCategorie->setDescription($dataCategorie['description']);
            $tempCategorie->setCode($dataCategorie['code']);
            $manager->persist($tempCategorie);
            $categories[$dataCategorie['code']] = $tempCategorie;
        }
        $manager->flush();


        $dataCategoriesPrincipal = [
            [
                'description' => 'cadeaux naissance',
                'code' => 'naissance',
            ],
            [
                'description' => 'jeux et jouets',
                'code' => 'jeuxJouets',
            ],
            [
                'description' => 'mobilier decoration',
                'code' => 'mobilier',
            ],
            [
                'description' => 'accessoire textile',
                'code' => 'accessoire',
            ],
           
        ];
        $categoriesPrincipal = [];
        foreach($dataCategoriesPrincipal as $dataCategoriePrincipal){
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
            ],
            [
                'description' => 'eveil',
                'code' => 'eveil',
            ],
            [
                'description' => 'pour enfant',
                'code' => 'enfant',
            ],
            [
                'description' => 'decoration',
                'code' => 'decoration',
            ],
            [
                'description' => 'mobilier',
                'code' => 'mobilier',
            ],
            [
                'description' => 'bagagerie',
                'code' => 'bagagerie',
            ],
            [
                'description' => 'textile',
                'code' => 'textile',
            ],
           
        ];
        $categoriesSecondaire = [];
        foreach($dataCategoriesSecondaire as $dataCategorieSecondaire){
            $tempCategorieSecondaire = new CategorieSecondaire();
            $tempCategorieSecondaire->setDescription($dataCategorieSecondaire['description']);
            $tempCategorieSecondaire->setCode($dataCategorieSecondaire['code']);
            $tempCategorieSecondaire->setCategoriePrincipal($categoriesPrincipal['accessoire']);
            $manager->persist($tempCategorieSecondaire);
            $categoriesSecondaire[$dataCategorieSecondaire['code']] = $tempCategorieSecondaire;
        }
        $manager->flush();


        $dataMarques = [
            [
                'titre' => 'oiseaubateau',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'buki',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'moulinroty',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'funkyframes',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'fresk',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'bergamotte',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'corolle',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'haba',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'janod',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'lilliputiens',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'Lunii',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'djeco',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'omy',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'smartgame',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'papo',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'ulysse',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'Ugears',
                'image' => 'http://placehold.it/150x150',
            ],
            [
                'titre' => 'vilac',
                'image' => 'http://placehold.it/150x150',
            ],
        ];
        $marques = [];
        foreach($dataMarques as $dataMarque){
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
        foreach($dataTva as $valeurTva){
            $tempTVA = new Tva();
            $tempTVA->setValeurTVA($valeurTva['valeur']);
            $tempTVA->setCode($valeurTva['code']);
            $manager->persist($tempTVA);
            $tva[$valeurTva['code']] = $tempTVA;
        }
        $manager->flush();

        // Article
        $dataArticle = [
            [
                'titre'=>'Poulpus',
                'extrait'=>'Poulpus, Pirate à tête de pieuvre',
                'contenu'=>' un superbe pirate Arty Toys tout droit sorti des profondeurs de la mer avec sa tête de pieuvre, pour les enfants à partir de 4 ans.
                            Armé d\'un trident et et d\'une épée, il fera fuir tous ses adversaires pirates.',
                'image'=>'images\djeco\poulpus.jpg',
                'detail'=>'Dimension: 6,6 x 8,5 x 5 cm Dimensions de la boîte : 14 x 12 x 5,7 cm',
                'prixTTC'=>11,
                'new'=>1,
                'categorie'=>$categories['arty'],
                'marque'=>$marques['djeco'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Album photo Ignace',
                'extrait'=>'Album photo coloré',
                'contenu'=>'Avec cet album coloré, c’est toi le photographe. En tant que propriétaire, tu peux insérer une photo de toi sur la couverture.
                            Les 10 housses photo protègent tes photos préférées, pour toujours avoir une photo du chien, de papa ou maman, de grand-mère ou grand-père à portée de main.',
                'image'=>'images\lilli\Album-Photo.jpg',
                'detail'=>'Composition	100% polyester Lavable en surface',
                'prixTTC'=>25,
                'new'=>1,
                'categorie'=>$categories['albums'],
                'marque'=>$marques['lilliputiens'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Culbuto Eléphant',
                'extrait'=>'Petit éléphant très mignon qui amuse beaucoup les bébés !',
                'contenu'=>'Ce petit éléphant très mignon amuse beaucoup les bébés !  Dès qu\'on le touche, il bascule de droite à gauche à toute vitesse. Les enfants adorent ces mouvements rigolos 
                            et sont fascinés par le ravissant tintement des clochettes.',
                'image'=>'images\haba\culbuto-elephant.jpg',
                'detail'=>'Dimensions 17 x 10 x 10 cm
                           Âge	à partir de 6 mois',
                'prixTTC'=>17,
                'new'=>1,
                'categorie'=>$categories['bébé'],
                'marque'=>$marques['haba'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Les tableaux qui bougent',
                'extrait'=>'Coffret pour une activité manuelle',
                'contenu'=>'Grâce à un système d’attaches parisiennes, les enfants inventent leur histoire tout en mouvement.
                            Ce coffret contient 4 cartes trouées à compléter, 4 enveloppes avec les éléments à ajouter, des attaches parisiennes colorées et 1 livret explicatif pas à pas en couleurs. ',
                'image'=>'images\djeco\Tableaux-qui-bougent.jpg',
                'detail'=>'Age minimum 4 ans
                           Thème Animaux',
                'prixTTC'=>20,
                'new'=>1,
                'categorie'=>$categories['manuelle'],
                'marque'=>$marques['djeco'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Jeu de bain 3 bateaux',
                'extrait'=>'3 jolis bateaux colorés pour jouer dans le bain.',
                'contenu'=>'César, Alice et un martin-pecheur ont chacun embarqué sur leur voilier, prets à disputer une petite régate ! Oh ! Alice et César ont chaviré, leurs bateaux, tout inondés, sont devenus de véritables passoires !
                            Retourne-les et regarde l’eau s’écouler en jolis jets !',
                'image'=>'images\lilli\3-petits-bateaux-flottants.jpg',
                'detail'=>'Composition	Neoprene & polyester
                          Entretien 	Lavable à la main',
                'prixTTC'=>20,
                'new'=>1,
                'categorie'=>$categories['bain'],
                'marque'=>$marques['lilliputiens'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Boite à musique Les moustaches ',
                'extrait'=>'Une magnifique boîte à musique avec 2 personnages magnétiques',
                'contenu'=>'Boîte à musique de la collection Les moustaches de Moulin Roty, une magnifique boîte à musique avec 2 personnages 
                            magnétiques qui vont danser au son de la mélodie. Un adorable cadeau pour endormir ou éveiller bébé avec les illustrations mystérieuse et poétiques de la gamme.',
                'image'=>'images\moulin\boite-a-musique-les-moustaches-moulin-roty.jpg',
                'detail'=>'Dimensions : 12 x 12 cm
                           Matière : Bois et résine',
                'prixTTC'=>20,
                'new'=>1,
                'categorie'=>$categories['boiteMusique'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Boite dent de lait il était une fois',
                'extrait'=>'Boite à dent de lait de la collection il était une fois de Moulin roty',
                'contenu'=>'Cette adorable boîte à dent de lait ronde en résine colorée conservera précieusement les premières quenottes de votre petit. Joliment décorée dans les tons 
                            de rose et de parme, sur le couvercle le portrait en relief d\'une petite souris avec son chapeau de fée et sa baguette magique de la collection Il Etait Une Fois.',
                'image'=>'images\moulin\Boite_dent_de_lait_Il_Etait_Une_Fois.jpg',
                'detail'=>'Dimension  6 cm
                           Entretien	Lavage en surface avec un chiffon humide.
                           Couleur	Rose',
                'prixTTC'=>11,
                'new'=>0,
                'categorie'=>$categories['dentition'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Ma fabrique à histoires Lunii',
                'extrait'=>'Une expérience magique d\'écoute mélangeant innovation et tradition',
                'contenu'=>'Pas d’écran, place à l’imagination !
                            Les enfants choisissent les différents éléments qui composeront leur histoire : un héros, un compagnon, un lieu et un objet.
                            48 histoires déjà incluses dans la boîte et des centaines d’autres à télécharger sur le Luniistore !
                            
                            La Fabrique à Histoires est équipée d\'une prise Jack et d\'un haut parleur intégré, d\'une autonomie de batterie de 10h qui se recharge via USB,
                            d\'une capacité de 30 heures d\'écoute : très pratique pour les longs voyages en famille. Elle est aussi rechargeable en histoires, les enfants ne seront donc jamais à court de nouveaux récits. 
                            Tout le contenu des Éditions Lunii est accessible sur le Luniistore, une bibliothèque interactive.
                            
                            Compatible Mac, PC et Linux, le Luniistore est une véritable librairie numérique dans laquelle les parents peuvent sélectionner de nouvelles aventures à télécharger pour leurs enfants dans 8 langues disponibles. Chaque récit est une création originale Lunii. Auteurs, conteurs et designers sonore créent avec passion des récits inédits afin d’enrichir l’univers de la marque.',
                'image'=>'images\lunii\ma-fabrique-a-histoires-lunii.jpg',
                'detail'=>'À partir de 3 ans',
                'prixTTC'=>60,
                'new'=>1,
                'categorie'=>$categories['lunii'],
                'marque'=>$marques['Lunii'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Cheval à bascule diamant',
                'extrait'=>'Ce magnifique modèle de cheval à bascule original est parfait pour les enfants ',
                'contenu'=>'Un modèle de cheval à bascule en bois inédit qui apportera une touche très déco et contemporaine dans votre intérieur. A monter soit même. A partir de 3 ans et plus.',
                'image'=>'images\vilac\cheval-bascule-diamant.jpg',
                'detail'=>'Hauteur de l\'assise 46 cm.
                           Age	3 ans et +
                           Dimensions	80 x 69 x 46 cm',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['bascule'],
                'marque'=>$marques['vilac'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Chariot multi-activités Chat',
                'extrait'=>'Ce joli chariot en bois multi-activités, à pousser, est particulièrement adapté à l’apprentissage de la marche.',
                'contenu'=>'Grâce à sa poignée ajustable en hauteur (de 47 à 53 cm), ce chariot est évolutif et s’adapte à la taille de votre enfant. Il l\'accompagnera de 12 mois à 3 ans : son frein invisible et amovible
                            permet de bloquer les roues (à 12 mois) et de les libérer progressivement afin de maitriser la vitesse du chariot pendant l’apprentissage. En plus de la marche, votre enfant pourra tester 
                            sa motricité fine ainsi que sa dextérité avec les 8 activités ludiques proposées : looping, boite à formes, souris à glisser, descendeur, engrenage, bouton sonore, yeux rotatifs et joues en feutrine
                            pour développer le toucher. Enfin, avec ses 4 roues silencieuses en caoutchouc, il ne marque pas le sol.',
                'image'=>'images\janod\chariot-multi-activites-chat-bois.jpg',
                'detail'=>'Dimensions	39,5 x 34,2 x 54 cm
                            Matière	Bois (contreplaqué et MDF)',
                'prixTTC'=>65,
                'new'=>0,
                'categorie'=>$categories['chariot'],
                'marque'=>$marques['janod'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Cartable baleine gris',
                'extrait'=>'Le cartable baleine gris est issu de la nouvelle collection de sacs de FRESK ',
                'contenu'=>'un cartable durable et super tendance réalisé en PET recyclé. Ce matériau léger, écologique et imperméable est issu du recyclage des bouteilles en plastique.
                            Ce cartable gris orné de baleines est doté de 2 compartiments pouvant accueillir des cahiers et livres format A4, d\'une pochette zippée, d\'une poignée robuste, de bretelles ajustables et d\'une fermeture réglable.
                            Le cartable idéal pour rentrer en maternelle ! ',
                'image'=>'images\fresk\cartable-whale-dawn-grey-en-pet-recycle.jpg',
                'detail'=>'Composition : 100% PET recyclé - certifié GOTS - détails en similicuir
                            Dimensions : 33 x 25 x 9 cm
                            Age : à partir de 2,5 ans',
                'prixTTC'=>45,
                'new'=>0,
                'categorie'=>$categories['cartable'],
                'marque'=>$marques['fresk'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Jeu de cartes Pipolo ',
                'extrait'=>'Pour gagner, il faut savoir mentir avec aplomb. Tout nu, à plumes ou poilu ?',
                'contenu'=>'Pipolo, le jeu du menteur avec des règles inspirées des grands classiques des jeux de cartes, un jeu de cartes pour les enfants à partir de 5 ans.',
                'image'=>'images\djeco\Jeu_de_cartes_Pipolo_Djeco.jpg',
                'detail'=>'Dimension 8,7x11,8x2,8 cm
                           Matières	carton / papier
                           Age	Dès 5 ans
                           Nombre de joueurs	2-4',
                'prixTTC'=>9,
                'new'=>0,
                'categorie'=>$categories['cartes'],
                'marque'=>$marques['djeco'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Bouclier et épée loup',
                'extrait'=>'Pour les apprentis chevaliers.',
                'contenu'=>'Un bouclier et une épée en bois pour les apprentis chevaliers. Les loups vont montrer leurs crocs ! Bouclier en bois diamètre 35 cm.',
                'image'=>'public\images\vilac\bouclier-et-epee-loup-vilac.jpg',
                'detail'=>'Age	4 ans et +
                           Dimensions	35 x 35 x 1 cm
                           Composition  bois',
                'prixTTC'=>22,
                'new'=>0,
                'categorie'=>$categories['chevalier'],
                'marque'=>$marques['vilac'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'3D Licorne Lily',
                'extrait'=>'Quand le coloriage prend forme ',
                'contenu'=>'Jouet gonflable en papier à colorier
                Lily, la licorne est un jouet gonflable ou un joli décor pour sa chambre.',
                'image'=>'images\omy\lily-3d-air-toy.jpg',
                'detail'=>'AGE : 3-9 ANS',
                'prixTTC'=>15,
                'new'=>0,
                'categorie'=>$categories['coloriage'],
                'marque'=>$marques['omy'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Navire de recherche',
                'extrait'=>'un hommage aux explorateurs et pionniers',
                'contenu'=>'Le Navire de recherche ». La structure en bois, qui se compose d\'un total de 575 pièces en bois individuelles, est un travail habile et fait sur mesure qui 
                            fait revivre les temps des grandes découvertes. La conquête du cercle arctique nord ou sud, du continent africain ou des latitudes sud-américaines n\'aurait 
                            pas été possible sans un développement technique supplémentaire.

                            Le navire, conçu par UGEARS dans le style steampunk, est un hommage aux explorateurs et pionniers, dont l\'esprit de recherche se reflète dans ce modèle de navire.
                            De plus, la conception rétrofuturiste de la coque était équipée de quelques extras, dont une grue pivotante et une rampe Drop . 
                            L\'illustration claire des modes techniques de mouvement peut être suivie avec précision et a donc un caractère d\'apprentissage. ',
                'image'=>'images\ugears\Ugears-Research-Vessel.jpg',
                'detail'=>'Nombre de composants: 575
                           Temps d\'installation: 10 heures
                           Taille du modèle : 38,5 x 11 x 25 cm',
                'prixTTC'=>55,
                'new'=>1,
                'categorie'=>$categories['construction'],
                'marque'=>$marques['Ugears'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Chat moutarde Lulu Les Moustaches',
                'extrait'=>'Doudou chat moutarde Lulu, Les Moustaches',
                'contenu'=>'doudou tout doux Lulu de la collection Les Moustaches fera le bonheur de votre petit. Ce compagnon de forme carrée est en velours
                             couleur moutarde d\'un côté et en tissu rayé de l\'autre. Ce matou possède une attache-tétine afin de pas égarer la sucette de bébé',
                'image'=>'images\moulin\chat_moutarde_Lulu_Les_Moustaches.jpg',
                'detail'=>'Dimension: 22cm 
                           Matières: coton, polyester, élasthanne
                           Entretien: lavage en machine 30° délicat
                           Couleur: jaune
                           Age: dés la naissance',
                'prixTTC'=>22,
                'new'=>'1',
                'categorie'=>$categories['doudou'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Draisienne Indian',
                'extrait'=>'Cette draisienne pourra accompagner votre petit aventurier de 3 à 6 ans.',
                'contenu'=>'Son premier vélo sans pédale aidera votre enfant à entraîner son sens de l\'équilibre et le préparera au "vrai" vélo, sans forcément devoir passer par l\'étape "petites roues". 
                            Cette draisienne pourra accompagner votre petit aventurier de 3 à 6 ans.
                            Les pneus, en 12 pouces (30 cm), sont "pleins" c\'est-à-dire sans chambre à air, et donc sans aucun risque de perte de gonflage. 
                            La selle est réglable en hauteur sur 3 positions : 33, 35 et 37 cm du sol. Une poignée usinée dans le cadre permet de facilement transporter la draisienne.',
                'image'=>'images\ulysse\draisienne-indien.jpg',
                'detail'=>'Dimension : 86 x 40 x 58 cm
                           Age  de 3 à 6 ans 
                           Réglage de la selle 33, 35 et 37 cm du sol',
                'prixTTC'=>90,
                'new'=>1,
                'categorie'=>$categories['draisienne'],
                'marque'=>$marques['ulysse'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Sac à dos primaire Ours Polaire',
                'extrait'=>'Grâce à ce charmant sac à dos Fresk, votre enfant sera fin prêt pour l\'école primaire.',
                'contenu'=>'Sac à dos orné d\'ours polaires et de détails en cuir pour rentrer à l\'école maternelle avec style ! Les plus grands pourront l\'utiliser comme sac de natation ou de gym. 
                            Cerise sur le gâteau : ce sac à dos est conçu en bouteilles PET recyclées. 

                            Ce sac à dos est doté d\'un grand compartiment, d\'une pochette séparée pour la gourde, d\'une poche avant avec une fermeture aimantée, de bretelles ajustables, d\'une fermeture éclair,
                            de 2 poignées et d\'une étiquette pour indiquer le nom de l\'heureux propriétaire.',
                'image'=>'images\fresk\Sac_dos_primaire_Ours_Polaire_Fresk.jpg',
                'detail'=>'Dimension du produit	40x25x10 cm
                           Entretien	lavage en surface avec un chiffon humide
                           Couleur	Gris
                           Age	Dès 6 ans
                           Label	Eco-friendly, GOTS',
                'prixTTC'=>46,
                'new'=>0,
                'categorie'=>$categories['ecole'],
                'marque'=>$marques['fresk'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Eduludo spacio',
                'extrait'=>'un jeu éducatif pour apprendre à votre enfant à se repérer dans l\'espace.',
                'contenu'=>'Devant, derrière, à-côté... la notion d\'espace est difficile à appréhender pour les enfants, c\'est pourquoi il 
                            est plus facile de leur expliquer avec des figurines. Eduludo Spacio de Djeco est un beau jeu pour se repérer dans l\'espace.

                            Pour reproduire la photo, l\'enfant doit placer correctement les figurines sur le plateau. Où est la girafe, devant ou derrière l\'éléphant?
                            Le coffret comprend un plateau en bois, 6 figurines en plastique, 20 cartes défis avec la solution au dos des cartes et la règle du jeu',
                'image'=>'public\images\djeco\eduludo-spacio-djeco.jpg',
                'detail'=>'Dimensions : 21,5 x 21,5 x 6 cm
                           Age de 4 à 6 ans',
                'prixTTC'=>20,
                'new'=>0,
                'categorie'=>$categories['educatif'],
                'marque'=>$marques['djeco'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Poulet rôti à découper',
                'extrait'=>'Cuisine ce délicieux poulet, découpe-le et à table !',
                'contenu'=>'Poulet rôti à découper se composant de 9 pièces en bois, tout le nécessaire pour déguster un bon poulet rôti ! Une dinette en bois à partir de 3 ans.

                Ce plateau se compose d\'une planche à découper, un couper, une broche et un poulet avec les ailes et les cuisses.
                Votre enfant s\'amusera à découper le poulet grâce au velcro.',
                'image'=>'images\vilac\poulet-roti-a-decouper-vilac.jpg',
                'detail'=>'Matières : Bois
                           Dimensions : 10 x 15 x 7 cm
                           Nombre de composants : 9
                           Age	3 ans et +',
                'prixTTC'=>20,
                'new'=>0,
                'categorie'=>$categories['epicerie'],
                'marque'=>$marques['vilac'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Télescope 50 activités',
                'extrait'=>'Découvrir l\'espace et les sciences avec ce télescope éducatif',
                'contenu'=>'Un télescope réflecteur avec une notice de 50 activités pour découvrir le ciel étoilé, les planètes et les cratères lunaires.',
                'image'=>'images\buki\telescope-50.jpg',
                'detail'=>'Lentille de 76 mm de diamètre et 3 oculaires de 20 mm ; 12.5 mm et 4 mm interchangeables.

                            Trépied de sol de 76 cm. Le tube et le trépied sont en métal.
                            Age De 8 ans jusqu\'à 12 ans',
                'prixTTC'=>80,
                'new'=>0,
                'categorie'=>$categories['espace'],
                'marque'=>$marques['buki'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Allosaure',
                'extrait'=>'',
                'contenu'=>'Avec les dinosaures, foulez la terre du Jurassique, côtoyez le légendaire T-Rex, parcourez de vastes plaines avec le vélociraptor ou envolez-vous avec un ptéranodon.',
                'image'=>'images\papo\allosaure.jpg',
                'detail'=>'Longueur: 25 cm
                            Hauteur: 10,5 cm
                            Matériau: PVC norme C.E.
                            Age: à partir de 3 ans',
                'prixTTC'=>28,
                'new'=>0,
                'categorie'=>$categories['figurine'],
                'marque'=>$marques['papo'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Garage station service',
                'extrait'=>'Tut tut ! Les voitures et scooters s\'avancent pour faire le plein d\'essence et passent au nettoyage pour être rutilantes !',
                'contenu'=>'Tut tut ! Les voitures et scooters s\'avancent pour faire le plein d\'essence et passent au nettoyage pour être rutilantes ! Ce grand garage station service en bois 
                            est sur trois niveaux et est équipé d\'un ascenseur manuel et d\'un centre de lavage au premier niveau. Il comprend 8 accessoires en bois pour s\'imaginer des tas d\'histoires !
                            Il contient 4 véhicules, 1 pompe à essence, 3 personnages "en activité" ( 2 garagistes et personnages en scooter) et une planche de stickers de format A4 pour décorer le garage !',
                'image'=>'images\janod\garage-station-service-bois.jpg',
                'detail'=>'Dimensions	46,2 x 31,2 x 35 cm
                           Matière	Bois',
                'prixTTC'=>70,
                'new'=>0,
                'categorie'=>$categories['garage'],
                'marque'=>$marques['janod'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Hochet bois Pakou',
                'extrait'=>'Cet hochet à mâchouiller soutiendra aussi bébé lors des poussées dentaires un peu douloureuses.',
                'contenu'=>'Ce hochet en bois de hêtre aux joyeuses couleurs tropicales accompagnera bébé dans sa première année. 
                            Il se compose de plusieurs éléments, quelques feuilles aux jolies teintes vertes, rouges et bleues, et d’un petit toucan. Facile à saisir, le jouet d’éveil aide bébé dans son apprentissage de la motricité fine',
                'image'=>'images\moulin\Hochet_bois_Pakou.jpg',
                'detail'=>'Dimension 10,5x2,5x12,5 cm
                           Détails des matières	Bois, plastique
                           Couleur	Multicolore
                           Age	Dès 12 mois',
                'prixTTC'=>12,
                'new'=>0,
                'categorie'=>$categories['hochet'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Épicerie green market',
                'extrait'=>'Comme au marché ! Quelle jolie épicerie avec ses couleurs fraîches et son décor fruits et légumes ! ',
                'contenu'=>'Avec ses nombreux accessoires, elle est parfaite pour les apprentis marchands ! La marchande Green Market est équipée d\'une horloge, d\'un panneau ardoise pour poser
                            les additions ou noter les horaires d\'ouverture, d\'une boite de craies, de six boites d\'aliments en carton (farine, riz, jus d\'orange, cacao, pâte et fromage), 
                            d\'une caisse enregistreuse et d\'une balance. Dans les petits casiers les enfants pourront placer les fruits et légumes suivants : trois pommes, trois bananes,
                            trois fraises, trois carottes, trois radis et trois pommes de terre. Sur le devant de chaque casier une petite partie ardoise permettra également d\'inscrire le prix de chaque article. 
                            Pour les plus petits, un marche pied permet d\'être à la bonne hauteur. Pour faire les courses comme des grands, trois sacs de courses en papier au nom de la petite boutique sont inclus ! 
                            Pour compléter ces accessoires, les enfants auront bien sûr pièces et billets afin de régler la note. Au total, ce sont 32 accessoires inclus dans cette épicerie en bois !',
                'image'=>'public\images\janod\epicerie-green-market-bois.jpg',
                'detail'=>'Dimensions	43 x 30 x 93 cm
                           Matière	Bois, papier, carton',
                'prixTTC'=>100,
                'new'=>0,
                'categorie'=>$categories['imitation'],
                'marque'=>$marques['janod'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Quilles jurassiennes',
                'extrait'=>'Beau jeu de 12 quilles jurassiennes au bâton en bois massif livrées avec la règle du jeu franc-comtoise.',
                'contenu'=>'Beau jeu de 12 quilles jurassiennes au bâton en bois massif livrées avec la règle du jeu franc-comtoise. Pour jouer, il faut faire 63 points et ne pas sortir de l’aire de jeu au risque d’être éliminé. 
                            Compatible avec la règle du jeu des quilles finlandaises. Fabriqué en France.',
                'image'=>'images\janod\quilles-jurassiennes-bois.jpg',
                'detail'=>'Dimensions	26 x 10 x 20,5 cm
                           Matière	Bois massif
                           Nb Joueurs	2 et plus',
                'prixTTC'=>35,
                'new'=>0,
                'categorie'=>$categories['extérieur'],
                'marque'=>$marques['janod'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Escargot à promener',
                'extrait'=>'Cet escargot en bois à promener est très rigolo ! La coquille tourne lorsqu\'on le promène',
                'contenu'=>'Cet escargot en bois à promener est très rigolo ! La coquille tourne lorsqu\'on le promène et s\'enlève pour révéler un tambourin et un petit xylophone ! Les antennes de l\'escargot sont 
                            également amovibles et forment les baguettes. Un joli compagnon aux tons très doux et très actuels qui éveillera votre enfant à la musique de façon ludique !',
                'image'=>'images\janod\escargot-a-promener-pure-bois.jpg',
                'detail'=>'Dimensions	20,5 x 8,9 x 20 cm
                           Matière	Bois (hêtre et contreplaqué)',
                'prixTTC'=>30,
                'new'=>0,
                'categorie'=>$categories['a tirer'],
                'marque'=>$marques['janod'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Jouet à suspendre Georges hochet clap clap',
                'extrait'=>' se suspend par la queue et soulage les gencives douloureuses',
                'contenu'=>'Clap Clap ! Georges applaudit avec ses pattes anneau de dentition. Suspend-le par la queue et fais retentir le petit grelot placé dans son cerceau.',
                'image'=>'images\lilli\Georges-hochet-clap-clap.jpg',
                'detail'=>'Composition	Tissu externe: 100% Polyester T/C: 80% Polyester - 20% coton
                           Lavage	Lavable en machine à 30°C – cycle délicat',
                'prixTTC'=>25,
                'new'=>0,
                'categorie'=>$categories['a suspendre'],
                'marque'=>$marques['lilliputiens'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Lampe à histoires Chien pourri !',
                'extrait'=>'Une lampe torche qui projette des images en couleurs pour raconter de jolies histoires',
                'contenu'=>'3 disques, 3 histoires originales pour découvrir les aventures de ce chien et ses amis.
                            Chacun des 3 disques projetés sur le mur raconte les aventures délirantes de Chien pourri, héros farceur de l\'école des loisirs. Les illustrations colorées embarquent l\'enfant dans un monde
                            imaginaire où il y a tout à inventer! ',
                'image'=>'images\moulin\lampe-a-histoires-chien-pourri.jpg',
                'detail'=>'La lampe projette des images jusqu\'à 90 cm de large.
                            Fonctionne avec 3 piles bouton fournies (1,5 V AG13/LR44)
                            Dimensions : 16 x 4 cm',
                'prixTTC'=>13,
                'new'=>0,
                'categorie'=>$categories['histoire'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Lampe ballon',
                'extrait'=>'Plafonnier Encastré en Forme de Ballon',
                'contenu'=>'Son design poétique trouve parfaitement sa place dans n’importe quelle pièce que cela soit chambre, salon ou encore entrée et l’illusion des ballons gonflables est parfaite
 La cordelette ! Le petit truc en plus de ces étonnants luminaires c’est la cordelette. Outre sa fonction décorative, celle-ci a une vraie utilité puisqu’il s’agit de l’interrupteur.',
                'image'=>'images\lampe_ballon.jpg',
                'detail'=>'Tension 220V-240V
                            Couleur Blanc
                            Type D\'ampoule LED/Incandescent/Fluorescent
                            Matière Acrylique
                            Taille 30cm
                            Type De Lampe Plafonnier
                            Ampoule non incluse 
                            Base D\'ampoule E26/E27',
                'prixTTC'=>45,
                'new'=>1,
                'categorie'=>$categories['luminaire'],
                'marque'=>$marques['buki'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Mobile musical Le voyage d\'Olga',
                'extrait'=>'Ravissant mobile musical croisillon de la collection Le voyage d\'Olga',
                'contenu'=>'Un mobile en bois pour éveiller le jour et endormir la nuit. Un mobile à accrocher au lit de bébé ou au parc destiné à la stimulation visuelle et auditive de bébé. Il sera bercé par les oies, les étoiles et la lune ',
                'image'=>'images\moulin\mobile-musical-le-voyage-d-olga.jpg',
                'detail'=>'Dimensions : 35 x 65 cm Mobile vendu avec la potence en bois. Lavage en surface, pas de sèche-linge Matière : coton, polyester, lin et bois',
                'prixTTC'=>80,
                'new'=>0,
                'categorie'=>$categories['mobile'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Montre Cheval',
                'extrait'=>'Ludique, originale et colorée',
                'contenu'=>'La montre pédagogique Cheval est issue de la collection Little Big Room de la marque française Djeco. Elle se compose de 3 aiguilles et d\'un double cadran avec au centre les heures et autour les minutes. Son bracelet en polyester de 20 cm et sa fermeture de type boucle ardillon ',
                'image'=>'images\djeco\montre-cheval.jpg',
                'detail'=>'Pile incluse SR626SW Sony Dimensions de la montre : 3 x 20 x 1,4 cm, poids de 15 grammes Dimensions de la boite : 5,3 x 22,5 x 1,5 cm Les montres Djeco sont garanties 2 ans et sans bisphénol A.',
                'prixTTC'=>23,
                'new'=>0,
                'categorie'=>$categories['montre'],
                'marque'=>$marques['djeco'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'Kalimba Le Voyage d\'Olga',
                'extrait'=>'Idéal pour les petits musiciens',
                'contenu'=>'Les lamelles en métal émettent des sons différents selon la taille. La sonorité est harmonieuse quelque soit l\'âge du joueur. Illustré du renard de la gamme, cet instrument de musique permettra à votre enfant de s\'éveiller à la musique',
                'image'=>'images\moulin\kalimba.jpg',
                'detail'=>'Dimension du produit	13x14 cm
                        Détails des matières	MDF, métal
                        Marque	Moulin Roty
                        Couleur	Multicolore
                        Age	Dès 4 ans',
                'prixTTC'=>25,
                'new'=>0,
                'categorie'=>$categories['musique'],
                'marque'=>$marques['moulinroty'],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['observation'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['pate intéligente'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['peluche'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['petite voiture'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['porteur'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['poupée'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['carnet'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['puzzle'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['reflextion'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['société'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['tableaux'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['table'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['tirelire'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['toise'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['trotinette'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['veilleuse'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
            [
                'titre'=>'',
                'extrait'=>'',
                'contenu'=>'',
                'image'=>'',
                'detail'=>'',
                'prixTTC'=>180,
                'new'=>0,
                'categorie'=>$categories['voyage'],
                'marque'=>$marques[''],
                'tva'=>$tva['normal'],
            ],
        ];
        $article = [];
        // dump($categories['voyage'], $tva[1], $marques['funkyframes']);
        foreach($dataArticle as $dataArticles){
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
            $manager->persist($tempArticle);
            $article[] = $tempArticle;
        }
        $manager->flush();
    }
}
