<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730124250 extends AbstractMigration
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
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE payments');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE doctor ADD doctorname VARCHAR(255) NOT NULL, ADD mobilephone VARCHAR(255) NOT NULL, ADD departement VARCHAR(255) NOT NULL, ADD specilaisation VARCHAR(255) NOT NULL, DROP src, DROP Name, DROP Mobile, DROP departementId, DROP Specialization, DROP Color, DROP Availability, DROP StartHour, DROP EndHour, CHANGE Text text VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE oxygene CHANGE supplier_id supplier_id INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD patientname VARCHAR(255) NOT NULL, ADD dateofbirth VARCHAR(255) NOT NULL, ADD bloodgroup VARCHAR(255) NOT NULL, ADD mobilephone VARCHAR(255) NOT NULL, DROP patient_name, DROP date_of_birth, DROP blood_group, DROP mobile_number');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, content VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, is_read TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, supplier_id INT NOT NULL, oxygen_id INT NOT NULL, created_at DATE NOT NULL, price DOUBLE PRECISION DEFAULT NULL, tax INT DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_65D29B322ADD6D8C (supplier_id), INDEX IDX_65D29B32654C1ECB (oxygen_id), INDEX IDX_65D29B326B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_patient INT DEFAULT NULL, id_doctor INT DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B322ADD6D8C FOREIGN KEY (supplier_id) REFERENCES oxygen_supplier (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32654C1ECB FOREIGN KEY (oxygen_id) REFERENCES oxygene (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B326B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('DROP TABLE work_days');
        $this->addSql('ALTER TABLE doctor ADD src VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD Name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD Mobile VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD departementId VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD Specialization VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD Color VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD Availability VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD StartHour TIME NOT NULL, ADD EndHour TIME NOT NULL, DROP doctorname, DROP mobilephone, DROP departement, DROP specilaisation, CHANGE text Text INT NOT NULL');
        $this->addSql('ALTER TABLE oxygene CHANGE supplier_id supplier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD patient_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD date_of_birth VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD blood_group VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mobile_number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP patientname, DROP dateofbirth, DROP bloodgroup, DROP mobilephone');
    }
}
