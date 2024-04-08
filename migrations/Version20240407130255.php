<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407130255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE forum ADD id INT AUTO_INCREMENT NOT NULL, DROP Id_Inscrit, CHANGE id_forum id_forum INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE inscrit ADD `integer` VARCHAR(255) NOT NULL, DROP id_inscrit');
        $this->addSql('ALTER TABLE section_comm ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_message id_message INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscrit ADD id_inscrit INT NOT NULL, DROP `integer`');
        $this->addSql('ALTER TABLE forum MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON forum');
        $this->addSql('ALTER TABLE forum ADD Id_Inscrit INT DEFAULT NULL, DROP id, CHANGE id_forum id_forum INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE forum ADD PRIMARY KEY (id_forum)');
        $this->addSql('ALTER TABLE section_comm MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON section_comm');
        $this->addSql('ALTER TABLE section_comm DROP id, CHANGE id_message id_message INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE section_comm ADD PRIMARY KEY (id_message)');
    }
}
