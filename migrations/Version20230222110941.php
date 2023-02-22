<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222110941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules CHANGE amopening_hours amopening_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', CHANGE amclosing_hours amclosing_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', CHANGE pmopening_hours pmopening_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', CHANGE pmclosing_hours pmclosing_hours TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules CHANGE amopening_hours amopening_hours TIME DEFAULT NULL, CHANGE amclosing_hours amclosing_hours TIME DEFAULT NULL, CHANGE pmopening_hours pmopening_hours TIME DEFAULT NULL, CHANGE pmclosing_hours pmclosing_hours TIME DEFAULT NULL');
    }
}
