<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412202851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matches ADD category_id INT DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN matches.category_id IS \'Category_id\'');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_62615BA12469DE2 ON matches (category_id)');
        $this->addSql('ALTER TABLE users ADD category_id INT DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN users.category_id IS \'Category_id\'');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1483A5E912469DE2 ON users (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE matches DROP CONSTRAINT FK_62615BA12469DE2');
        $this->addSql('DROP INDEX IDX_62615BA12469DE2');
        $this->addSql('ALTER TABLE matches DROP category_id');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E912469DE2');
        $this->addSql('DROP INDEX IDX_1483A5E912469DE2');
        $this->addSql('ALTER TABLE users DROP category_id');
    }
}
