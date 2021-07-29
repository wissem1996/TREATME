<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729214705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE work_days (id INT AUTO_INCREMENT NOT NULL, doctor_id INT NOT NULL, break_end_hour VARCHAR(255) NOT NULL, break_start_hour VARCHAR(255) NOT NULL, day VARCHAR(255) NOT NULL, enable VARCHAR(255) NOT NULL, dex VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, work_end_hour VARCHAR(255) NOT NULL, work_start_hour VARCHAR(255) NOT NULL, INDEX IDX_12274D5E87F4FB17 (doctor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_days ADD CONSTRAINT FK_12274D5E87F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE work_days');
    }
}
