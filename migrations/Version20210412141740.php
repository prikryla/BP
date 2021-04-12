<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412141740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attendance DROP CONSTRAINT fk_6de30d91a76ed395');
        $this->addSql('DROP INDEX idx_6de30d91a76ed395');
        $this->addSql('ALTER TABLE attendance ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE attendance DROP user_id');
        $this->addSql('COMMENT ON COLUMN attendance.users_id IS \'Users_id\'');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT FK_6DE30D9167B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6DE30D9167B3B43D ON attendance (users_id)');
        $this->addSql('ALTER TABLE matches ALTER nomination_id DROP NOT NULL');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT fk_87266218a76ed395');
        $this->addSql('DROP INDEX idx_87266218a76ed395');
        $this->addSql('ALTER TABLE nomination ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE nomination DROP user_id');
        $this->addSql('COMMENT ON COLUMN nomination.users_id IS \'Users_id\'');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT FK_8726621867B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8726621867B3B43D ON nomination (users_id)');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT fk_bd760f1fa76ed395');
        $this->addSql('DROP INDEX idx_bd760f1fa76ed395');
        $this->addSql('ALTER TABLE player_statistics ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_statistics DROP user_id');
        $this->addSql('COMMENT ON COLUMN player_statistics.users_id IS \'Users_id\'');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT FK_BD760F1F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BD760F1F67B3B43D ON player_statistics (users_id)');
        $this->addSql('ALTER INDEX idx_8d93d649f1b2bba7 RENAME TO IDX_1483A5E9F1B2BBA7');
        $this->addSql('ALTER INDEX idx_8d93d64967b3b43d RENAME TO IDX_1483A5E967B3B43D');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE attendance DROP CONSTRAINT FK_6DE30D9167B3B43D');
        $this->addSql('DROP INDEX IDX_6DE30D9167B3B43D');
        $this->addSql('ALTER TABLE attendance ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE attendance DROP users_id');
        $this->addSql('COMMENT ON COLUMN attendance.user_id IS \'User_id\'');
        $this->addSql('ALTER TABLE attendance ADD CONSTRAINT fk_6de30d91a76ed395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_6de30d91a76ed395 ON attendance (user_id)');
        $this->addSql('ALTER INDEX idx_1483a5e9f1b2bba7 RENAME TO idx_8d93d649f1b2bba7');
        $this->addSql('ALTER INDEX idx_1483a5e967b3b43d RENAME TO idx_8d93d64967b3b43d');
        $this->addSql('ALTER TABLE matches ALTER nomination_id SET NOT NULL');
        $this->addSql('ALTER TABLE player_statistics DROP CONSTRAINT FK_BD760F1F67B3B43D');
        $this->addSql('DROP INDEX IDX_BD760F1F67B3B43D');
        $this->addSql('ALTER TABLE player_statistics ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_statistics DROP users_id');
        $this->addSql('COMMENT ON COLUMN player_statistics.user_id IS \'User_id\'');
        $this->addSql('ALTER TABLE player_statistics ADD CONSTRAINT fk_bd760f1fa76ed395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_bd760f1fa76ed395 ON player_statistics (user_id)');
        $this->addSql('ALTER TABLE nomination DROP CONSTRAINT FK_8726621867B3B43D');
        $this->addSql('DROP INDEX IDX_8726621867B3B43D');
        $this->addSql('ALTER TABLE nomination ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE nomination DROP users_id');
        $this->addSql('COMMENT ON COLUMN nomination.user_id IS \'User_id\'');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT fk_87266218a76ed395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_87266218a76ed395 ON nomination (user_id)');
    }
}
