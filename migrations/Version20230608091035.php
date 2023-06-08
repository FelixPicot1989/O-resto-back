<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608091035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eat_menu (eat_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_A659C4A530F44A5E (eat_id), INDEX IDX_A659C4A5CCD7E912 (menu_id), PRIMARY KEY(eat_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eat_menu ADD CONSTRAINT FK_A659C4A530F44A5E FOREIGN KEY (eat_id) REFERENCES eat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eat_menu ADD CONSTRAINT FK_A659C4A5CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eat_menu DROP FOREIGN KEY FK_A659C4A530F44A5E');
        $this->addSql('ALTER TABLE eat_menu DROP FOREIGN KEY FK_A659C4A5CCD7E912');
        $this->addSql('DROP TABLE eat_menu');
    }
}
