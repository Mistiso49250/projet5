<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203092034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_categorie_secondaire (categorie_id INT NOT NULL, categorie_secondaire_id INT NOT NULL, INDEX IDX_ABC1A0C7BCF5E72D (categorie_id), INDEX IDX_ABC1A0C7867E4656 (categorie_secondaire_id), PRIMARY KEY(categorie_id, categorie_secondaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_categorie_secondaire ADD CONSTRAINT FK_ABC1A0C7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_categorie_secondaire ADD CONSTRAINT FK_ABC1A0C7867E4656 FOREIGN KEY (categorie_secondaire_id) REFERENCES categorie_secondaire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_categorie_secondaire');
    }
}
