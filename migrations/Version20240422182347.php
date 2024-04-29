<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422182347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, debat_id_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, block VARCHAR(255) NOT NULL, INDEX IDX_67F068BC8E09B535 (debat_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cosplay (id INT AUTO_INCREMENT NOT NULL, idmateriaux_id INT DEFAULT NULL, userid_id INT DEFAULT NULL, nomcp VARCHAR(300) NOT NULL, descriptioncp VARCHAR(300) NOT NULL, personnage VARCHAR(255) NOT NULL, imagecp VARCHAR(300) NOT NULL, datecreation DATETIME NOT NULL, nomma VARCHAR(255) NOT NULL, INDEX IDX_1F2FAF30C6C1C4BB (idmateriaux_id), INDEX IDX_1F2FAF3058E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE debat (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, sujet_debat VARCHAR(255) NOT NULL, description_debat VARCHAR(255) NOT NULL, nom_anime VARCHAR(255) NOT NULL, note_anime VARCHAR(255) NOT NULL, INDEX IDX_C6B5D12C9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom_event VARCHAR(255) NOT NULL, description_event VARCHAR(255) NOT NULL, lieu_event VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, nb_place INT NOT NULL, date_event DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, id_livraison_id INT DEFAULT NULL, panier_id_id INT DEFAULT NULL, remise INT NOT NULL, montant_avec_remise DOUBLE PRECISION NOT NULL, date_facture DATE NOT NULL, UNIQUE INDEX UNIQ_FE866410AD958E57 (id_livraison_id), UNIQUE INDEX UNIQ_FE8664105669B1EA (panier_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, panier_id_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, nom_prenom_client VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, quantity INT NOT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_A60C9F1F5669B1EA (panier_id_id), INDEX IDX_A60C9F1F79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiaux (id INT AUTO_INCREMENT NOT NULL, nomma VARCHAR(255) DEFAULT NULL, typema VARCHAR(255) NOT NULL, disponibilite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, prod_name VARCHAR(255) NOT NULL, quantity INT NOT NULL, price INT NOT NULL, date DATE NOT NULL, panier_id INT NOT NULL, INDEX IDX_24CC0DF29D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, stock INT NOT NULL, category VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prix INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, evenement_id INT DEFAULT NULL, nom_reservation VARCHAR(255) NOT NULL, nb_place INT NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C84955FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, cin INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, num_tel INT NOT NULL, email VARCHAR(255) NOT NULL, is_verified SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8E09B535 FOREIGN KEY (debat_id_id) REFERENCES debat (id)');
        $this->addSql('ALTER TABLE cosplay ADD CONSTRAINT FK_1F2FAF30C6C1C4BB FOREIGN KEY (idmateriaux_id) REFERENCES materiaux (id)');
        $this->addSql('ALTER TABLE cosplay ADD CONSTRAINT FK_1F2FAF3058E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE debat ADD CONSTRAINT FK_C6B5D12C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410AD958E57 FOREIGN KEY (id_livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664105669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF29D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8E09B535');
        $this->addSql('ALTER TABLE cosplay DROP FOREIGN KEY FK_1F2FAF30C6C1C4BB');
        $this->addSql('ALTER TABLE cosplay DROP FOREIGN KEY FK_1F2FAF3058E0A285');
        $this->addSql('ALTER TABLE debat DROP FOREIGN KEY FK_C6B5D12C9D86650F');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410AD958E57');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664105669B1EA');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5669B1EA');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F79F37AE5');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF29D86650F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FD02F13');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE cosplay');
        $this->addSql('DROP TABLE debat');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE materiaux');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
