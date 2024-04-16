<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416012528 extends AbstractMigration
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
        $this->addSql('ALTER TABLE facture CHANGE id_livraison_id id_livraison INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641026392338 FOREIGN KEY (id_livraison) REFERENCES livraison (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE86641026392338 ON facture (id_livraison)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641026392338');
        $this->addSql('DROP INDEX UNIQ_FE86641026392338 ON facture');
        $this->addSql('ALTER TABLE facture CHANGE id_livraison id_livraison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410AD958E57 FOREIGN KEY (id_livraison_id) REFERENCES livraison (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410AD958E57 ON facture (id_livraison_id)');
    }
}
