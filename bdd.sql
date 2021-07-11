-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour projet5
CREATE DATABASE IF NOT EXISTS `projet5` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projet5`;

-- Listage de la structure de la table projet5. age
CREATE TABLE IF NOT EXISTS `age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.age : ~4 rows (environ)
/*!40000 ALTER TABLE `age` DISABLE KEYS */;
REPLACE INTO `age` (`id`, `code`, `slug`) VALUES
	(50, '0 - 18 mois', '0-18-mois'),
	(51, '2 - 4 ans', '2-4-ans'),
	(52, '5 - 7 ans', '5-7-ans'),
	(53, '8 ans et +', '8-ans-et');
/*!40000 ALTER TABLE `age` ENABLE KEYS */;

-- Listage de la structure de la table projet5. article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `tva_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrait` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_ttc` decimal(10,2) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selection` tinyint(1) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `age_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66BCF5E72D` (`categorie_id`),
  KEY `IDX_23A0E664827B9B2` (`marque_id`),
  KEY `IDX_23A0E664D79775F` (`tva_id`),
  KEY `IDX_23A0E664296D31F` (`genre_id`),
  KEY `IDX_23A0E66CC80CD12` (`age_id`),
  CONSTRAINT `FK_23A0E664296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  CONSTRAINT `FK_23A0E664827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_23A0E664D79775F` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`id`),
  CONSTRAINT `FK_23A0E66BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_23A0E66CC80CD12` FOREIGN KEY (`age_id`) REFERENCES `age` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=374 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.article : ~47 rows (environ)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
REPLACE INTO `article` (`id`, `categorie_id`, `marque_id`, `tva_id`, `titre`, `extrait`, `detail`, `contenu`, `image`, `prix_ttc`, `new`, `slug`, `selection`, `genre_id`, `age_id`) VALUES
	(327, 733, 287, 27, 'Poulpus', 'Poulpus, Pirate à tête de pieuvre', 'Dimension: 6,6 x 8,5 x 5 cm Dimensions de la boîte : 14 x 12 x 5,7 cm', ' un superbe pirate Arty Toys tout droit sorti des profondeurs de la mer avec sa tête de pieuvre, pour les enfants à partir de 4 ans.\n                            Armé d\'un trident et et d\'une épée, il fera fuir tous ses adversaires pirates.', 'poulpus.jpg', 11.00, 1, 'poulpus', 0, 31, 51),
	(328, 720, 285, 27, 'Album photo Ignace', 'Album photo coloré', 'Composition	100% polyester Lavable en surface', 'Avec cet album coloré, c’est toi le photographe. En tant que propriétaire, tu peux insérer une photo de toi sur la couverture.\n                            Les 10 housses photo protègent tes photos préférées, pour toujours avoir une photo du chien, de papa ou maman, de grand-mère ou grand-père à portée de main.', 'Album-Photo.jpg', 25.00, 1, 'album-photo-ignace', 0, 31, 50),
	(329, 737, 283, 27, 'Culbuto Eléphant', 'Petit éléphant très mignon qui amuse beaucoup les bébés !', 'Dimensions 17 x 10 x 10 cm\n                           Âge	à partir de 6 mois', 'Ce petit éléphant très mignon amuse beaucoup les bébés !  Dès qu\'on le touche, il bascule de droite à gauche à toute vitesse. Les enfants adorent ces mouvements rigolos \n                            et sont fascinés par le ravissant tintement des clochettes.', 'culbuto-elephant.jpg', 17.00, 1, 'culbuto-elephant', 0, 31, 50),
	(330, 744, 287, 27, 'Les tableaux qui bougent', 'Coffret pour une activité manuelle', 'Age minimum 4 ans\n                           Thème Animaux', 'Grâce à un système d’attaches parisiennes, les enfants inventent leur histoire tout en mouvement.\n                            Ce coffret contient 4 cartes trouées à compléter, 4 enveloppes avec les éléments à ajouter, des attaches parisiennes colorées et 1 livret explicatif pas à pas en couleurs. ', 'Tableaux-qui-bougent.jpg', 20.00, 1, 'les-tableaux-qui-bougent', 0, 31, 52),
	(331, 723, 285, 27, 'Jeu de bain 3 bateaux', '3 jolis bateaux colorés pour jouer dans le bain.', 'Composition	Neoprene & polyester\n                          Entretien 	Lavable à la main', 'César, Alice et un martin-pecheur ont chacun embarqué sur leur voilier, prets à disputer une petite régate ! Oh ! Alice et César ont chaviré, leurs bateaux, tout inondés, sont devenus de véritables passoires !\n                            Retourne-les et regarde l’eau s’écouler en jolis jets !', '3-petits-bateaux-flottants.jpg', 20.00, 1, 'jeu-de-bain-3-bateaux', 1, 31, 50),
	(332, 760, 278, 27, 'Boite à musique Les moustaches ', 'Une magnifique boîte à musique avec 2 personnages magnétiques', 'Dimensions : 12 x 12 cm\n                           Matière : Bois et résine', 'Boîte à musique de la collection Les moustaches de Moulin Roty, une magnifique boîte à musique avec 2 personnages \n                            magnétiques qui vont danser au son de la mélodie. Un adorable cadeau pour endormir ou éveiller bébé avec les illustrations mystérieuse et poétiques de la gamme.', 'boite-a-musique-les-moustaches-moulin-roty.jpg', 20.00, 1, 'boite-a-musique-les-moustaches', 0, 31, 51),
	(333, 759, 278, 27, 'Boite dent de lait il était une fois', 'Boite à dent de lait de la collection il était une fois de Moulin roty', 'Dimension  6 cm\n                           Entretien	Lavage en surface avec un chiffon humide.\n                           Couleur	Rose', 'Cette adorable boîte à dent de lait ronde en résine colorée conservera précieusement les premières quenottes de votre petit. Joliment décorée dans les tons \n                            de rose et de parme, sur le couvercle le portrait en relief d\'une petite souris avec son chapeau de fée et sa baguette magique de la collection Il Etait Une Fois.', 'Boite_dent_de_lait_Il_Etait_Une_Fois.jpg', 11.00, 0, 'boite-dent-de-lait-il-etait-une-fois', 0, 30, 52),
	(334, 756, 286, 27, 'Ma fabrique à histoires Lunii', 'Une expérience magique d\'écoute mélangeant innovation et tradition', 'À partir de 3 ans', 'Pas d’écran, place à l’imagination !\n                            Les enfants choisissent les différents éléments qui composeront leur histoire : un héros, un compagnon, un lieu et un objet.\n                            48 histoires déjà incluses dans la boîte et des centaines d’autres à télécharger sur le Luniistore !\n                            \n                            La Fabrique à Histoires est équipée d\'une prise Jack et d\'un haut parleur intégré, d\'une autonomie de batterie de 10h qui se recharge via USB,\n                            d\'une capacité de 30 heures d\'écoute : très pratique pour les longs voyages en famille. Elle est aussi rechargeable en histoires, les enfants ne seront donc jamais à court de nouveaux récits. \n                            Tout le contenu des Éditions Lunii est accessible sur le Luniistore, une bibliothèque interactive.\n                            \n                            Compatible Mac, PC et Linux, le Luniistore est une véritable librairie numérique dans laquelle les parents peuvent sélectionner de nouvelles aventures à télécharger pour leurs enfants dans 8 langues disponibles. Chaque récit est une création originale Lunii. Auteurs, conteurs et designers sonore créent avec passion des récits inédits afin d’enrichir l’univers de la marque.', 'ma-fabrique-a-histoires-lunii.jpg', 60.00, 1, 'ma-fabrique-a-histoires-lunii', 0, 31, 51),
	(335, 739, 294, 27, 'Cheval à bascule diamant', 'Ce magnifique modèle de cheval à bascule original est parfait pour les enfants ', 'Hauteur de l\'assise 46 cm.\n                           Age	3 ans et +\n                           Dimensions	80 x 69 x 46 cm', 'Un modèle de cheval à bascule en bois inédit qui apportera une touche très déco et contemporaine dans votre intérieur. A monter soit même. A partir de 3 ans et plus.', 'cheval-bascule-diamant.jpg', 180.00, 0, 'cheval-a-bascule-diamant', 1, 31, 51),
	(336, 738, 284, 27, 'Chariot multi-activités Chat', 'Ce joli chariot en bois multi-activités, à pousser, est particulièrement adapté à l’apprentissage de la marche.', 'Dimensions	39,5 x 34,2 x 54 cm\n                            Matière	Bois (contreplaqué et MDF)', 'Grâce à sa poignée ajustable en hauteur (de 47 à 53 cm), ce chariot est évolutif et s’adapte à la taille de votre enfant. Il l\'accompagnera de 12 mois à 3 ans : son frein invisible et amovible\n                            permet de bloquer les roues (à 12 mois) et de les libérer progressivement afin de maitriser la vitesse du chariot pendant l’apprentissage. En plus de la marche, votre enfant pourra tester \n                            sa motricité fine ainsi que sa dextérité avec les 8 activités ludiques proposées : looping, boite à formes, souris à glisser, descendeur, engrenage, bouton sonore, yeux rotatifs et joues en feutrine\n                            pour développer le toucher. Enfin, avec ses 4 roues silencieuses en caoutchouc, il ne marque pas le sol.', 'chariot-multi-activites-chat-bois.jpg', 65.00, 0, 'chariot-multi-activites-chat', 1, 30, 50),
	(337, 766, 280, 27, 'Cartable baleine gris', 'Le cartable baleine gris est issu de la nouvelle collection de sacs de FRESK ', 'Composition : 100% PET recyclé - certifié GOTS - détails en similicuir\n                            Dimensions : 33 x 25 x 9 cm\n                            Age : à partir de 2,5 ans', 'un cartable durable et super tendance réalisé en PET recyclé. Ce matériau léger, écologique et imperméable est issu du recyclage des bouteilles en plastique.\n                            Ce cartable gris orné de baleines est doté de 2 compartiments pouvant accueillir des cahiers et livres format A4, d\'une pochette zippée, d\'une poignée robuste, de bretelles ajustables et d\'une fermeture réglable.\n                            Le cartable idéal pour rentrer en maternelle ! ', 'cartable-whale-dawn-grey-en-pet-recycle.jpg', 45.00, 0, 'cartable-baleine-gris', 1, 31, 51),
	(338, 751, 287, 27, 'Jeu de cartes Pipolo ', 'Pour gagner, il faut savoir mentir avec aplomb. Tout nu, à plumes ou poilu ?', 'Dimension 8,7x11,8x2,8 cm\n                           Matières	carton / papier\n                           Age	Dès 5 ans\n                           Nombre de joueurs	2-4', 'Pipolo, le jeu du menteur avec des règles inspirées des grands classiques des jeux de cartes, un jeu de cartes pour les enfants à partir de 5 ans.', 'Jeu_de_cartes_Pipolo_Djeco.jpg', 9.00, 0, 'jeu-de-cartes-pipolo', 1, 31, 52),
	(339, 734, 294, 27, 'Bouclier et épée loup', 'Pour les apprentis chevaliers.', 'Age	4 ans et +\n                           Dimensions	35 x 35 x 1 cm\n                           Composition  bois', 'Un bouclier et une épée en bois pour les apprentis chevaliers. Les loups vont montrer leurs crocs ! Bouclier en bois diamètre 35 cm.', 'bouclier-et-epee-loup-vilac.jpg', 22.00, 0, 'bouclier-et-epee-loup', 1, 31, 51),
	(340, 741, 288, 27, '3D Licorne Lily', 'Quand le coloriage prend forme ', 'AGE : 3-9 ANS', 'Jouet gonflable en papier à colorier\n                Lily, la licorne est un jouet gonflable ou un joli décor pour sa chambre.', 'lily-3d-air-toy.jpg', 15.00, 0, '3d-licorne-lily', 1, 30, 51),
	(341, 755, 293, 27, 'Navire de recherche', 'un hommage aux explorateurs et pionniers', 'Nombre de composants: 575\n                           Temps d\'installation: 10 heures\n                           Taille du modèle : 38,5 x 11 x 25 cm', 'Le Navire de recherche ». La structure en bois, qui se compose d\'un total de 575 pièces en bois individuelles, est un travail habile et fait sur mesure qui \n                            fait revivre les temps des grandes découvertes. La conquête du cercle arctique nord ou sud, du continent africain ou des latitudes sud-américaines n\'aurait \n                            pas été possible sans un développement technique supplémentaire.\n\n                            Le navire, conçu par UGEARS dans le style steampunk, est un hommage aux explorateurs et pionniers, dont l\'esprit de recherche se reflète dans ce modèle de navire.\n                            De plus, la conception rétrofuturiste de la coque était équipée de quelques extras, dont une grue pivotante et une rampe Drop . \n                            L\'illustration claire des modes techniques de mouvement peut être suivie avec précision et a donc un caractère d\'apprentissage. ', 'Ugears-Research-Vessel.jpg', 55.00, 1, 'navire-de-recherche', 1, 31, 53),
	(342, 718, 278, 27, 'Chat moutarde Lulu Les Moustaches', 'Doudou chat moutarde Lulu, Les Moustaches', 'Dimension: 22cm \n                           Matières: coton, polyester, élasthanne\n                           Entretien: lavage en machine 30° délicat\n                           Couleur: jaune\n                           Age: dés la naissance', 'doudou tout doux Lulu de la collection Les Moustaches fera le bonheur de votre petit. Ce compagnon de forme carrée est en velours\n                             couleur moutarde d\'un côté et en tissu rayé de l\'autre. Ce matou possède une attache-tétine afin de pas égarer la sucette de bébé', 'chat_moutarde_Lulu_Les_Moustaches.jpg', 22.00, 1, 'chat-moutarde-lulu-les-moustaches', 0, 31, 50),
	(343, 771, 292, 27, 'Draisienne Indian', 'Cette draisienne pourra accompagner votre petit aventurier de 3 à 6 ans.', 'Dimension : 86 x 40 x 58 cm\n                           Age  de 3 à 6 ans \n                           Réglage de la selle 33, 35 et 37 cm du sol', 'Son premier vélo sans pédale aidera votre enfant à entraîner son sens de l\'équilibre et le préparera au "vrai" vélo, sans forcément devoir passer par l\'étape "petites roues". \n                            Cette draisienne pourra accompagner votre petit aventurier de 3 à 6 ans.\n                            Les pneus, en 12 pouces (30 cm), sont "pleins" c\'est-à-dire sans chambre à air, et donc sans aucun risque de perte de gonflage. \n                            La selle est réglable en hauteur sur 3 positions : 33, 35 et 37 cm du sol. Une poignée usinée dans le cadre permet de facilement transporter la draisienne.', 'draisienne-indien.jpg', 90.00, 1, 'draisienne-indian', 0, 31, 51),
	(344, 766, 280, 27, 'Sac à dos primaire Ours Polaire', 'Grâce à ce charmant sac à dos Fresk, votre enfant sera fin prêt pour l\'école primaire.', 'Dimension du produit	40x25x10 cm\n                           Entretien	lavage en surface avec un chiffon humide\n                           Couleur	Gris\n                           Age	Dès 6 ans\n                           Label	Eco-friendly, GOTS', 'Sac à dos orné d\'ours polaires et de détails en cuir pour rentrer à l\'école maternelle avec style ! Les plus grands pourront l\'utiliser comme sac de natation ou de gym. \n                            Cerise sur le gâteau : ce sac à dos est conçu en bouteilles PET recyclées. \n\n                            Ce sac à dos est doté d\'un grand compartiment, d\'une pochette séparée pour la gourde, d\'une poche avant avec une fermeture aimantée, de bretelles ajustables, d\'une fermeture éclair,\n                            de 2 poignées et d\'une étiquette pour indiquer le nom de l\'heureux propriétaire.', 'Sac_dos_primaire_Ours_Polaire_Fresk.jpg', 46.00, 0, 'sac-a-dos-primaire-ours-polaire', 0, 31, 52),
	(345, 749, 287, 27, 'Eduludo spacio', 'un jeu éducatif pour apprendre à votre enfant à se repérer dans l\'espace.', 'Dimensions : 21,5 x 21,5 x 6 cm\n                           Age de 4 à 6 ans', 'Devant, derrière, à-côté... la notion d\'espace est difficile à appréhender pour les enfants, c\'est pourquoi il \n                            est plus facile de leur expliquer avec des figurines. Eduludo Spacio de Djeco est un beau jeu pour se repérer dans l\'espace.\n\n                            Pour reproduire la photo, l\'enfant doit placer correctement les figurines sur le plateau. Où est la girafe, devant ou derrière l\'éléphant?\n                            Le coffret comprend un plateau en bois, 6 figurines en plastique, 20 cartes défis avec la solution au dos des cartes et la règle du jeu', 'eduludo-spacio-djeco.jpg', 20.00, 0, 'eduludo-spacio', 0, 31, 51),
	(346, 729, 294, 27, 'Poulet rôti à découper', 'Cuisine ce délicieux poulet, découpe-le et à table !', 'Matières : Bois\n                           Dimensions : 10 x 15 x 7 cm\n                           Nombre de composants : 9\n                           Age	3 ans et +', 'Poulet rôti à découper se composant de 9 pièces en bois, tout le nécessaire pour déguster un bon poulet rôti ! Une dinette en bois à partir de 3 ans.\n\n                Ce plateau se compose d\'une planche à découper, un couper, une broche et un poulet avec les ailes et les cuisses.\n                Votre enfant s\'amusera à découper le poulet grâce au velcro.', 'poulet-roti-a-decouper-vilac.jpg', 20.00, 0, 'poulet-roti-a-decouper', 0, 30, 51),
	(347, 735, 275, 27, 'Télescope 50 activités', 'Découvrir l\'espace et les sciences avec ce télescope éducatif', 'Lentille de 76 mm de diamètre et 3 oculaires de 20 mm ; 12.5 mm et 4 mm interchangeables.\n\n                            Trépied de sol de 76 cm. Le tube et le trépied sont en métal.\n                            Age De 8 ans jusqu\'à 12 ans', 'Un télescope réflecteur avec une notice de 50 activités pour découvrir le ciel étoilé, les planètes et les cratères lunaires.', 'telescope-50.jpg', 80.00, 0, 'telescope-50-activites', 0, 31, 53),
	(348, 733, 290, 27, 'Allosaure', 'foulez la terre du Jurassique', 'Longueur: 25 cm\n                            Hauteur: 10,5 cm\n                            Matériau: PVC norme C.E.\n                            Age: à partir de 3 ans', 'Avec les dinosaures, foulez la terre du Jurassique, côtoyez le légendaire T-Rex, parcourez de vastes plaines avec le vélociraptor ou envolez-vous avec un ptéranodon.', 'allosaure.jpg', 28.00, 0, 'allosaure', 0, 31, 51),
	(349, 730, 284, 27, 'Garage station service', 'Tut tut ! Les voitures et scooters s\'avancent pour faire le plein d\'essence et passent au nettoyage pour être rutilantes !', 'Dimensions	46,2 x 31,2 x 35 cm\n                           Matière	Bois', 'Tut tut ! Les voitures et scooters s\'avancent pour faire le plein d\'essence et passent au nettoyage pour être rutilantes ! Ce grand garage station service en bois \n                            est sur trois niveaux et est équipé d\'un ascenseur manuel et d\'un centre de lavage au premier niveau. Il comprend 8 accessoires en bois pour s\'imaginer des tas d\'histoires !\n                            Il contient 4 véhicules, 1 pompe à essence, 3 personnages "en activité" ( 2 garagistes et personnages en scooter) et une planche de stickers de format A4 pour décorer le garage !', 'garage-station-service-bois.jpg', 70.00, 0, 'garage-station-service', 0, 31, 51),
	(350, 727, 278, 27, 'Hochet bois Pakou', 'Cet hochet à mâchouiller soutiendra aussi bébé lors des poussées dentaires un peu douloureuses.', 'Dimension 10,5x2,5x12,5 cm\n                           Détails des matières	Bois, plastique\n                           Couleur	Multicolore\n                           Age	Dès 12 mois', 'Ce hochet en bois de hêtre aux joyeuses couleurs tropicales accompagnera bébé dans sa première année. \n                            Il se compose de plusieurs éléments, quelques feuilles aux jolies teintes vertes, rouges et bleues, et d’un petit toucan. Facile à saisir, le jouet d’éveil aide bébé dans son apprentissage de la motricité fine', 'Hochet_bois_Pakou.jpg', 12.00, 0, 'hochet-bois-pakou', 0, 31, 50),
	(351, 729, 284, 27, 'Épicerie green market', 'Comme au marché ! Quelle jolie épicerie avec ses couleurs fraîches et son décor fruits et légumes ! ', 'Dimensions	43 x 30 x 93 cm\n                           Matière	Bois, papier, carton', 'Avec ses nombreux accessoires, elle est parfaite pour les apprentis marchands ! La marchande Green Market est équipée d\'une horloge, d\'un panneau ardoise pour poser\n                            les additions ou noter les horaires d\'ouverture, d\'une boite de craies, de six boites d\'aliments en carton (farine, riz, jus d\'orange, cacao, pâte et fromage), \n                            d\'une caisse enregistreuse et d\'une balance. Dans les petits casiers les enfants pourront placer les fruits et légumes suivants : trois pommes, trois bananes,\n                            trois fraises, trois carottes, trois radis et trois pommes de terre. Sur le devant de chaque casier une petite partie ardoise permettra également d\'inscrire le prix de chaque article. \n                            Pour les plus petits, un marche pied permet d\'être à la bonne hauteur. Pour faire les courses comme des grands, trois sacs de courses en papier au nom de la petite boutique sont inclus ! \n                            Pour compléter ces accessoires, les enfants auront bien sûr pièces et billets afin de régler la note. Au total, ce sont 32 accessoires inclus dans cette épicerie en bois !', 'epicerie-green-market-bois.jpg', 100.00, 0, 'epicerie-green-market', 1, 30, 51),
	(352, 773, 284, 27, 'Quilles jurassiennes', 'Beau jeu de 12 quilles jurassiennes au bâton en bois massif livrées avec la règle du jeu franc-comtoise.', 'Dimensions	26 x 10 x 20,5 cm\n                           Matière	Bois massif\n                           Nb Joueurs	2 et plus', 'Beau jeu de 12 quilles jurassiennes au bâton en bois massif livrées avec la règle du jeu franc-comtoise. Pour jouer, il faut faire 63 points et ne pas sortir de l’aire de jeu au risque d’être éliminé. \n                            Compatible avec la règle du jeu des quilles finlandaises. Fabriqué en France.', 'quilles-jurassiennes-bois.jpg', 35.00, 0, 'quilles-jurassiennes', 0, 31, 52),
	(353, 724, 284, 27, 'Escargot à promener', 'Cet escargot en bois à promener est très rigolo ! La coquille tourne lorsqu\'on le promène', 'Dimensions	20,5 x 8,9 x 20 cm\n                           Matière	Bois (hêtre et contreplaqué)', 'Cet escargot en bois à promener est très rigolo ! La coquille tourne lorsqu\'on le promène et s\'enlève pour révéler un tambourin et un petit xylophone ! Les antennes de l\'escargot sont \n                            également amovibles et forment les baguettes. Un joli compagnon aux tons très doux et très actuels qui éveillera votre enfant à la musique de façon ludique !', 'escargot-a-promener-pure-bois.jpg', 30.00, 0, 'escargot-a-promener', 0, 31, 50),
	(354, 725, 285, 27, 'Jouet à suspendre Georges hochet clap clap', ' se suspend par la queue et soulage les gencives douloureuses', 'Composition	Tissu externe: 100% Polyester T/C: 80% Polyester - 20% coton\n                           Lavage	Lavable en machine à 30°C – cycle délicat', 'Clap Clap ! Georges applaudit avec ses pattes anneau de dentition. Suspend-le par la queue et fais retentir le petit grelot placé dans son cerceau.', 'Georges-hochet-clap-clap.jpg', 25.00, 0, 'jouet-a-suspendre-georges-hochet-clap-clap', 0, 31, 50),
	(355, 757, 278, 27, 'Lampe à histoires Chien pourri !', 'Une lampe torche qui projette des images en couleurs pour raconter de jolies histoires', 'La lampe projette des images jusqu\'à 90 cm de large.\n                            Fonctionne avec 3 piles bouton fournies (1,5 V AG13/LR44)\n                            Dimensions : 16 x 4 cm', '3 disques, 3 histoires originales pour découvrir les aventures de ce chien et ses amis.\n                            Chacun des 3 disques projetés sur le mur raconte les aventures délirantes de Chien pourri, héros farceur de l\'école des loisirs. Les illustrations colorées embarquent l\'enfant dans un monde\n                            imaginaire où il y a tout à inventer! ', 'lampe-a-histoires-chien-pourri.jpg', 13.00, 0, 'lampe-a-histoires-chien-pourri', 0, 31, 51),
	(356, 765, 275, 27, 'Lampe ballon', 'Plafonnier Encastré en Forme de Ballon', 'Tension 220V-240V\n                            Couleur Blanc\n                            Type D\'ampoule LED/Incandescent/Fluorescent\n                            Matière Acrylique\n                            Taille 30cm\n                            Type De Lampe Plafonnier\n                            Ampoule non incluse \n                            Base D\'ampoule E26/E27', 'Son design poétique trouve parfaitement sa place dans n’importe quelle pièce que cela soit chambre, salon ou encore entrée et l’illusion des ballons gonflables est parfaite\n La cordelette ! Le petit truc en plus de ces étonnants luminaires c’est la cordelette. Outre sa fonction décorative, celle-ci a une vraie utilité puisqu’il s’agit de l’interrupteur.', 'lampe_ballon.jpg', 45.00, 1, 'lampe-ballon', 0, 31, 51),
	(357, 726, 278, 27, 'Mobile musical Le voyage d\'Olga', 'Ravissant mobile musical croisillon de la collection Le voyage d\'Olga', 'Dimensions : 35 x 65 cm Mobile vendu avec la potence en bois. Lavage en surface, pas de sèche-linge Matière : coton, polyester, lin et bois', 'Un mobile en bois pour éveiller le jour et endormir la nuit. Un mobile à accrocher au lit de bébé ou au parc destiné à la stimulation visuelle et auditive de bébé. Il sera bercé par les oies, les étoiles et la lune ', 'mobile-musical-le-voyage-d-olga.jpg', 80.00, 0, 'mobile-musical-le-voyage-dolga', 0, 30, 50),
	(358, 722, 278, 27, 'Kalimba Le Voyage d\'Olga', 'Idéal pour les petits musiciens', 'Dimension du produit	13x14 cm\n                        Détails des matières	MDF, métal\n                        Marque	Moulin Roty\n                        Couleur	Multicolore\n                        Age	Dès 4 ans', 'Les lamelles en métal émettent des sons différents selon la taille. La sonorité est harmonieuse quelque soit l\'âge du joueur. Illustré du renard de la gamme, cet instrument de musique permettra à votre enfant de s\'éveiller à la musique', 'kalimba.jpg', 25.00, 0, 'kalimba-le-voyage-dolga', 0, 31, 52),
	(359, 747, 276, 27, 'Pate intélligente crazy aaron - baguette de sorcier', 'A manipuler, à modeler mais pas que', 'boite de 10cm de diamètre Conseillé à partir de 6 ans', 'Elle rebondit et chaque pâte de la gamme Crazy Aaron a une propriété en plus. Violette aux étincelles dorées elle devient bleut électrique dans le noir', 'pate-crazy-aaron-baguette-de-sorcier-crazy-aaron.jpg', 15.00, 0, 'pate-intelligente-crazy-aaron-baguette-de-sorcier', 0, 31, 52),
	(360, 719, 284, 27, 'Pantin lapin Rose', 'On peut l’accrocher partout', 'Matière(s) Velours Couleur Rose Taille 35 cm', 'Ce joyeux lapin rose a de si longues oreilles, on peut l’accrocher partout pour le  garder et ne jamais le perdre. Il peut tout faire avec : le poirier, de la balançoire, s’accroche au fil à linge, et va même jusqu’à se balancer à la lune. Avec ses si longues oreilles, il enveloppe les bébés de tendres câlins et partage des moments de douceur avec eux. Lavable en machine. Présenté dans un joli coffret cadeau personnalisable avec un message dans l\'espace disponible sous le couvercle.', 'pantin-lapin-rose-medium.jpg', 25.00, 0, 'pantin-lapin-rose', 0, 30, 50),
	(361, 740, 294, 27, 'Porteur voiture vintage en métal', 'Porteur pour les enfants dès 18 mois ', 'Couleur bleu pétrole Age 18 mois et + Dimensions	76 x 38 x 40 cm À monter soi-même. Hauteur de l\'assise = 28 cm.', 'la voiture en métal bleu pétrole de Vilac, un porteur idéal pour les enfants à partir de 18 mois au look qui fera craquer tous les parents. Un cadeau à offrir dès la naissance ou le baptême pour décorer la chambre ou pour le premier anniversaire. Ce porteur est un petit bijou avec sa carrosserie en métal bleu pétrole.', 'voiture-porteur-metal-bleu-petrole-vilac.jpg', 110.00, 0, 'porteur-voiture-vintage-en-metal', 0, 31, 50),
	(362, 731, 282, 27, 'Ma Corolle Priscille', 'Priscille de Corolle est parée pour passer un Hiver Polaire !', 'Âge De 4 à 8 ans Marque	Corolle Poids 706 g Poupée de 36cm Emballage 18.5 x 13 x 40 cm', 'La poupée Ma Corolle Priscille de Corolle est parée pour passer un Hiver Polaire ! Poupée de 36 cm en édition limitée, Priscille a un corps souple « effet » sous-vêtement avec de longs cheveux soyeux faciles à coiffer. Son visage, ses bras et ses jambes, à la délicate senteur de vanille, sont en vinyle doux au toucher. Avec ses yeux dormeurs, elle dort quand on la couche sur le dos. Elle est habillée d\'une toque en fausse fourrure et lainage écrue, d\'une veste sans manches en fausse fourrure écrue avec un petit nœud bleu constellé de pois argentés, d\'une robe à pois argentés, d\'une paire de collants écrus et chaussée d\'une paire de bottines argentés avec de la fausse fourrure.', 'Priscille.jpg', 70.00, 0, 'ma-corolle-priscille', 0, 30, 51),
	(363, 721, 285, 27, 'Georges housse Carnet de santé ', 'Un magnifique protège carnet de santé pratique et coloré', 'Dimensions : 24 x 17 cm Matière : polyester et coton  lavable à 30° en mâchine.', 'Un cadeau utile et tout en douceur pour les jeunes mamans, cette housse zippée de Georges le lémurien protègera le carnet de santé de bébé. Très pratique, vous y glisserez son carnet, y écrirez son nom et y glisserez toutes les informations indispensables dans les pochettes intérieures, pour tout transporter dans les meilleures conditions.', 'georges-housse-carnet-de-sante-lilliputiens.jpg', 26.00, 0, 'georges-housse-carnet-de-sante', 0, 31, 50),
	(364, 746, 287, 27, 'Puzzle dodo 350 pièces Puzz\'art', 'Un Puzz\'art au format inédit sans coins ni bordures', 'Dimension du puzzle : 46 x 62 cm Dimension de la boîte : 34 x 23 x 5 cm', ' le puzzle Dodo de 350 pièces, un Puzz\'art Djeco au format inédit sans coins ni bordures pour les enfants dès 7 ans. Un oiseau qui vous demandera de la patience et de la concentration. Un format inédit et une façon ludique et originale de réaliser un puzzle avec une grande silhouette dans laquelle de nombreuses illustrations sont représentées.', 'puzzle-dodo-350-pieces-puzz-art-djeco.jpg', 15.00, 0, 'puzzle-dodo-350-pieces-puzzart', 0, 31, 52),
	(365, 750, 289, 27, 'Pagodes édition du dragon', 'Construisez chemins et ponts pour relier les pagodes entre elles!', 'Âge 7+ Défis 80 Joueurs 1\n                Dans la boîte Un plan de jeu, 3 pagodes, 7 pièces de jeu, 1 Dragon et 1 livret de 80 défis et toutes les solutions.', 'Placez judicieusement les pièces nécessaires à la construction de chemins et de ponts pour vous rendre d’une pagode à l’autre!\n                Quels étages de chaque pagode relierez-vous ensemble pour trouver la solution ? Propose 80 défis de niveau de difficulté croissant.\n                Dans cette édition de luxe, un dragon d’or vous fournira des indices supplémentaires !', 'smartgames_templeconnectiondragonedition-FR_banner.jpg', 25.00, 0, 'pagodes-edition-du-dragon', 0, 31, 52),
	(366, 751, 291, 27, 'Poule poule', 'Le Festival de Cinéma vient de commencer, et l’avant-première du film Poule Poule est en train de virer au drame...', 'De 2 à 8 joueurs à partir de 8 ans.\n                Durée de la partie : 20 min', 'Un peu moins d’une heure avant la projection, ce maladroit de Waf a mélangé l’ensemble des pellicules. Pour aider Cocotte, qui n’a pas une minute à perdre, et pour éviter que Crack ne craque pour de bon, il faut reconstituer le film au plus vite. Et n’oubliez pas, l’histoire ne prend fin qu\'à l\'apparition du cinquième œuf!\n                Le réalisateur, appelé le "Maître Poule Poule", va empiler les cartes, une par une, les unes sur les autres au centre de la table. Pendant ce temps, les autres joueurs devront "juste" compter les oeufs "disponibles" et être le premier à taper sur le tas dès qu’il y en a 5… facile non? Attendez-vous à quelques perturbations tout de même… car : Lorsqu\'une poule vient couver un oeuf, il disparait! Lorsqu\'un renard chasse une poule, elle s\'enfuit... et l\'oeuf réapparait!               \n                Et c\'est sans compter sur le reste du casting... comprenant : Rico Coco (le coq au passé tumultueux), Waf (le cousin de Paf), Tiger Worm (le ver qui fera son trou), Crack et Double (qui ont bien l\'intention de percer... leur coquille), Coin (l’ambitieux canard bruyant), Grrr (qui essaye de se faire passer pour une poule), et le Fermier...', 'Poule-Poule.jpg', 15.00, 0, 'poule-poule', 0, 31, 53),
	(367, 763, 279, 27, 'HORS-JEU', 'Boule & Bill, c’est l’histoire d’une amitié extraordinaire', 'D’après l’univers de Boule et Bill par Roba.\n                Cadre en bois\n                Finition du design: mate\n                Dimensions du cadre : 50 x 50 x 3 cm\n                Dimension du design externe : 35 cm maximum en dehors du cadre ( 1 cm d’épaisseur)\n                Poids : 1.3 kg\n                Système d’accroche : cadre avec huit accroches murales sur sa partie dorsale.\n                Emballage : un emballage sous forme de mallette, 100% recyclable, facile à transporter et idéal\n                pour offrir.\n                Copyright Studio Boule et Bill, 2019', 'Boule & Bill, c’est l’histoire d’une amitié extraordinaire entre un petit garçon et son chien ! Le cocker le plus célèbre de la bande dessinée fait équipe avec son meilleur ami Boule et la tortue Caroline pour de nouvelles aventures hors du cadre! Un design qui séduira autant les enfants que les collectionneurs. Cette oeuvre est issue d’une belle collaboration entre les studios créations Mediatoon et Funky Frame', 'xbouleetbill_hors-jeu-600x600.png', 150.00, 0, 'hors-jeu', 0, 31, 51),
	(368, 758, 284, 27, 'Table et Chaises Banquise', 'Pour les artistes en herbe', 'Dimensions 60 x 60 x 47 cm Matière Bois \n                La table a un diamètre de 60 cm et mesure 47 cm de haut. Les chaises mesurent 49 cm de haut. La hauteur de l\'assise est de 26 cm et mesure 29 cm par 27 cm.', ' \n                Avec cette table en bois et ses 2 chaises aux couleurs douces, les enfants pourront dessiner et jouer à volonté. Les chaises sont adaptées à la taille des enfants dès 3 ans. Au centre de la table, le pot à crayon permettra de ranger les feutres et crayons de couleurs. Le pot à crayon amovible est fourni. Crayons de couleurs non inclus.', 'AB0005676068_1.jpg', 90.00, 0, 'table-et-chaises-banquise', 0, 30, 51),
	(369, 761, 278, 27, 'Tirelire éléphant Sous mon baobab', 'Bergamote l\'éléphant se promène avec Paprika le lion sur le dos.', 'Dimensions de la tirelire : 14 x 14 cm', 'Une jolie tirelire en résine avec Paprika le lion et ses amis les oiseaux qui se baladant à dos d\'éléphant. Un cadeau de naissance très décoratif pour la chambre des bébés. \n                En résine, elle participera à la décoration de chambre de votre enfant et renfermera dans le ventre de cet éléphant les sous de votre enfant.', 'tirelire_sous_mon_baobab.jpg', 29.00, 0, 'tirelire-elephant-sous-mon-baobab', 0, 31, 51),
	(370, 762, 278, 27, 'Toise carnet Les Moustaches', 'toise en carton avec stickers déco reprenant les couleurs et illustrations de la gamme.', 'Dimensions de la toise dépliée : 15 x 138 cm', 'une fois dépliée vous pourrez inscrire le prénom de l\'enfant, sa date de naissance, et sa taille de naissance. Puis vous aurez à votre disposition des stickers pour compléter la toise au fil des années. Des stickers "c\'est mon anniversaire, j\'ai...ans !" et des stickers marquants les étapes de la vie de votre bébé : "je sais faire mes lacets","je sais lire", "je sais compter jusqu\'à 10", "mon premier jour d\'école"...', 'Toise_carnet_Les_Moustaches_-_Moulin_Roty.jpg', 18.00, 0, 'toise-carnet-les-moustaches', 0, 30, 50),
	(371, 772, 277, 27, 'Porteur & trottinette Scoot & ride', 'Un porteur intelligent qui se transforme en trottinette.', 'Pour les enfants de 1 à 5 ans\n                Porteur/trottinette 2 en 1\n                Supporte un poids de 20 kg en mode porteur et 50 kg en mode trottinette\n                Passe du mode porteur au mode trottinette en quelques secondes sans outil\n                Trotteur à 3 roues : 1 petite à l\'arrière et 2 à l\'avant très larges pour plus de stabilité\n                Possède un tampon de sécurité breveté entre les roues avant pour éviter à l\'engin de basculer\n                En mode porteur, large assise souple pour plus de confort\n                Assise réglable en hauteur de 22,5 à 29 cm\n                Guidon réglable en hauteur pour s\'adapter à la taille de l\'enfant de 82 à 118 cm\n                Roue arrière munie d\'un garde-boue', 'Le Highwaykick 1 de Scoot and Ride est un porteur intelligent qui se transforme en trottinette pour le plus grand plaisir de votre bambin. Alors qu\'il sait à peine marcher, dès qu\'il a soufflé sa première bougie, il peut goûter à la joie de se déplacer en toute autonomie grâce au mode porteur. L\'engin a été conçu pour apporter un maximum de confort et de sécurité à votre enfant. Quand il marche enfin et se tient debout, vous pouvez très facilement modifier la configuration du porteur. Sans outil, vous le passez en mode trottinette en quelques secondes.', 'scoot-and-ride-highwaykick-1-kiwi-04.jpg', 105.00, 1, 'porteur-trottinette-scoot-ride', 0, 31, 50),
	(372, 764, 274, 27, 'Luciole Perceval', 'Lampe d\'ambiance à poser pour lire et écouter des histoires', 'Coloris	Bleu\n                Matiere	Résine\n                Profil	Garçon\n                Dimension	300x180x180', 'aussi jolie éteinte qu\'allumée, entièrement décorée à la main : un futur compagnon de chambre, à la personnalité affirmée.\n                Lampe avec transformateur basse tension à la prise, entièrement sécurisée l\'enfant ne peut pas toucher l\'ampoule.             \n                Coque en résine incassable et ampoule protégée et inaccessible par l\'enfant. Seul un adulte est habilité à changer l\'ampoule.  Répond parfaitement aux normes CE et à l\'esprit de celles-ci.', 'luciole-perceval.jpg', 80.00, 0, 'luciole-perceval', 0, 31, 50),
	(373, 767, 280, 27, 'Sac week-end Pingouin', 'idéal pour les sorties du week-end, les activités sportives ou encore les séjours chez les grands-parents', 'Dimension du produit	46x21x21 cm\n                Conseils d\'entretien	lavage en surface avec un chiffon humide\n                Couleur	Jaune\n                Age	Dès 12 mois\n                Label	Eco-friendly, GOTS', 'Fabriqué à partir de bouteilles en PET recyclées, ce sac à motifs possède une poche extérieure avec une fermeture éclair ainsi qu\'un compartiment interne. De plus, grâce à ses doubles poignées adaptées aux petites mains, votre bambin pourra le transporter facilement lors de ses déplacements. Ultra pratique pour ranger les petites affaires de votre bout de chou et les maintenir bien en sécurité, cet adorable sac cylindrique est à la fois esthétique, résistant et fonctionnel. Un allié parfait pour les premiers voyages de votre petit. Disponibles dans de nombreux motifs.', 'Sac_weekend_enfant_Pingouin_Fresk.jpg', 180.00, 0, 'sac-week-end-pingouin', 0, 30, 50);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Listage de la structure de la table projet5. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=774 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.categorie : ~56 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
REPLACE INTO `categorie` (`id`, `description`, `code`, `slug`) VALUES
	(718, 'Doudous', 'doudou', 'doudous'),
	(719, 'Peluches', 'peluche', 'peluches'),
	(720, 'Albums photo', 'albums', 'albums-photo'),
	(721, 'Protège carnet de santé', 'carnetsanté', 'protege-carnet-de-sante'),
	(722, 'Musique', 'musique', 'musique'),
	(723, 'Jouets de bain', 'bain', 'jouets-de-bain'),
	(724, 'Jouets à tirer', 'tirer', 'jouets-a-tirer'),
	(725, 'Jouets à suspendre', 'suspendre', 'jouets-a-suspendre'),
	(726, 'Mobile', 'mobile', 'mobile'),
	(727, 'Hochets', 'hochet', 'hochets'),
	(728, 'Cuisines', 'cuisine', 'cuisines'),
	(729, 'Epicerie', 'epicerie', 'epicerie'),
	(730, 'Garage', 'garage', 'garage'),
	(731, 'Poupée', 'poupée', 'poupee'),
	(732, 'Miniature', 'miniature', 'miniature'),
	(733, 'Figurine', 'figurine', 'figurine'),
	(734, 'Chevalier', 'chevalier', 'chevalier'),
	(735, 'Téléscope', 'telescope', 'telescope'),
	(736, 'Globe terrestre', 'globe', 'globe-terrestre'),
	(737, 'Premier jeux d\'éveil', 'premiereveil', 'premier-jeux-deveil'),
	(738, 'Chariots de marche', 'chariot', 'chariots-de-marche'),
	(739, 'Cheval à bascule', 'bascule', 'cheval-a-bascule'),
	(740, 'Porteur', 'porteur', 'porteur'),
	(741, 'Coloriage', 'coloriage', 'coloriage'),
	(742, 'Peinture', 'peinture', 'peinture'),
	(743, 'Pâte à modeler', 'pâtemodeler', 'pate-a-modeler'),
	(744, 'Activités manuelle', 'manuelle', 'activites-manuelle'),
	(745, 'Cartes à gratter', 'cartegratter', 'cartes-a-gratter'),
	(746, 'Puzzle', 'puzzle', 'puzzle'),
	(747, 'Pate intélligente', 'pateInté', 'pate-intelligente'),
	(748, 'Premier jeux', 'premier', 'premier-jeux'),
	(749, 'Educatif', 'educatif', 'educatif'),
	(750, 'Réflextion/stratégie', 'reflexion', 'reflextion-strategie'),
	(751, 'Jeux de cartes', 'cartes', 'jeux-de-cartes'),
	(752, 'Voyage', 'voyage', 'voyage'),
	(753, 'Jouets à empiler, encastrer', 'empiler', 'jouets-a-empiler-encastrer'),
	(754, 'Jouets magnétique', 'magnétique', 'jouets-magnetique'),
	(755, 'Jeux de constructions', 'construction', 'jeux-de-constructions'),
	(756, 'Lunii', 'lunii', 'lunii'),
	(757, 'Lampe à histoire', 'lampehistoire', 'lampe-a-histoire'),
	(758, 'Petite tables & chaises', 'tableschaises', 'petite-tables-chaises'),
	(759, 'Boite à dents', 'boitedent', 'boite-a-dents'),
	(760, 'Boite à musique', 'boiteMusique', 'boite-a-musique'),
	(761, 'Tirelire', 'tirelire', 'tirelire'),
	(762, 'Toise', 'toise', 'toise'),
	(763, 'Tableaux', 'tableaux', 'tableaux'),
	(764, 'Veilleuse', 'veilleuse', 'veilleuse'),
	(765, 'Luminaire', 'luminaire', 'luminaire'),
	(766, 'Cartable', 'cartable', 'cartable'),
	(767, 'Voyage', 'valise', 'voyage-1'),
	(768, 'Cape et kimono de bain', 'capebain', 'cape-et-kimono-de-bain'),
	(769, 'Serviettes', 'serviette', 'serviettes'),
	(770, 'Plaid', 'plaid', 'plaid'),
	(771, 'Draisienne', 'draisienne', 'draisienne'),
	(772, 'Trotinette', 'trotinette', 'trotinette'),
	(773, 'Quilles, croquet', 'quille', 'quilles-croquet');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table projet5. categorie_categorie_secondaire
CREATE TABLE IF NOT EXISTS `categorie_categorie_secondaire` (
  `categorie_id` int(11) NOT NULL,
  `categorie_secondaire_id` int(11) NOT NULL,
  PRIMARY KEY (`categorie_id`,`categorie_secondaire_id`),
  KEY `IDX_ABC1A0C7BCF5E72D` (`categorie_id`),
  KEY `IDX_ABC1A0C7867E4656` (`categorie_secondaire_id`),
  CONSTRAINT `FK_ABC1A0C7867E4656` FOREIGN KEY (`categorie_secondaire_id`) REFERENCES `categorie_secondaire` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_ABC1A0C7BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.categorie_categorie_secondaire : ~56 rows (environ)
/*!40000 ALTER TABLE `categorie_categorie_secondaire` DISABLE KEYS */;
REPLACE INTO `categorie_categorie_secondaire` (`categorie_id`, `categorie_secondaire_id`) VALUES
	(718, 209),
	(719, 209),
	(720, 209),
	(721, 209),
	(722, 211),
	(723, 211),
	(724, 211),
	(725, 211),
	(726, 211),
	(727, 211),
	(728, 216),
	(729, 216),
	(730, 216),
	(731, 216),
	(732, 216),
	(733, 216),
	(734, 217),
	(735, 218),
	(736, 218),
	(737, 210),
	(738, 210),
	(739, 210),
	(740, 210),
	(741, 212),
	(742, 212),
	(743, 212),
	(744, 212),
	(745, 212),
	(746, 212),
	(747, 212),
	(748, 214),
	(749, 214),
	(750, 214),
	(751, 214),
	(752, 214),
	(753, 213),
	(754, 213),
	(755, 213),
	(756, 215),
	(757, 215),
	(758, 220),
	(759, 219),
	(760, 219),
	(761, 219),
	(762, 219),
	(763, 219),
	(764, 219),
	(765, 219),
	(766, 221),
	(767, 221),
	(768, 222),
	(769, 222),
	(770, 222),
	(771, 223),
	(772, 223),
	(773, 224);
/*!40000 ALTER TABLE `categorie_categorie_secondaire` ENABLE KEYS */;

-- Listage de la structure de la table projet5. categorie_principal
CREATE TABLE IF NOT EXISTS `categorie_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.categorie_principal : ~6 rows (environ)
/*!40000 ALTER TABLE `categorie_principal` DISABLE KEYS */;
REPLACE INTO `categorie_principal` (`id`, `description`, `code`, `slug`) VALUES
	(79, 'Naissance', 'naissance', 'naissance'),
	(80, 'Imitation', 'imitation', 'imitation'),
	(81, 'Jeux et jouets', 'jeuxJouets', 'jeux-et-jouets'),
	(82, 'Mobilier & decoration', 'mobilier', 'mobilier-decoration'),
	(83, 'Accessoire & textile', 'accessoire', 'accessoire-textile'),
	(84, 'Plein air', 'exterieur', 'plein-air');
/*!40000 ALTER TABLE `categorie_principal` ENABLE KEYS */;

-- Listage de la structure de la table projet5. categorie_secondaire
CREATE TABLE IF NOT EXISTS `categorie_secondaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_principal_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EF5292333E4B366C` (`categorie_principal_id`),
  CONSTRAINT `FK_EF5292333E4B366C` FOREIGN KEY (`categorie_principal_id`) REFERENCES `categorie_principal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.categorie_secondaire : ~16 rows (environ)
/*!40000 ALTER TABLE `categorie_secondaire` DISABLE KEYS */;
REPLACE INTO `categorie_secondaire` (`id`, `categorie_principal_id`, `description`, `code`, `slug`) VALUES
	(209, 79, 'pour bébé', 'bébé', 'pour-bebe'),
	(210, 81, 'Premier âge', 'premierage', 'premier-age'),
	(211, 79, 'eveil', 'eveil', 'eveil'),
	(212, 81, 'Loisirs créatifs', 'créatifs', 'loisirs-creatifs'),
	(213, 81, 'Construction', 'construction', 'construction'),
	(214, 81, 'Jeux de sociétés', 'sociétés', 'jeux-de-societes'),
	(215, 81, 'Histoire du soir', 'histoire', 'histoire-du-soir'),
	(216, 80, 'Jouets en bois', 'jouetbois', 'jouets-en-bois'),
	(217, 80, 'Déguisements', 'déguisements', 'deguisements'),
	(218, 80, 'Espace', 'espace', 'espace'),
	(219, 82, 'decoration', 'decoration', 'decoration'),
	(220, 82, 'mobilier', 'mobilier', 'mobilier'),
	(221, 83, 'bagagerie', 'bagagerie', 'bagagerie'),
	(222, 83, 'textile', 'textile', 'textile'),
	(223, 84, 'Se déplacer', 'deplacer', 'se-deplacer'),
	(224, 84, 'Jeux d\'extérieur', 'exterieur', 'jeux-dexterieur');
/*!40000 ALTER TABLE `categorie_secondaire` ENABLE KEYS */;

-- Listage de la structure de la table projet5. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table projet5.doctrine_migration_versions : ~12 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
REPLACE INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20210219132041', '2021-03-11 08:04:59', 956),
	('DoctrineMigrations\\Version20210219132248', '2021-03-11 08:05:00', 49),
	('DoctrineMigrations\\Version20210306130033', '2021-03-11 08:05:00', 26),
	('DoctrineMigrations\\Version20210309082945', '2021-03-11 08:05:00', 204),
	('DoctrineMigrations\\Version20210309083626', '2021-03-11 08:05:00', 154),
	('DoctrineMigrations\\Version20210311080131', '2021-03-11 08:05:01', 225),
	('DoctrineMigrations\\Version20210311082744', '2021-03-11 08:28:29', 383),
	('DoctrineMigrations\\Version20210312131237', '2021-03-12 13:13:07', 247),
	('DoctrineMigrations\\Version20210312132118', '2021-03-12 13:21:24', 320),
	('DoctrineMigrations\\Version20210312132605', '2021-03-12 13:26:13', 154),
	('DoctrineMigrations\\Version20210312132934', '2021-03-12 13:29:43', 286),
	('DoctrineMigrations\\Version20210319134400', '2021-03-19 13:44:11', 290);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table projet5. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.genre : ~2 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
REPLACE INTO `genre` (`id`, `code`, `slug`) VALUES
	(30, 'fille', 'fille'),
	(31, 'garçon', 'garcon');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table projet5. image
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.image : ~0 rows (environ)
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;

-- Listage de la structure de la table projet5. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.marque : ~21 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
REPLACE INTO `marque` (`id`, `titre`, `image`, `slug`) VALUES
	(274, 'Oiseau bateau', 'oiseaubateau.jpg', 'oiseau-bateau'),
	(275, 'Buki', 'buki-logo.jpg', 'buki'),
	(276, 'Dam', 'dam.jpg', 'dam'),
	(277, 'BaForKids', 'baforkid.png', 'baforkids'),
	(278, 'Moulin Roty', 'moulinroty.png', 'moulin-roty'),
	(279, 'Funky Frames', 'funkyframes.png', 'funky-frames'),
	(280, 'Fresk', 'fresk.png', 'fresk'),
	(281, 'Bergamotte', 'bergamote.jpg', 'bergamotte'),
	(282, 'Corolle', 'corolle.png', 'corolle'),
	(283, 'Haba', 'haba.png', 'haba'),
	(284, 'Janod', 'janod.png', 'janod'),
	(285, 'Lilliputiens', 'lilliputiens.jpg', 'lilliputiens'),
	(286, 'Lunii', 'lunii.png', 'lunii'),
	(287, 'Djeco', 'djeco.png', 'djeco'),
	(288, 'Omy', 'omy.png', 'omy'),
	(289, 'Smartgame', 'smartgame.png', 'smartgame'),
	(290, 'Papo', 'papo.jpg', 'papo'),
	(291, 'Pixie', 'pixie.jpg', 'pixie'),
	(292, 'Ulysse', 'ulysse.jpg', 'ulysse'),
	(293, 'Ugears', 'ugears.png', 'ugears'),
	(294, 'Vilac', 'vilac.jpg', 'vilac');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table projet5. reset_password_request
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`),
  CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.reset_password_request : ~0 rows (environ)
/*!40000 ALTER TABLE `reset_password_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset_password_request` ENABLE KEYS */;

-- Listage de la structure de la table projet5. slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.slider : ~3 rows (environ)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
REPLACE INTO `slider` (`id`, `image`) VALUES
	(40, 'moulinroty.jpg'),
	(41, 'wesko.jpg'),
	(42, 'trybike.jpg');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Listage de la structure de la table projet5. tva
CREATE TABLE IF NOT EXISTS `tva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valeur_tva` decimal(10,2) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.tva : ~2 rows (environ)
/*!40000 ALTER TABLE `tva` DISABLE KEYS */;
REPLACE INTO `tva` (`id`, `valeur_tva`, `slug`, `code`) VALUES
	(27, 20.00, 'normal', 'normal'),
	(28, 5.50, 'reduit', 'reduit');
/*!40000 ALTER TABLE `tva` ENABLE KEYS */;

-- Listage de la structure de la table projet5. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet5.user : ~5 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `lastname`, `firstname`) VALUES
	(1, 'anneceline.ollivier@hotmail.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$VFh3MVJ1OWVhSUttMmh6Uw$bAMqll8cTXlM96sMM/H5CW6sr03qqVyhJvJqrsSZ7oE', 0, 'OLLIVIER', 'Anne-celine'),
	(2, 'made_in_51@hotmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$V3pMRDM0ZkhzUEU0aE50cA$lb7RIiMXTTNNPl0l6/Da8ovKkiB5bm2d2TUW8z8WRIE', 0, 'DARCOS', 'Michael'),
	(3, 'poissondavrilboutique@orange.fr', '["ROLE_ADMIN"]', '$argon2id$v=19$m=65536,t=4,p=1$NlhiQ2NZSEVIdXRwWGpwcQ$BLxCOdq63nYlmbfkqBjppH+VZsXGQrAPjJ7hlWSTfkY', 0, 'OLLIVIER', 'Anne-celine'),
	(4, 'olive.tom@hotmail.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$VGJuZGJHeVJzaVZWRUdSUA$ZUZvAY7lUY/sovfnQBXd58ioxNXn2oyTbyKvPRA//pM', 0, 'olive', 'tom'),
	(5, 'tom.oliv@hotmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$aGhpNktILmVwb3YweUdBLw$iVCEso0HoR2beqOTdYAsG9gGxYdhFoQ4cmDO5SWyvyU', 1, 'Tom', 'Olive');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
