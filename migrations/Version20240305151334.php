<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305151334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blood_transaction ADD hospital_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE blood_transaction ADD CONSTRAINT FK_A5BF141263DBB69 FOREIGN KEY (hospital_id) REFERENCES hospital (id)');
        $this->addSql('CREATE INDEX IDX_A5BF141263DBB69 ON blood_transaction (hospital_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blood_transaction DROP FOREIGN KEY FK_A5BF141263DBB69');
        $this->addSql('DROP INDEX IDX_A5BF141263DBB69 ON blood_transaction');
        $this->addSql('ALTER TABLE blood_transaction DROP hospital_id');
    }
}
