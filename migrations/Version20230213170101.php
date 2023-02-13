<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230213170101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dish (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, INDEX IDX_957D8CB812469DE2 (category_id), INDEX IDX_957D8CB8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_C53D045F642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, INDEX IDX_7D053A93642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, days LONGTEXT DEFAULT NULL, opening_hours TIME DEFAULT NULL, closing_hours TIME DEFAULT NULL, INDEX IDX_313BDC8E642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tables (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, seats INT NOT NULL, free TINYINT(1) NOT NULL, INDEX IDX_84470221A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, allergies LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', name VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB812469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tables ADD CONSTRAINT FK_84470221A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB812469DE2');
        $this->addSql('ALTER TABLE dish DROP FOREIGN KEY FK_957D8CB8A76ED395');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F642B8210');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93642B8210');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E642B8210');
        $this->addSql('ALTER TABLE tables DROP FOREIGN KEY FK_84470221A76ED395');
        $this->addSql('DROP TABLE dish');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE tables');
        $this->addSql('DROP TABLE user');
    }
}
