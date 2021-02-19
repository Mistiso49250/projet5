<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219131250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, marque_id INT NOT NULL, tva_id INT NOT NULL, titre VARCHAR(255) NOT NULL, extrait VARCHAR(255) NOT NULL, detail LONGTEXT NOT NULL, contenu LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, prix_ttc NUMERIC(10, 2) NOT NULL, new TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, selection TINYINT(1) NOT NULL, INDEX IDX_23A0E66BCF5E72D (categorie_id), INDEX IDX_23A0E664827B9B2 (marque_id), INDEX IDX_23A0E664D79775F (tva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, code VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_categorie_secondaire (categorie_id INT NOT NULL, categorie_secondaire_id INT NOT NULL, INDEX IDX_ABC1A0C7BCF5E72D (categorie_id), INDEX IDX_ABC1A0C7867E4656 (categorie_secondaire_id), PRIMARY KEY(categorie_id, categorie_secondaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_principal (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, code VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_secondaire (id INT AUTO_INCREMENT NOT NULL, categorie_principal_id INT NOT NULL, description LONGTEXT NOT NULL, code VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_EF5292333E4B366C (categorie_principal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, garã§on VARCHAR(255) NOT NULL, fille VARCHAR(255) NOT NULL, mixte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, valeur_tva NUMERIC(10, 2) NOT NULL, slug VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE categorie_categorie_secondaire ADD CONSTRAINT FK_ABC1A0C7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_categorie_secondaire ADD CONSTRAINT FK_ABC1A0C7867E4656 FOREIGN KEY (categorie_secondaire_id) REFERENCES categorie_secondaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_secondaire ADD CONSTRAINT FK_EF5292333E4B366C FOREIGN KEY (categorie_principal_id) REFERENCES categorie_principal (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66BCF5E72D');
        $this->addSql('ALTER TABLE categorie_categorie_secondaire DROP FOREIGN KEY FK_ABC1A0C7BCF5E72D');
        $this->addSql('ALTER TABLE categorie_secondaire DROP FOREIGN KEY FK_EF5292333E4B366C');
        $this->addSql('ALTER TABLE categorie_categorie_secondaire DROP FOREIGN KEY FK_ABC1A0C7867E4656');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664827B9B2');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D79775F');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_categorie_secondaire');
        $this->addSql('DROP TABLE categorie_principal');
        $this->addSql('DROP TABLE categorie_secondaire');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE slider');
        $this->addSql('DROP TABLE tva');
        $this->addSql('DROP TABLE user');
    }
}
