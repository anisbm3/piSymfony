<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506214504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cosplay (id INT AUTO_INCREMENT NOT NULL, idmateriaux_id INT DEFAULT NULL, user_id INT DEFAULT NULL, nomcp VARCHAR(300) NOT NULL, descriptioncp VARCHAR(300) NOT NULL, personnage VARCHAR(255) NOT NULL, imagecp VARCHAR(300) NOT NULL, datecreation DATETIME DEFAULT NULL, nomma VARCHAR(255) DEFAULT NULL, like_count INT NOT NULL, INDEX IDX_1F2FAF30C6C1C4BB (idmateriaux_id), INDEX IDX_1F2FAF30A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiaux (id INT AUTO_INCREMENT NOT NULL, nomma VARCHAR(255) NOT NULL, typema VARCHAR(255) NOT NULL, disponibilite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cosplay ADD CONSTRAINT FK_1F2FAF30C6C1C4BB FOREIGN KEY (idmateriaux_id) REFERENCES materiaux (id)');
        $this->addSql('ALTER TABLE cosplay ADD CONSTRAINT FK_1F2FAF30A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cosplay DROP FOREIGN KEY FK_1F2FAF30C6C1C4BB');
        $this->addSql('ALTER TABLE cosplay DROP FOREIGN KEY FK_1F2FAF30A76ED395');
        $this->addSql('DROP TABLE cosplay');
        $this->addSql('DROP TABLE materiaux');
    }
}
