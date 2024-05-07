<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506233952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F79F37AE5');
        $this->addSql('DROP INDEX IDX_A60C9F1F79F37AE5 ON livraison');
        $this->addSql('ALTER TABLE livraison CHANGE id_user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1FA76ED395 ON livraison (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FA76ED395');
        $this->addSql('DROP INDEX IDX_A60C9F1FA76ED395 ON livraison');
        $this->addSql('ALTER TABLE livraison CHANGE user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1F79F37AE5 ON livraison (id_user_id)');
    }
}
