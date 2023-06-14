<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230530130713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE passenger_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ride_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE passenger (id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ride (id INT NOT NULL, driver_id INT DEFAULT NULL, car_id INT DEFAULT NULL, passenger_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9B3D7CD0C3423909 ON ride (driver_id)');
        $this->addSql('CREATE INDEX IDX_9B3D7CD0C3C6F69F ON ride (car_id)');
        $this->addSql('CREATE INDEX IDX_9B3D7CD04502E565 ON ride (passenger_id)');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD04502E565 FOREIGN KEY (passenger_id) REFERENCES passenger (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE passenger_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ride_id_seq CASCADE');
        $this->addSql('ALTER TABLE ride DROP CONSTRAINT FK_9B3D7CD0C3423909');
        $this->addSql('ALTER TABLE ride DROP CONSTRAINT FK_9B3D7CD0C3C6F69F');
        $this->addSql('ALTER TABLE ride DROP CONSTRAINT FK_9B3D7CD04502E565');
        $this->addSql('DROP TABLE passenger');
        $this->addSql('DROP TABLE ride');
    }
}
