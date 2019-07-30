<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190729134635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_cantine');
        $this->addSql('ALTER TABLE app_user ADD cantine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9D30588FE FOREIGN KEY (cantine_id) REFERENCES cantine (id)');
        $this->addSql('CREATE INDEX IDX_88BDF3E9D30588FE ON app_user (cantine_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_cantine (user_id INT NOT NULL, cantine_id INT NOT NULL, INDEX IDX_FF689645A76ED395 (user_id), INDEX IDX_FF689645D30588FE (cantine_id), PRIMARY KEY(user_id, cantine_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_cantine ADD CONSTRAINT FK_FF689645A76ED395 FOREIGN KEY (user_id) REFERENCES app_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_cantine ADD CONSTRAINT FK_FF689645D30588FE FOREIGN KEY (cantine_id) REFERENCES cantine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9D30588FE');
        $this->addSql('DROP INDEX IDX_88BDF3E9D30588FE ON app_user');
        $this->addSql('ALTER TABLE app_user DROP cantine_id');
    }
}
