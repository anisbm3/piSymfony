<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240504232043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, prod_name VARCHAR(255) NOT NULL, quantity INT NOT NULL, price INT NOT NULL, date DATE NOT NULL, panier_id INT NOT NULL, INDEX IDX_24CC0DF29D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, stock INT NOT NULL, category VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prix INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF29D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE utilisateurs CHANGE cin cin INT NOT NULL, CHANGE age age INT NOT NULL, CHANGE num_tel num_tel INT NOT NULL, CHANGE picture_url picture_url VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF29D86650F');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produits');
        $this->addSql('ALTER TABLE utilisateurs CHANGE cin cin INT DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE num_tel num_tel INT DEFAULT NULL, CHANGE picture_url picture_url VARCHAR(2000) DEFAULT NULL');
    }
}
