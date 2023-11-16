<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231116144742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE developer (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(32) NOT NULL, last_name VARCHAR(32) NOT NULL, biography LONGTEXT NOT NULL, github_link VARCHAR(255) NOT NULL, linkedin_link VARCHAR(255) NOT NULL, youtube_link VARCHAR(255) DEFAULT NULL, picture_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_65FB8B9AF85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langages (id INT AUTO_INCREMENT NOT NULL, langage VARCHAR(32) NOT NULL, file_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, github_link VARCHAR(255) NOT NULL, website_link VARCHAR(255) NOT NULL, created_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_langages (projects_id INT NOT NULL, langages_id INT NOT NULL, INDEX IDX_A352F9F51EDE0F55 (projects_id), INDEX IDX_A352F9F5C88BBA17 (langages_id), PRIMARY KEY(projects_id, langages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screens_project (id INT AUTO_INCREMENT NOT NULL, screen_id INT DEFAULT NULL, file_name VARCHAR(255) NOT NULL, INDEX IDX_434DD44441A67722 (screen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skills_id INT DEFAULT NULL, skill VARCHAR(32) NOT NULL, INDEX IDX_D53116707FF61858 (skills_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_langages ADD CONSTRAINT FK_A352F9F51EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_langages ADD CONSTRAINT FK_A352F9F5C88BBA17 FOREIGN KEY (langages_id) REFERENCES langages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screens_project ADD CONSTRAINT FK_434DD44441A67722 FOREIGN KEY (screen_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D53116707FF61858 FOREIGN KEY (skills_id) REFERENCES developer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects_langages DROP FOREIGN KEY FK_A352F9F51EDE0F55');
        $this->addSql('ALTER TABLE projects_langages DROP FOREIGN KEY FK_A352F9F5C88BBA17');
        $this->addSql('ALTER TABLE screens_project DROP FOREIGN KEY FK_434DD44441A67722');
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D53116707FF61858');
        $this->addSql('DROP TABLE developer');
        $this->addSql('DROP TABLE langages');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_langages');
        $this->addSql('DROP TABLE screens_project');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
