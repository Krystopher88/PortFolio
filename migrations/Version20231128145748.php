<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128145748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developer DROP FOREIGN KEY FK_65FB8B9AF6B10265');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP INDEX IDX_65FB8B9AF6B10265 ON developer');
        $this->addSql('ALTER TABLE developer DROP skill_developer_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skill VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE developer ADD skill_developer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE developer ADD CONSTRAINT FK_65FB8B9AF6B10265 FOREIGN KEY (skill_developer_id) REFERENCES skills (id)');
        $this->addSql('CREATE INDEX IDX_65FB8B9AF6B10265 ON developer (skill_developer_id)');
    }
}
