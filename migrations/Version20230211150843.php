<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211150843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, days DATE DEFAULT NULL, opening_hours TIME DEFAULT NULL, closing_hours TIME DEFAULT NULL, INDEX IDX_313BDC8E642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dish ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_957D8CB8A76ED395 ON dish (user_id)');
        $this->addSql('ALTER TABLE image ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F642B8210 ON image (admin_id)');
        $this->addSql('ALTER TABLE menu ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93642B8210 ON menu (admin_id)');
        $this->addSql('ALTER TABLE tables ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tables ADD CONSTRAINT FK_84470221A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_84470221A76ED395 ON tables (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E642B8210');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB8A76ED395');
        $this->addSql('DROP INDEX IDX_957D8CB8A76ED395 ON dish');
        $this->addSql('ALTER TABLE dish DROP user_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F642B8210');
        $this->addSql('DROP INDEX IDX_C53D045F642B8210 ON image');
        $this->addSql('ALTER TABLE image DROP admin_id');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93642B8210');
        $this->addSql('DROP INDEX IDX_7D053A93642B8210 ON menu');
        $this->addSql('ALTER TABLE menu DROP admin_id');
        $this->addSql('ALTER TABLE tables DROP FOREIGN KEY FK_84470221A76ED395');
        $this->addSql('DROP INDEX IDX_84470221A76ED395 ON tables');
        $this->addSql('ALTER TABLE tables DROP user_id');
    }
}
