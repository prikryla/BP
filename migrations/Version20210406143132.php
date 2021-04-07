<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406143132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE seq_attendance_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seq_cars_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seq_category_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seq_matches_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seq_nomination_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seq_player_statistics_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seq_user_id INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE attendance (id INT NOT NULL, user_id INT NOT NULL, attendance_check BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6DE30D91A76ED395 ON attendance (user_id)');
        $this->addSql('COMMENT ON COLUMN attendance.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN attendance.user_id IS \'User_id\'');
        $this->addSql('COMMENT ON COLUMN attendance.attendance_check IS \'Attendance_check\'');
        $this->addSql('CREATE TABLE cars (id INT NOT NULL, car_name VARCHAR(255) NOT NULL, spz VARCHAR(255) NOT NULL, number_of_seats INT NOT NULL, driver_first_name VARCHAR(255) NOT NULL, driver_last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN cars.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN cars.car_name IS \'Car_name\'');
        $this->addSql('COMMENT ON COLUMN cars.spz IS \'Spz\'');
        $this->addSql('COMMENT ON COLUMN cars.number_of_seats IS \'Number_of_seats\'');
        $this->addSql('COMMENT ON COLUMN cars.driver_first_name IS \'Driver_first_name\'');
        $this->addSql('COMMENT ON COLUMN cars.driver_last_name IS \'Driver_last_name\'');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN category.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN category.name IS \'Name\'');
        $this->addSql('CREATE TABLE matches (id INT NOT NULL, nomination_id INT NOT NULL, home_team VARCHAR(255) NOT NULL, away_team VARCHAR(255) NOT NULL, match_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, venue VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, match_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_62615BAF1B2BBA7 ON matches (nomination_id)');
        $this->addSql('COMMENT ON COLUMN matches.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN matches.nomination_id IS \'Nomination_id\'');
        $this->addSql('COMMENT ON COLUMN matches.home_team IS \'Home_team\'');
        $this->addSql('COMMENT ON COLUMN matches.away_team IS \'Away_team\'');
        $this->addSql('COMMENT ON COLUMN matches.match_time IS \'Match_time\'');
        $this->addSql('COMMENT ON COLUMN matches.address IS \'Address\'');
        $this->addSql('COMMENT ON COLUMN matches.city IS \'City\'');
        $this->addSql('COMMENT ON COLUMN matches.venue IS \'Venue\'');
        $this->addSql('COMMENT ON COLUMN matches.postal_code IS \'postal_code\'');
        $this->addSql('COMMENT ON COLUMN matches.match_date IS \'match_date\'');
        $this->addSql('CREATE TABLE nomination (id INT NOT NULL, user_id INT NOT NULL, matches_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_87266218A76ED395 ON nomination (user_id)');
        $this->addSql('CREATE INDEX IDX_872662184B30DD19 ON nomination (matches_id)');
        $this->addSql('COMMENT ON COLUMN nomination.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN nomination.user_id IS \'User_id\'');
        $this->addSql('COMMENT ON COLUMN nomination.matches_id IS \'Matches_id\'');
        $this->addSql('CREATE TABLE player_statistics (id INT NOT NULL, user_id INT NOT NULL, matches_id INT NOT NULL, category_id INT NOT NULL, successful_ft INT NOT NULL, unsuccessful_ft INT NOT NULL, two_points INT NOT NULL, three_points INT NOT NULL, fouls INT NOT NULL, points INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BD760F1FA76ED395 ON player_statistics (user_id)');
        $this->addSql('CREATE INDEX IDX_BD760F1F4B30DD19 ON player_statistics (matches_id)');
        $this->addSql('CREATE INDEX IDX_BD760F1F12469DE2 ON player_statistics (category_id)');
        $this->addSql('COMMENT ON COLUMN player_statistics.id IS \'ID\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.user_id IS \'User_id\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.matches_id IS \'Matches_id\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.category_id IS \'Category_id\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.successful_ft IS \'Successful_ft\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.unsuccessful_ft IS \'Unsuccessful_ft\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.two_points IS \'Two_points\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.three_points IS \'Three_points\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.fouls IS \'Fouls\'');
        $this->addSql('COMMENT ON COLUMN player_statistics.points IS \'Points\'');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, nomination_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, salt VARCHAR(255) DEFAULT \'tmpSolution\' NOT NULL, address VARCHAR(255) NOT NULL, City VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, school VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, fines INT NOT NULL, dress_number INT NOT NULL, auth_role VARCHAR(255) NOT NULL, phone_number_player VARCHAR(255) DEFAULT NULL, phone_number_mother VARCHAR(255) DEFAULT NULL, phone_number_father VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D93D649F1B2BBA7 ON "user" (nomination_id)');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'Id\'');
        $this->addSql('COMMENT ON COLUMN "user".nomination_id IS \'Nomination_id\'');
        $this->addSql('COMMENT ON COLUMN "user".first_name IS \'First_name\'');
        $this->addSql('COMMENT ON COLUMN "user".last_name IS \'Last_name\'');
        $this->addSql('COMMENT ON COLUMN "user".email IS \'Email\'');
        $this->addSql('COMMENT ON COLUMN "user".username IS \'Username\'');
        $this->addSql('COMMENT ON COLUMN "user".password IS \'Password\'');
        $this->addSql('COMMENT ON COLUMN "user".address IS \'Address\'');
        $this->addSql('COMMENT ON COLUMN "user".City IS \'City\'');
        $this->addSql('COMMENT ON COLUMN "user".postal_code IS \'Postal_code\'');
        $this->addSql('COMMENT ON COLUMN "user".school IS \'School\'');
        $this->addSql('COMMENT ON COLUMN "user".date_of_birth IS \'Date_of_birth\'');
        $this->addSql('COMMENT ON COLUMN "user".fines IS \'Fines\'');
        $this->addSql('COMMENT ON COLUMN "user".dress_number IS \'Dress_number\'');
        $this->addSql('COMMENT ON COLUMN "user".auth_role IS \'Auth_role\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_player IS \'Phone_number_player\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_mother IS \'Phone_number_mother\'');
        $this->addSql('COMMENT ON COLUMN "user".phone_number_father IS \'Phone_number_father\'');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT FK_6DE30D91A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE matches ADD CONSTRAINT FK_62615BAF1B2BBA7 FOREIGN KEY (nomination_id) REFERENCES nomination (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT FK_87266218A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT FK_872662184B30DD19 FOREIGN KEY (matches_id) REFERENCES matches (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT FK_BD760F1FA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT FK_BD760F1F4B30DD19 FOREIGN KEY (matches_id) REFERENCES matches (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT FK_BD760F1F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649F1B2BBA7 FOREIGN KEY (nomination_id) REFERENCES nomination (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT FK_BD760F1F12469DE2');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT FK_872662184B30DD19');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT FK_BD760F1F4B30DD19');
        $this->addSql('ALTER TABLE matches DROP CONSTRAINT FK_62615BAF1B2BBA7');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649F1B2BBA7');
        $this->addSql('ALTER TABLE attendance DROP CONSTRAINT FK_6DE30D91A76ED395');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT FK_87266218A76ED395');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT FK_BD760F1FA76ED395');
        $this->addSql('DROP SEQUENCE seq_attendance_id CASCADE');
        $this->addSql('DROP SEQUENCE seq_cars_id CASCADE');
        $this->addSql('DROP SEQUENCE seq_category_id CASCADE');
        $this->addSql('DROP SEQUENCE seq_matches_id CASCADE');
        $this->addSql('DROP SEQUENCE seq_nomination_id CASCADE');
        $this->addSql('DROP SEQUENCE seq_player_statistics_id CASCADE');
        $this->addSql('DROP SEQUENCE seq_user_id CASCADE');
        $this->addSql('DROP TABLE attendance');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE matches');
        $this->addSql('DROP TABLE nomination');
        $this->addSql('DROP TABLE player_statistics');
        $this->addSql('DROP TABLE "user"');
    }
}
