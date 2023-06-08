<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608090814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eat_category (eat_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_6B59F96230F44A5E (eat_id), INDEX IDX_6B59F96212469DE2 (category_id), PRIMARY KEY(eat_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eat_category ADD CONSTRAINT FK_6B59F96230F44A5E FOREIGN KEY (eat_id) REFERENCES eat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eat_category ADD CONSTRAINT FK_6B59F96212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eat_category DROP FOREIGN KEY FK_6B59F96230F44A5E');
        $this->addSql('ALTER TABLE eat_category DROP FOREIGN KEY FK_6B59F96212469DE2');
        $this->addSql('DROP TABLE eat_category');
    }
}
