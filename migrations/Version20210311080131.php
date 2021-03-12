<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311080131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article_genre');
        $this->addSql('ALTER TABLE age ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE genre ADD article_id INT NOT NULL, ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F87294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_835033F87294869C ON genre (article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_genre (article_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_F4E741E97294869C (article_id), INDEX IDX_F4E741E94296D31F (genre_id), PRIMARY KEY(article_id, genre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_genre ADD CONSTRAINT FK_F4E741E94296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_genre ADD CONSTRAINT FK_F4E741E97294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE age DROP slug');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F87294869C');
        $this->addSql('DROP INDEX IDX_835033F87294869C ON genre');
        $this->addSql('ALTER TABLE genre DROP article_id, DROP slug');
    }
}
