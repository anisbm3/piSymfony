<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416014803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410AD958E57');
        $this->addSql('DROP INDEX UNIQ_FE866410AD958E57 ON facture');
        $this->addSql('ALTER TABLE facture DROP id_livraison_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD id_livraison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410AD958E57 FOREIGN KEY (id_livraison_id) REFERENCES livraison (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410AD958E57 ON facture (id_livraison_id)');
    }
}
