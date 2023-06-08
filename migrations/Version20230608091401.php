<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608091401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eat ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eat ADD CONSTRAINT FK_9AD33F1A3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9AD33F1A3DA5256D ON eat (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eat DROP FOREIGN KEY FK_9AD33F1A3DA5256D');
        $this->addSql('DROP INDEX UNIQ_9AD33F1A3DA5256D ON eat');
        $this->addSql('ALTER TABLE eat DROP image_id');
    }
}
