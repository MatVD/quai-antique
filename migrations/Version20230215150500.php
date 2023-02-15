<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215150500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules ADD amopening_hours TIME DEFAULT NULL, ADD amclosing_hours TIME DEFAULT NULL, ADD pmopening_hours TIME DEFAULT NULL, ADD pmclosing_hours TIME DEFAULT NULL, DROP opening_hours, DROP closing_hours');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules ADD opening_hours TIME DEFAULT NULL, ADD closing_hours TIME DEFAULT NULL, DROP amopening_hours, DROP amclosing_hours, DROP pmopening_hours, DROP pmclosing_hours');
    }
}
