<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210712200748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oxygen_supplier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oxygene (id INT AUTO_INCREMENT NOT NULL, supplier_id INT NOT NULL, water_capcity VARCHAR(5) DEFAULT NULL, oxygene_capacity VARCHAR(10) DEFAULT NULL, status VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_DD6AFBEF2ADD6D8C (supplier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oxygene ADD CONSTRAINT FK_DD6AFBEF2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES oxygen_supplier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oxygene DROP FOREIGN KEY FK_DD6AFBEF2ADD6D8C');
        $this->addSql('DROP TABLE oxygen_supplier');
        $this->addSql('DROP TABLE oxygene');
    }
}
