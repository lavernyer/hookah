<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731073256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asked_company (id UUID NOT NULL, external_id INT NOT NULL, jurisdiction VARCHAR(16) NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN asked_company.id IS \'(DC2Type:company_id)\'');
        $this->addSql('COMMENT ON COLUMN asked_company.jurisdiction IS \'(DC2Type:jurisdiction)\'');
        $this->addSql('CREATE TABLE company (id UUID NOT NULL, external_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, number VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, inactive BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, address_jurisdiction VARCHAR(16) NOT NULL, address_address VARCHAR(255) NOT NULL, address_locality VARCHAR(255) DEFAULT NULL, address_region VARCHAR(255) DEFAULT NULL, address_postal_code VARCHAR(255) DEFAULT NULL, address_country VARCHAR(255) DEFAULT NULL, agent_name VARCHAR(255) DEFAULT NULL, agent_address VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN company.id IS \'(DC2Type:company_id)\'');
        $this->addSql('COMMENT ON COLUMN company.address_jurisdiction IS \'(DC2Type:jurisdiction)\'');
        $this->addSql('CREATE TABLE officer (id UUID NOT NULL, name VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN officer.id IS \'(DC2Type:officer_id)\'');
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:user_id)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE asked_company');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE officer');
        $this->addSql('DROP TABLE "user"');
    }
}
