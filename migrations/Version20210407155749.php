<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407155749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('COMMENT ON COLUMN "user".nomination_id IS \'Nomination id\'');
        $this->addSql('COMMENT ON COLUMN "user".first_name IS \'First name\'');
        $this->addSql('COMMENT ON COLUMN "user".last_name IS \'Last name\'');
        $this->addSql('COMMENT ON COLUMN "user".postal_code IS \'Postal code\'');
        $this->addSql('COMMENT ON COLUMN "user".date_of_birth IS \'Date of birth\'');
        $this->addSql('COMMENT ON COLUMN "user".dress_number IS \'Dress number\'');
        $this->addSql('COMMENT ON COLUMN "user".auth_role IS \'Auth role\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_player IS \'Phone number player\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_mother IS \'Phone number mother\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_father IS \'Phone number father\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('COMMENT ON COLUMN "user".nomination_id IS \'Nomination_id\'');
        $this->addSql('COMMENT ON COLUMN "user".first_name IS NULL');
        $this->addSql('COMMENT ON COLUMN "user".last_name IS \'Last_name\'');
        $this->addSql('COMMENT ON COLUMN "user".postal_code IS \'Postal_code\'');
        $this->addSql('COMMENT ON COLUMN "user".date_of_birth IS \'Date_of_birth\'');
        $this->addSql('COMMENT ON COLUMN "user".dress_number IS \'Dress_number\'');
        $this->addSql('COMMENT ON COLUMN "user".auth_role IS \'Auth_role\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_player IS \'Phone_number_player\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_mother IS \'Phone_number_mother\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_father IS \'Phone_number_father\'');
    }
}
