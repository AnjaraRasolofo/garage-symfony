<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423204703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE employe_specialite (employe_id INT NOT NULL, specialite_id INT NOT NULL, INDEX IDX_651F26061B65292 (employe_id), INDEX IDX_651F26062195E0F0 (specialite_id), PRIMARY KEY(employe_id, specialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employe_specialite ADD CONSTRAINT FK_651F26061B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE employe_specialite ADD CONSTRAINT FK_651F26062195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE
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
            DROP TABLE employe_specialite
        SQL);
    }
}
