<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240415235436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5669B1EA');
        $this->addSql('DROP INDEX UNIQ_A60C9F1F5669B1EA ON livraison');
        $this->addSql('ALTER TABLE livraison CHANGE panier_id_id panier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1FF77D927C ON livraison (panier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FF77D927C');
        $this->addSql('DROP INDEX IDX_A60C9F1FF77D927C ON livraison');
        $this->addSql('ALTER TABLE livraison CHANGE panier_id panier_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A60C9F1F5669B1EA ON livraison (panier_id_id)');
    }
}
