<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731132732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE officer ADD company_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN officer.company_id IS \'(DC2Type:company_id)\'');
        $this->addSql('ALTER TABLE officer ADD CONSTRAINT FK_8273CFDA979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8273CFDA979B1AD6 ON officer (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE officer DROP CONSTRAINT FK_8273CFDA979B1AD6');
        $this->addSql('DROP INDEX IDX_8273CFDA979B1AD6');
        $this->addSql('ALTER TABLE officer DROP company_id');
    }
}
