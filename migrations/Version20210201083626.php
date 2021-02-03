<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201083626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD album_photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categorie_principal ADD pour_bebe VARCHAR(255) DEFAULT NULL, ADD jeux_jouets VARCHAR(255) DEFAULT NULL, ADD mobiliers_decorations VARCHAR(255) DEFAULT NULL, ADD accessoires_textiles VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT NOT NULL, ADD code VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categorie_secondaire ADD pour_bebe VARCHAR(255) NOT NULL, ADD eveil VARCHAR(255) NOT NULL, ADD pour_enfants VARCHAR(255) NOT NULL, ADD decoration VARCHAR(255) NOT NULL, ADD mobilier VARCHAR(255) NOT NULL, ADD bagagerie VARCHAR(255) NOT NULL, ADD textile VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL, ADD code VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP album_photo');
        $this->addSql('ALTER TABLE categorie_principal DROP pour_bebe, DROP jeux_jouets, DROP mobiliers_decorations, DROP accessoires_textiles, DROP description, DROP code, DROP slug');
        $this->addSql('ALTER TABLE categorie_secondaire DROP pour_bebe, DROP eveil, DROP pour_enfants, DROP decoration, DROP mobilier, DROP bagagerie, DROP textile, DROP description, DROP code, DROP slug');
    }
}
