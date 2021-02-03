<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210202102343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP relation');
        $this->addSql('ALTER TABLE categorie_principal ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categorie_secondaire ADD categorie_secondaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_secondaire ADD CONSTRAINT FK_EF529233867E4656 FOREIGN KEY (categorie_secondaire_id) REFERENCES categorie_principal (id)');
        $this->addSql('CREATE INDEX IDX_EF529233867E4656 ON categorie_secondaire (categorie_secondaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD relation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie_principal DROP relation');
        $this->addSql('ALTER TABLE categorie_secondaire DROP FOREIGN KEY FK_EF529233867E4656');
        $this->addSql('DROP INDEX IDX_EF529233867E4656 ON categorie_secondaire');
        $this->addSql('ALTER TABLE categorie_secondaire DROP categorie_secondaire_id');
    }
}
