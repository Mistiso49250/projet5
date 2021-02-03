<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210202105458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_secondaire ADD categorie_principal_id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie_secondaire ADD CONSTRAINT FK_EF5292333E4B366C FOREIGN KEY (categorie_principal_id) REFERENCES categorie_principal (id)');
        $this->addSql('CREATE INDEX IDX_EF5292333E4B366C ON categorie_secondaire (categorie_principal_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_secondaire DROP FOREIGN KEY FK_EF5292333E4B366C');
        $this->addSql('DROP INDEX IDX_EF5292333E4B366C ON categorie_secondaire');
        $this->addSql('ALTER TABLE categorie_secondaire DROP categorie_principal_id');
    }
}
