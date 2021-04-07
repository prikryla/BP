<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407161842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT fk_bd760f1fa76ed395');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT fk_87266218a76ed395');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d64967b3b43d');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, nomination_id INT DEFAULT NULL, users_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, salt VARCHAR(255) DEFAULT \'tmpSolution\' NOT NULL, address VARCHAR(255) DEFAULT NULL, City VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, school VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, fines INT DEFAULT NULL, dress_number INT DEFAULT NULL, auth_role VARCHAR(255) NOT NULL, phone_number_player VARCHAR(255) DEFAULT NULL, phone_number_mother VARCHAR(255) DEFAULT NULL, phone_number_father VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1483A5E9F1B2BBA7 ON users (nomination_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E967B3B43D ON users (users_id)');
        $this->addSql('COMMENT ON COLUMN users.id IS \'Id\'');
        $this->addSql('COMMENT ON COLUMN users.nomination_id IS \'Nomination id\'');
        $this->addSql('COMMENT ON COLUMN users.users_id IS \'Id\'');
        $this->addSql('COMMENT ON COLUMN users.first_name IS \'First name\'');
        $this->addSql('COMMENT ON COLUMN users.last_name IS \'Last name\'');
        $this->addSql('COMMENT ON COLUMN users.email IS \'Email\'');
        $this->addSql('COMMENT ON COLUMN users.username IS \'Username\'');
        $this->addSql('COMMENT ON COLUMN users.password IS \'Password\'');
        $this->addSql('COMMENT ON COLUMN users.address IS \'Address\'');
        $this->addSql('COMMENT ON COLUMN users.City IS \'City\'');
        $this->addSql('COMMENT ON COLUMN users.postal_code IS \'Postal code\'');
        $this->addSql('COMMENT ON COLUMN users.school IS \'School\'');
        $this->addSql('COMMENT ON COLUMN users.date_of_birth IS \'Date of birth\'');
        $this->addSql('COMMENT ON COLUMN users.fines IS \'Fines\'');
        $this->addSql('COMMENT ON COLUMN users.dress_number IS \'Dress number\'');
        $this->addSql('COMMENT ON COLUMN users.auth_role IS \'Auth role\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_player IS \'Phone number player\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_mother IS \'Phone number mother\'');
        $this->addSql('COMMENT ON COLUMN users.phone_number_father IS \'Phone number father\'');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F1B2BBA7 FOREIGN KEY (nomination_id) REFERENCES nomination (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E967B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('ALTER TABLE attendance DROP CONSTRAINT FK_6DE30D91A76ED395');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT FK_6DE30D91A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT FK_87266218A76ED395');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT FK_87266218A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT FK_BD760F1FA76ED395');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT FK_BD760F1FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT FK_87266218A76ED395');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT FK_BD760F1FA76ED395');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E967B3B43D');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, nomination_id INT DEFAULT NULL, users_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, salt VARCHAR(255) DEFAULT \'tmpSolution\' NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, school VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, fines INT DEFAULT NULL, dress_number INT DEFAULT NULL, auth_role VARCHAR(255) NOT NULL, phone_number_player VARCHAR(255) DEFAULT NULL, phone_number_mother VARCHAR(255) DEFAULT NULL, phone_number_father VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_8d93d649f1b2bba7 ON "user" (nomination_id)');
        $this->addSql('CREATE INDEX idx_8d93d64967b3b43d ON "user" (users_id)');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'Id\'');
        $this->addSql('COMMENT ON COLUMN "user".nomination_id IS \'Nomination id\'');
        $this->addSql('COMMENT ON COLUMN "user".users_id IS \'Id\'');
        $this->addSql('COMMENT ON COLUMN "user".first_name IS \'First name\'');
        $this->addSql('COMMENT ON COLUMN "user".last_name IS \'Last name\'');
        $this->addSql('COMMENT ON COLUMN "user".email IS \'Email\'');
        $this->addSql('COMMENT ON COLUMN "user".username IS \'Username\'');
        $this->addSql('COMMENT ON COLUMN "user".password IS \'Password\'');
        $this->addSql('COMMENT ON COLUMN "user".address IS \'Address\'');
        $this->addSql('COMMENT ON COLUMN "user".city IS \'City\'');
        $this->addSql('COMMENT ON COLUMN "user".postal_code IS \'Postal code\'');
        $this->addSql('COMMENT ON COLUMN "user".school IS \'School\'');
        $this->addSql('COMMENT ON COLUMN "user".date_of_birth IS \'Date of birth\'');
        $this->addSql('COMMENT ON COLUMN "user".fines IS \'Fines\'');
        $this->addSql('COMMENT ON COLUMN "user".dress_number IS \'Dress number\'');
        $this->addSql('COMMENT ON COLUMN "user".auth_role IS \'Auth role\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_player IS \'Phone number player\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_mother IS \'Phone number mother\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_father IS \'Phone number father\'');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d649f1b2bba7 FOREIGN KEY (nomination_id) REFERENCES nomination (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d64967b3b43d FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE attendance DROP CONSTRAINT fk_6de30d91a76ed395');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT fk_6de30d91a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT fk_bd760f1fa76ed395');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT fk_bd760f1fa76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT fk_87266218a76ed395');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT fk_87266218a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
