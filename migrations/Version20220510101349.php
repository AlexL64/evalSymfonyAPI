<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510101349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dettes DROP FOREIGN KEY FK_15565CF19A1A18C3');
        $this->addSql('DROP INDEX IDX_15565CF19A1A18C3 ON dettes');
        $this->addSql('ALTER TABLE dettes CHANGE gens_id_id gens_id INT NOT NULL');
        $this->addSql('ALTER TABLE dettes ADD CONSTRAINT FK_15565CF14DCCE980 FOREIGN KEY (gens_id) REFERENCES gens (id)');
        $this->addSql('CREATE INDEX IDX_15565CF14DCCE980 ON dettes (gens_id)');
        $this->addSql('ALTER TABLE gens DROP FOREIGN KEY FK_FBDB7FC2DF2AB4E5');
        $this->addSql('DROP INDEX IDX_FBDB7FC2DF2AB4E5 ON gens');
        $this->addSql('ALTER TABLE gens CHANGE club_id_id club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gens ADD CONSTRAINT FK_FBDB7FC261190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_FBDB7FC261190A32 ON gens (club_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dettes DROP FOREIGN KEY FK_15565CF14DCCE980');
        $this->addSql('DROP INDEX IDX_15565CF14DCCE980 ON dettes');
        $this->addSql('ALTER TABLE dettes CHANGE gens_id gens_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE dettes ADD CONSTRAINT FK_15565CF19A1A18C3 FOREIGN KEY (gens_id_id) REFERENCES gens (id)');
        $this->addSql('CREATE INDEX IDX_15565CF19A1A18C3 ON dettes (gens_id_id)');
        $this->addSql('ALTER TABLE gens DROP FOREIGN KEY FK_FBDB7FC261190A32');
        $this->addSql('DROP INDEX IDX_FBDB7FC261190A32 ON gens');
        $this->addSql('ALTER TABLE gens CHANGE club_id club_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gens ADD CONSTRAINT FK_FBDB7FC2DF2AB4E5 FOREIGN KEY (club_id_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_FBDB7FC2DF2AB4E5 ON gens (club_id_id)');
    }
}
