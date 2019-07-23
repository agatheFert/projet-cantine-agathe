<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190723133027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accompagnement ADD tarif DOUBLE PRECISION NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A765884F5E237E06 ON cantine (name)');
        $this->addSql('ALTER TABLE dessert ADD tarif DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE entree ADD tarif DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE plat ADD tarif DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accompagnement DROP tarif');
        $this->addSql('DROP INDEX UNIQ_A765884F5E237E06 ON cantine');
        $this->addSql('ALTER TABLE dessert DROP tarif');
        $this->addSql('ALTER TABLE entree DROP tarif');
        $this->addSql('ALTER TABLE plat DROP tarif');
    }
}
