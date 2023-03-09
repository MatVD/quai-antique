<?php

declare(strict_types=1);

namespace public\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228152003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, admin_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, INDEX IDX_584DD35D12469DE2 (category_id), INDEX IDX_584DD35D642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, title VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, INDEX IDX_727508CF642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, days LONGTEXT NOT NULL, amopening_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', amclosing_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', pmopening_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', pmclosing_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', INDEX IDX_313BDC8E642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tables (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, seats INT DEFAULT NULL, free TINYINT(1) NOT NULL, reservation_name VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, arrival_time TIME DEFAULT NULL, allergies VARCHAR(255) DEFAULT NULL, INDEX IDX_84470221642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, allergies LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', name VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D642B8210 FOREIGN KEY (admin_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A642B8210 FOREIGN KEY (admin_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CF642B8210 FOREIGN KEY (admin_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E642B8210 FOREIGN KEY (admin_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE tables ADD CONSTRAINT FK_84470221642B8210 FOREIGN KEY (admin_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D12469DE2');
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D642B8210');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A642B8210');
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CF642B8210');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E642B8210');
        $this->addSql('ALTER TABLE tables DROP FOREIGN KEY FK_84470221642B8210');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE tables');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
