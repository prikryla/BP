<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422165424 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD nomination_id INT DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN users.nomination_id IS \'ID\'');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F1B2BBA7 FOREIGN KEY (nomination_id) REFERENCES nomination (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1483A5E9F1B2BBA7 ON users (nomination_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9F1B2BBA7');
        $this->addSql('DROP INDEX IDX_1483A5E9F1B2BBA7');
        $this->addSql('ALTER TABLE users DROP nomination_id');
    }
}
