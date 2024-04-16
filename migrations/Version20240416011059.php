<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416011059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664105669B1EA');
        $this->addSql('DROP INDEX UNIQ_FE8664105669B1EA ON facture');
        $this->addSql('ALTER TABLE facture DROP panier_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD panier_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664105669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE8664105669B1EA ON facture (panier_id_id)');
    }
}
