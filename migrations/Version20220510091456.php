<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510091456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dettes ADD id_gens_id INT NOT NULL');
        $this->addSql('ALTER TABLE dettes ADD CONSTRAINT FK_15565CF1935140F0 FOREIGN KEY (id_gens_id) REFERENCES gens (id)');
        $this->addSql('CREATE INDEX IDX_15565CF1935140F0 ON dettes (id_gens_id)');
        $this->addSql('ALTER TABLE gens ADD id_club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gens ADD CONSTRAINT FK_FBDB7FC2BF84A342 FOREIGN KEY (id_club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_FBDB7FC2BF84A342 ON gens (id_club_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dettes DROP FOREIGN KEY FK_15565CF1935140F0');
        $this->addSql('DROP INDEX IDX_15565CF1935140F0 ON dettes');
        $this->addSql('ALTER TABLE dettes DROP id_gens_id');
        $this->addSql('ALTER TABLE gens DROP FOREIGN KEY FK_FBDB7FC2BF84A342');
        $this->addSql('DROP INDEX IDX_FBDB7FC2BF84A342 ON gens');
        $this->addSql('ALTER TABLE gens DROP id_club_id');
    }
}
