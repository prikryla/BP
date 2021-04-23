<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210423134212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT fk_bd760f1f4b30dd19');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT fk_bd760f1f12469de2');
        $this->addSql('DROP INDEX idx_bd760f1f12469de2');
        $this->addSql('DROP INDEX idx_bd760f1f4b30dd19');
        $this->addSql('ALTER TABLE player_statistics DROP matches_id');
        $this->addSql('ALTER TABLE player_statistics DROP category_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_statistics ADD matches_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_statistics ADD category_id INT NOT NULL');
        $this->addSql('COMMENT ON COLUMN player_statistics.matches_id IS \'Matches_id\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.category_id IS \'Category_id\'');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT fk_bd760f1f4b30dd19 FOREIGN KEY (matches_id) REFERENCES matches (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT fk_bd760f1f12469de2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_bd760f1f12469de2 ON player_statistics (category_id)');
        $this->addSql('CREATE INDEX idx_bd760f1f4b30dd19 ON player_statistics (matches_id)');
    }
}
