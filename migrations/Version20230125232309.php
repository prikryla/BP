<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125232309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE players ADD category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE players DROP categorz');
        $this->addSql('COMMENT ON COLUMN players.category IS \'category\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE players ADD categorz VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE players DROP category');
        $this->addSql('COMMENT ON COLUMN players.categorz IS \'categorz\'');
    }
}
