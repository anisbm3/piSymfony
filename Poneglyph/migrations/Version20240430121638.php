<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430121638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cosplay CHANGE datecreation datecreation DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE pseudo pseudo VARCHAR(255) DEFAULT NULL, CHANGE cin cin INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE num_tel num_tel INT DEFAULT NULL, CHANGE is_verified is_verified SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cosplay CHANGE datecreation datecreation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE pseudo pseudo VARCHAR(255) NOT NULL, CHANGE cin cin INT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE age age INT NOT NULL, CHANGE num_tel num_tel INT NOT NULL, CHANGE is_verified is_verified SMALLINT NOT NULL');
    }
}
