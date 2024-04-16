<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240325014729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, debat_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, block VARCHAR(255) NOT NULL, INDEX IDX_67F068BC743EC92F (debat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE debat (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, sujet_debat VARCHAR(255) NOT NULL, description_debat VARCHAR(255) NOT NULL, nom_anime VARCHAR(255) NOT NULL, note_anime VARCHAR(255) NOT NULL, INDEX IDX_C6B5D12CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC743EC92F FOREIGN KEY (debat_id) REFERENCES debat (id)');
        $this->addSql('ALTER TABLE debat ADD CONSTRAINT FK_C6B5D12CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC743EC92F');
        $this->addSql('ALTER TABLE debat DROP FOREIGN KEY FK_C6B5D12CA76ED395');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE debat');
        $this->addSql('DROP TABLE user');
    }
}
