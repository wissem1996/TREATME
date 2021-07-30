<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730150505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE payments');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE doctor ADD departmentid INT NOT NULL');
        $this->addSql('ALTER TABLE oxygene CHANGE supplier_id supplier_id INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD patientname VARCHAR(255) NOT NULL, ADD dateofbirth VARCHAR(255) NOT NULL, ADD bloodgroup VARCHAR(255) NOT NULL, ADD mobilephone VARCHAR(255) NOT NULL, DROP patient_name, DROP date_of_birth, DROP blood_group, DROP mobile_number');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, content VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, is_read TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, supplier_id INT NOT NULL, oxygen_id INT NOT NULL, created_at DATE NOT NULL, price DOUBLE PRECISION DEFAULT NULL, tax INT DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_65D29B326B899279 (patient_id), INDEX IDX_65D29B322ADD6D8C (supplier_id), INDEX IDX_65D29B32654C1ECB (oxygen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_patient INT DEFAULT NULL, id_doctor INT DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B322ADD6D8C FOREIGN KEY (supplier_id) REFERENCES oxygen_supplier (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32654C1ECB FOREIGN KEY (oxygen_id) REFERENCES oxygene (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B326B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE doctor DROP departmentid');
        $this->addSql('ALTER TABLE oxygene CHANGE supplier_id supplier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD patient_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD date_of_birth VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD blood_group VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mobile_number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP patientname, DROP dateofbirth, DROP bloodgroup, DROP mobilephone');
    }
}
