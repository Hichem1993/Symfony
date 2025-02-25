<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225111836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD COLUMN description CLOB NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__articles AS SELECT id, titre, url_img, duree, auteur, dt_creation FROM articles');
        $this->addSql('DROP TABLE articles');
        $this->addSql('CREATE TABLE articles (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, url_img VARCHAR(255) NOT NULL, duree VARCHAR(255) DEFAULT \'1\' NOT NULL, auteur VARCHAR(255) NOT NULL, dt_creation DATETIME NOT NULL)');
        $this->addSql('INSERT INTO articles (id, titre, url_img, duree, auteur, dt_creation) SELECT id, titre, url_img, duree, auteur, dt_creation FROM __temp__articles');
        $this->addSql('DROP TABLE __temp__articles');
    }
}
