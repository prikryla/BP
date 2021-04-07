<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407120823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ALTER fines DROP NOT NULL');
        $this->addSql('ALTER TABLE "user" ALTER dress_number DROP NOT NULL');
        $this->addSql('COMMENT ON COLUMN "user".users_id IS \'Id\'');
        $this->addSql('COMMENT ON COLUMN "user".user_id IS \'User_id\'');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64967B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8D93D64967B3B43D ON "user" (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64967B3B43D');
        $this->addSql('DROP INDEX IDX_8D93D64967B3B43D');
        $this->addSql('ALTER TABLE "user" DROP users_id');
        $this->addSql('ALTER TABLE "user" DROP user_id');
        $this->addSql('ALTER TABLE "user" ALTER fines SET NOT NULL');
        $this->addSql('ALTER TABLE "user" ALTER dress_number SET NOT NULL');
    }
}
