<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220103224401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ALTER date_of_birth TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER date_of_birth DROP DEFAULT');
        $this->addSql('ALTER TABLE users ALTER date_of_birth DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users ALTER date_of_birth TYPE DATE');
        $this->addSql('ALTER TABLE users ALTER date_of_birth DROP DEFAULT');
        $this->addSql('ALTER TABLE users ALTER date_of_birth SET NOT NULL');
    }
}
