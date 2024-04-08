<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407154119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_comm DROP FOREIGN KEY FK_2DB2EFE838EDB1F6');
        $this->addSql('DROP INDEX IDX_2DB2EFE838EDB1F6 ON section_comm');
        $this->addSql('ALTER TABLE section_comm DROP sccom_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_comm ADD sccom_id INT NOT NULL');
        $this->addSql('ALTER TABLE section_comm ADD CONSTRAINT FK_2DB2EFE838EDB1F6 FOREIGN KEY (sccom_id) REFERENCES comentaires (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2DB2EFE838EDB1F6 ON section_comm (sccom_id)');
    }
}
