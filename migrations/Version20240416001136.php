<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416001136 extends AbstractMigration
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
        $this->addSql('ALTER TABLE livraison DROP panier_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison ADD panier_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A60C9F1F5669B1EA ON livraison (panier_id_id)');
    }
}
