<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730215244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oxygene ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE payments CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE supplier_id supplier_id INT DEFAULT NULL, CHANGE oxygen_id oxygen_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oxygene DROP image');
        $this->addSql('ALTER TABLE payments CHANGE supplier_id supplier_id INT NOT NULL, CHANGE oxygen_id oxygen_id INT NOT NULL, CHANGE patient_id patient_id INT NOT NULL');
    }
}
