<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510094004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, email VARCHAR(320) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dettes (id INT AUTO_INCREMENT NOT NULL, id_gens_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, INDEX IDX_15565CF1935140F0 (id_gens_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gens (id INT AUTO_INCREMENT NOT NULL, id_club_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, INDEX IDX_FBDB7FC2BF84A342 (id_club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dettes ADD CONSTRAINT FK_15565CF1935140F0 FOREIGN KEY (id_gens_id) REFERENCES gens (id)');
        $this->addSql('ALTER TABLE gens ADD CONSTRAINT FK_FBDB7FC2BF84A342 FOREIGN KEY (id_club_id) REFERENCES club (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gens DROP FOREIGN KEY FK_FBDB7FC2BF84A342');
        $this->addSql('ALTER TABLE dettes DROP FOREIGN KEY FK_15565CF1935140F0');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE dettes');
        $this->addSql('DROP TABLE gens');
    }
}
