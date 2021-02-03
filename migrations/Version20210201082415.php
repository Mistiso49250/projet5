<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201082415 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_principal (id INT AUTO_INCREMENT NOT NULL, pour_bebe VARCHAR(255) DEFAULT NULL, jeux_jouets VARCHAR(255) DEFAULT NULL, mobiliers_decorations VARCHAR(255) DEFAULT NULL, accessoires_textiles VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD marque_id INT NOT NULL, ADD tva_id INT NOT NULL, ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('CREATE INDEX IDX_23A0E664827B9B2 ON article (marque_id)');
        $this->addSql('CREATE INDEX IDX_23A0E664D79775F ON article (tva_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_principal');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664827B9B2');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D79775F');
        $this->addSql('DROP INDEX IDX_23A0E664827B9B2 ON article');
        $this->addSql('DROP INDEX IDX_23A0E664D79775F ON article');
        $this->addSql('ALTER TABLE article DROP marque_id, DROP tva_id, DROP relation');
    }
}
