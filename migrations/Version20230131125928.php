<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131125928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE players (id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, school VARCHAR(255) DEFAULT NULL, birth_number VARCHAR(255) NOT NULL, phone_mother VARCHAR(255) DEFAULT NULL, phone_father VARCHAR(255) DEFAULT NULL, phone_player VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, start_date VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN players.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN players.first_name IS \'First_name\'');
        $this->addSql('COMMENT ON COLUMN players.last_name IS \'Last_name\'');
        $this->addSql('COMMENT ON COLUMN players.postal_code IS \'Postal code\'');
        $this->addSql('COMMENT ON COLUMN players.city IS \'City\'');
        $this->addSql('COMMENT ON COLUMN players.address IS \'Address\'');
        $this->addSql('COMMENT ON COLUMN players.school IS \'School\'');
        $this->addSql('COMMENT ON COLUMN players.birth_number IS \'birth_number\'');
        $this->addSql('COMMENT ON COLUMN players.phone_mother IS \'phone_mother\'');
        $this->addSql('COMMENT ON COLUMN players.phone_father IS \'phone_father\'');
        $this->addSql('COMMENT ON COLUMN players.phone_player IS \'phone_player\'');
        $this->addSql('COMMENT ON COLUMN players.email IS \'email\'');
        $this->addSql('COMMENT ON COLUMN players.start_date IS \'start_date\'');
        $this->addSql('COMMENT ON COLUMN players.category IS \'category\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE players');
    }
}
