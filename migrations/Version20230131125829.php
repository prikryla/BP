<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131125829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE players ADD postal_code VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE players ADD city VARCHAR(255) NOT NULL');
        $this->addSql('COMMENT ON COLUMN players.postal_code IS \'Postal code\'');
        $this->addSql('COMMENT ON COLUMN players.city IS \'City\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE players DROP postal_code');
        $this->addSql('ALTER TABLE players DROP city');
    }
}
