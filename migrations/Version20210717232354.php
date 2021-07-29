<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717232354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, supplier_id INT NOT NULL, oxygen_id INT NOT NULL, date DATE NOT NULL, price DOUBLE PRECISION DEFAULT NULL, tax INT DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_65D29B326B899279 (patient_id), INDEX IDX_65D29B322ADD6D8C (supplier_id), INDEX IDX_65D29B32654C1ECB (oxygen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B326B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B322ADD6D8C FOREIGN KEY (supplier_id) REFERENCES oxygen_supplier (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32654C1ECB FOREIGN KEY (oxygen_id) REFERENCES oxygene (id)');
        $this->addSql('ALTER TABLE appointment CHANGE doctor_id doctor_id INT DEFAULT NULL, CHANGE patient_id patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oxygene CHANGE supplier_id supplier_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE payments');
        $this->addSql('ALTER TABLE appointment CHANGE patient_id patient_id INT NOT NULL, CHANGE doctor_id doctor_id INT NOT NULL');
        $this->addSql('ALTER TABLE oxygene CHANGE supplier_id supplier_id INT NOT NULL');
    }
}
