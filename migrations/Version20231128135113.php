<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128135113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developer ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE developer ADD CONSTRAINT FK_65FB8B9A5585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('CREATE INDEX IDX_65FB8B9A5585C142 ON developer (skill_id)');
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D53116707FF61858');
        $this->addSql('DROP INDEX IDX_D53116707FF61858 ON skills');
        $this->addSql('ALTER TABLE skills DROP skills_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developer DROP FOREIGN KEY FK_65FB8B9A5585C142');
        $this->addSql('DROP INDEX IDX_65FB8B9A5585C142 ON developer');
        $this->addSql('ALTER TABLE developer DROP skill_id');
        $this->addSql('ALTER TABLE skills ADD skills_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D53116707FF61858 FOREIGN KEY (skills_id) REFERENCES developer (id)');
        $this->addSql('CREATE INDEX IDX_D53116707FF61858 ON skills (skills_id)');
    }
}
