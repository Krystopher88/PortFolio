<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128150018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills ADD skill_developer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670F6B10265 FOREIGN KEY (skill_developer_id) REFERENCES developer (id)');
        $this->addSql('CREATE INDEX IDX_D5311670F6B10265 ON skills (skill_developer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D5311670F6B10265');
        $this->addSql('DROP INDEX IDX_D5311670F6B10265 ON skills');
        $this->addSql('ALTER TABLE skills DROP skill_developer_id');
    }
}
