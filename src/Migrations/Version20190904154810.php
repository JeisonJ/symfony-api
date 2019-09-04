<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904154810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d6494bab96c');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rol_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE api_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE api_rol_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE api_user (id INT NOT NULL, rol_id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT DEFAULT NULL, date_created TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, date_update TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AC64A0BA4BAB96C ON api_user (rol_id)');
        $this->addSql('CREATE TABLE api_rol (id INT NOT NULL, name VARCHAR(255) NOT NULL, date_created TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, date_update TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE api_user ADD CONSTRAINT FK_AC64A0BA4BAB96C FOREIGN KEY (rol_id) REFERENCES api_rol (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE rol');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE api_user DROP CONSTRAINT FK_AC64A0BA4BAB96C');
        $this->addSql('DROP SEQUENCE api_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE api_rol_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rol_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, rol_id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT DEFAULT NULL, date_created TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, date_update TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_8d93d6494bab96c ON "user" (rol_id)');
        $this->addSql('CREATE TABLE rol (id INT NOT NULL, name VARCHAR(255) NOT NULL, date_created TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, date_update TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_user_modification TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d6494bab96c FOREIGN KEY (rol_id) REFERENCES rol (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE api_user');
        $this->addSql('DROP TABLE api_rol');
    }
}
