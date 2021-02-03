* symfony serve => lance le serveur

Crer un controller
* console make:controller Nom du controller 

Fixtures
* composer require --dev orm-fixtures  => installe les fixtures dans symfony
* symfony console d:fixtures:load => chanrge les fixtures dans la bdd

Créer une bdd
* symfony console doctrine:database:create

Bdd 
* symfony console m:e nom de l entité => (make entity) crée la table
* symfony console m:mig => (make migration) enregistre les modifications
* symfony console d:m:m => (doctrine migration migrate) transfert dans la bdd

Relation table
* symfony console m:e Article
* property : tva
* field type => ManyToOne ......
* class : Tva
* inverseBy : articles
* null ou pas

