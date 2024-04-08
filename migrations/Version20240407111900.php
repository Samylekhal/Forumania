<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407111900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_comm DROP id, CHANGE id_message id_message INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_message)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_comm MODIFY id_message INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON section_comm');
        $this->addSql('ALTER TABLE section_comm ADD id INT NOT NULL, CHANGE id_message id_message INT NOT NULL');
    }
}
