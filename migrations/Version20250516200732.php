<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250516200732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, poste VARCHAR(50) NOT NULL, date_embauche DATETIME DEFAULT NULL, salaire DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE employe_specialite (employe_id INT NOT NULL, specialite_id INT NOT NULL, INDEX IDX_651F26061B65292 (employe_id), INDEX IDX_651F26062195E0F0 (specialite_id), PRIMARY KEY(employe_id, specialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE piece (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, reference VARCHAR(255) NOT NULL, quantite DOUBLE PRECISION DEFAULT NULL, prix_achat DOUBLE PRECISION NOT NULL, prix_vente DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reparation (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, description LONGTEXT NOT NULL, date_reparation DATETIME NOT NULL, status VARCHAR(50) NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, INDEX IDX_8FDF219D4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reparation_has_employe (reparation_id INT NOT NULL, employe_id INT NOT NULL, INDEX IDX_63DCC12397934BA (reparation_id), INDEX IDX_63DCC1231B65292 (employe_id), PRIMARY KEY(reparation_id, employe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reparation_employe (id INT AUTO_INCREMENT NOT NULL, reparation_id INT DEFAULT NULL, employe_id INT DEFAULT NULL, INDEX IDX_81DD287597934BA (reparation_id), INDEX IDX_81DD28751B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE tache_reparation (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, reparation_id INT NOT NULL, description VARCHAR(255) NOT NULL, status VARCHAR(50) NOT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, INDEX IDX_8F87F2101B65292 (employe_id), INDEX IDX_8F87F21097934BA (reparation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, marque VARCHAR(255) DEFAULT NULL, modele VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(100) NOT NULL, annee VARCHAR(10) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, INDEX IDX_292FFF1D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employe_specialite ADD CONSTRAINT FK_651F26061B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employe_specialite ADD CONSTRAINT FK_651F26062195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation ADD CONSTRAINT FK_8FDF219D4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_has_employe ADD CONSTRAINT FK_63DCC12397934BA FOREIGN KEY (reparation_id) REFERENCES reparation (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_has_employe ADD CONSTRAINT FK_63DCC1231B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_employe ADD CONSTRAINT FK_81DD287597934BA FOREIGN KEY (reparation_id) REFERENCES reparation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_employe ADD CONSTRAINT FK_81DD28751B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tache_reparation ADD CONSTRAINT FK_8F87F2101B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tache_reparation ADD CONSTRAINT FK_8F87F21097934BA FOREIGN KEY (reparation_id) REFERENCES reparation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE employe_specialite DROP FOREIGN KEY FK_651F26061B65292
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employe_specialite DROP FOREIGN KEY FK_651F26062195E0F0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation DROP FOREIGN KEY FK_8FDF219D4A4A3511
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_has_employe DROP FOREIGN KEY FK_63DCC12397934BA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_has_employe DROP FOREIGN KEY FK_63DCC1231B65292
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_employe DROP FOREIGN KEY FK_81DD287597934BA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reparation_employe DROP FOREIGN KEY FK_81DD28751B65292
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tache_reparation DROP FOREIGN KEY FK_8F87F2101B65292
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tache_reparation DROP FOREIGN KEY FK_8F87F21097934BA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D19EB6921
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE client
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE employe
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE employe_specialite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE piece
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reparation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reparation_has_employe
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reparation_employe
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE specialite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE tache_reparation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE vehicule
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
