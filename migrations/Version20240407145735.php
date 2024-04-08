<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407145735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comentaires ADD forum_id INT NOT NULL');
        $this->addSql('ALTER TABLE comentaires ADD CONSTRAINT FK_98CF4B4529CCBAD0 FOREIGN KEY (forum_id) REFERENCES forum (id)');
        $this->addSql('CREATE INDEX IDX_98CF4B4529CCBAD0 ON comentaires (forum_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comentaires DROP FOREIGN KEY FK_98CF4B4529CCBAD0');
        $this->addSql('DROP INDEX IDX_98CF4B4529CCBAD0 ON comentaires');
        $this->addSql('ALTER TABLE comentaires DROP forum_id');
    }
}
