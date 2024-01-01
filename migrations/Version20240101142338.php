<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240101142338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE currency (iso3 VARCHAR(3) NOT NULL, rate DOUBLE PRECISION NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(iso3)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency_rate_history (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', currency_id VARCHAR(3) NOT NULL, rate DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, INDEX IDX_5C1844DA38248176 (currency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE currency_rate_history ADD CONSTRAINT FK_5C1844DA38248176 FOREIGN KEY (currency_id) REFERENCES currency (iso3)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE currency_rate_history DROP FOREIGN KEY FK_5C1844DA38248176');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE currency_rate_history');
    }
}
