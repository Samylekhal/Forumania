<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240407151958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_comm ADD sccom_id INT NOT NULL, ADD scinscrit_id INT NOT NULL, ADD reponse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section_comm ADD CONSTRAINT FK_2DB2EFE838EDB1F6 FOREIGN KEY (sccom_id) REFERENCES comentaires (id)');
        $this->addSql('ALTER TABLE section_comm ADD CONSTRAINT FK_2DB2EFE86F7042CA FOREIGN KEY (scinscrit_id) REFERENCES inscrit (id)');
        $this->addSql('ALTER TABLE section_comm ADD CONSTRAINT FK_2DB2EFE8CF18BB82 FOREIGN KEY (reponse_id) REFERENCES section_comm (id)');
        $this->addSql('CREATE INDEX IDX_2DB2EFE838EDB1F6 ON section_comm (sccom_id)');
        $this->addSql('CREATE INDEX IDX_2DB2EFE86F7042CA ON section_comm (scinscrit_id)');
        $this->addSql('CREATE INDEX IDX_2DB2EFE8CF18BB82 ON section_comm (reponse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_comm DROP FOREIGN KEY FK_2DB2EFE838EDB1F6');
        $this->addSql('ALTER TABLE section_comm DROP FOREIGN KEY FK_2DB2EFE86F7042CA');
        $this->addSql('ALTER TABLE section_comm DROP FOREIGN KEY FK_2DB2EFE8CF18BB82');
        $this->addSql('DROP INDEX IDX_2DB2EFE838EDB1F6 ON section_comm');
        $this->addSql('DROP INDEX IDX_2DB2EFE86F7042CA ON section_comm');
        $this->addSql('DROP INDEX IDX_2DB2EFE8CF18BB82 ON section_comm');
        $this->addSql('ALTER TABLE section_comm DROP sccom_id, DROP scinscrit_id, DROP reponse_id');
    }
}
