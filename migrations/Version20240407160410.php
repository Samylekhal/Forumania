<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407160410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comentaires ADD commentaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE comentaires ADD CONSTRAINT FK_98CF4B45BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES section_comm (id)');
        $this->addSql('CREATE INDEX IDX_98CF4B45BA9CD190 ON comentaires (commentaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comentaires DROP FOREIGN KEY FK_98CF4B45BA9CD190');
        $this->addSql('DROP INDEX IDX_98CF4B45BA9CD190 ON comentaires');
        $this->addSql('ALTER TABLE comentaires DROP commentaire_id');
    }
}
