<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309083626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age ADD article_id INT NOT NULL');
        $this->addSql('ALTER TABLE age ADD CONSTRAINT FK_A13010B27294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_A13010B27294869C ON age (article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE age DROP FOREIGN KEY FK_A13010B27294869C');
        $this->addSql('DROP INDEX IDX_A13010B27294869C ON age');
        $this->addSql('ALTER TABLE age DROP article_id');
    }
}
