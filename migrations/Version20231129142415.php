<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129142415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screens_project DROP FOREIGN KEY FK_434DD44441A67722');
        $this->addSql('DROP TABLE screens_project');
        $this->addSql('ALTER TABLE projects ADD screen_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE screens_project (id INT AUTO_INCREMENT NOT NULL, screen_id INT DEFAULT NULL, file_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_434DD44441A67722 (screen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE screens_project ADD CONSTRAINT FK_434DD44441A67722 FOREIGN KEY (screen_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects DROP screen_name');
    }
}
