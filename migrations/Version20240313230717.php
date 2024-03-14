<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313230717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emarger ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emarger ADD CONSTRAINT FK_7EF5C405FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_7EF5C405FB88E14F ON emarger (utilisateur_id)');
        $this->addSql('ALTER TABLE inscrire CHANGE date_sortie date_sortie DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE `option` CHANGE nom_option nom_option VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion CHANGE date_debut date_debut DATE DEFAULT NULL, CHANGE date_fin date_fin DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE session CHANGE intitule intitule VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emarger DROP FOREIGN KEY FK_7EF5C405FB88E14F');
        $this->addSql('DROP INDEX IDX_7EF5C405FB88E14F ON emarger');
        $this->addSql('ALTER TABLE emarger DROP utilisateur_id');
        $this->addSql('ALTER TABLE inscrire CHANGE date_sortie date_sortie DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE `option` CHANGE nom_option nom_option VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE promotion CHANGE date_debut date_debut DATE DEFAULT \'NULL\', CHANGE date_fin date_fin DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE session CHANGE intitule intitule VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
