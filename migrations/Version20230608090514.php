<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608090514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drink ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE drink ADD CONSTRAINT FK_DBE40D112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_DBE40D112469DE2 ON drink (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drink DROP FOREIGN KEY FK_DBE40D112469DE2');
        $this->addSql('DROP INDEX IDX_DBE40D112469DE2 ON drink');
        $this->addSql('ALTER TABLE drink DROP category_id');
    }
}
