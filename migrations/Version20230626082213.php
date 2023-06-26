<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626082213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD eat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F30F44A5E FOREIGN KEY (eat_id) REFERENCES eat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045F30F44A5E ON image (eat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F30F44A5E');
        $this->addSql('DROP INDEX UNIQ_C53D045F30F44A5E ON image');
        $this->addSql('ALTER TABLE image DROP eat_id');
    }
}
