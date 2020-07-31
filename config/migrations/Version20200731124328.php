<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731124328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asked_company ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE asked_company ALTER created_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN asked_company.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE company ADD asked_company_id UUID NOT NULL');
        $this->addSql('ALTER TABLE company ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE company ALTER created_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN company.asked_company_id IS \'(DC2Type:company_id)\'');
        $this->addSql('COMMENT ON COLUMN company.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE asked_company ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE asked_company ALTER created_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN asked_company.created_at IS NULL');
        $this->addSql('ALTER TABLE company DROP asked_company_id');
        $this->addSql('ALTER TABLE company ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE company ALTER created_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN company.created_at IS NULL');
    }
}
