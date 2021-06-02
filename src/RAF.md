- Verifier que les noms de fichiers correspondent aux nom de classe : OK
- Faire l'injection des dépendances dans tous les constructeurs des controllers : ok
- Pour tous les manager, faire l'injection du dbConnect : ok
- Vérifier l' utilité des controllers et ajuster : ok

- Déplace les fichiers inutiles dans un dossier oldSource à la racine du projet. Donc en dehors src. : ok
- Ne plus utiliser les superglobals $_GET, $_POST, $_FILES directement dans le code, il faut à la place utiliser la classe Request : ok
- Ne plus utiliser la superglobals $_SESSION directement dans le code, il faut à la place utiliser la classe Session : 
- Factorisés les templates dans mobilier deco, à première vu, ils ont peu de différences entre eux.
- Voir pour les autres templates


2e 

- Factorisés les templates dans mobilier deco, à première vu, ils ont peu de différences entre eux.
- Voir pour les autres templates


3

- Changer les href en Path
- utiliser les request dans les controllers

liste Request
$request->query->get('foo'); // $_GET

$request->request->get('bar', 'valeur par défaut si bar n'esiste pas'); // $_POST

$request->server->get('HTTP_HOST'); // $_SERVER

$request->files->get('foo'); // $_FILES


4
Modifier les tables dans heidi : ok
faire le userRepository : en cours
terminer les find dans l'articleRepository : ok
gerer les limit dans le findBy dans l'articleRepository : 
ranger les templates dans des dossiers correspondant : ok
finir la homePage et article : ok
creer un article dont le prix est 9,99 et doit bien afficher le prix : ok


Symfony

créer les autres entity sans les pk et fk
    * sans nom avec des _ ou reprenant le nom de la table  :  OK
    * commande :
        * symfony console m:e nom de l entité
        * symfony console m:mig
        * symfony console d:m:m 

Faire les Fixtures : ok

Changer la langues des templates : ok


26/01
Faire liste fonction du site : ok
rajouter les slug dans entité : categorie & marque & tva : ok
rajouter code dans tva : ok

faire tableau data marque et tva idem appFixtures


29/01
* Changer code tva : normal pour 20 reduit pour les 5.5 : ok
* continuer de creer les relation article -> marque : ok
                                article -> tva : ok

* Faire les slug des autres entité + maj fictures : ok
* créer des articles pour chaque caté : en cours
* Créer une table catégorie principal : ok
* créer une table caté secondaire avec une liaison : ok sans la liaison
* rensigé toutes les caté : ok 
* lié la table caté avec caté secondaire



02/02
* mettre la clef pour la tva : ok
* Mettre Tva et Marque dans les articles : ok
* controler les slug sous modèle article : ok
* finir les fictures et faire fonctionner : ok
* creer relation entre catégorie secondaire et categorie : ok mais a verifier
* remettre a jour les fictures : ok
* faire les wireframe homePage en prio :


05/02
* bien regler les catégorie des fictures pour le menu : ok
* faire la page liste des produits de la catégorie : ok
* faire un wireframe de la page liste des produits de la catégorie : ok

* faire les routes co ...
* creer relation entre catégorie secondaire et categorie : a corriger


09/02
* parge index article, retirer l'id et passer par le slug : ok
* liste catégorie, mettre le bon title : ok
* re mettre en place la gestion Utilisateur : ok 
* faire le slider avec bootstrap image mini 1400pix : ok
* dans les fictures rensigner l'entité slider : ok


12/02

* modifier les function pas de cc : ok
* changer le nom de la methode article dans article manager : ok
* faire fonctionner le slider comme pour killme5 : bof
* faire slider marques : a voir

16/02 

* virer MdBootstrap et refaire menu et footer : ok
* ajouter une page : selection et nouveauté pour ne pas avoir a retourner 
                    sur la homePage " dans le menu" : ok
* créer entité articleImage et faire relation avec article OTM depuis article
* créer entité age et genre et faire une relation avec article
* mettre en place la pagination
* ajouter la page tous les articles avec filtres caté princp, age, marque, genre : ok

23/02

* voir bug indentation + indentation auto a la save : auto ok, 
* faire bouton pec next
* faire ancre maintien 


09/03
Refaire les relations genre, age -> article : ok
ajouter slug dans genre && age : ok

23/03
afficher profil et deco quand user co : ok



23/04
Supprimer les dossier dans le repertoire image,  : ok
faire 3 dossier : article, slider, logo : ok
fixture:  faire comme pour les images slider : ok


18/05
ne plus afficher la liste search a la sortie du focus

25/05
mettre a jour les titres des marques : ok
mettre a jour les titres des pages : ok
déplacer le bloc histoire dans le footer et supprimer du footer les blocs rayon et marque : ok