<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241001162448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE main_code ADD html_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE main_code ADD CONSTRAINT FK_97A602FA3CD4754E FOREIGN KEY (html_id) REFERENCES html (id)');
        $this->addSql('CREATE INDEX IDX_97A602FA3CD4754E ON main_code (html_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE main_code DROP FOREIGN KEY FK_97A602FA3CD4754E');
        $this->addSql('DROP INDEX IDX_97A602FA3CD4754E ON main_code');
        $this->addSql('ALTER TABLE main_code DROP html_id');
    }
}
