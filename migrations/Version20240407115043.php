<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407115043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscrit ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_inscrit id_inscrit INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscrit MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON inscrit');
        $this->addSql('ALTER TABLE inscrit DROP id, CHANGE id_inscrit id_inscrit INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE inscrit ADD PRIMARY KEY (id_inscrit)');
    }
}
