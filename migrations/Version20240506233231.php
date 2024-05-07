<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506233231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, id_livraison INT DEFAULT NULL, remise INT NOT NULL, montant_avec_remise DOUBLE PRECISION NOT NULL, date_facture DATE NOT NULL, UNIQUE INDEX UNIQ_FE86641026392338 (id_livraison), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, nom_prenom_client VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_A60C9F1FF77D927C (panier_id), INDEX IDX_A60C9F1F79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641026392338 FOREIGN KEY (id_livraison) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641026392338');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FF77D927C');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F79F37AE5');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE livraison');
    }
}
