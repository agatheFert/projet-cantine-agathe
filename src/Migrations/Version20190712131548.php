<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190712131548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cantine DROP FOREIGN KEY FK_A765884FCCD7E912');
        $this->addSql('DROP INDEX IDX_A765884FCCD7E912 ON cantine');
        $this->addSql('ALTER TABLE cantine DROP menu_id, DROP relation');
        $this->addSql('ALTER TABLE menu ADD menu_of_cantine_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A939C921CFD FOREIGN KEY (menu_of_cantine_id) REFERENCES cantine (id)');
        $this->addSql('CREATE INDEX IDX_7D053A939C921CFD ON menu (menu_of_cantine_id)');
        $this->addSql('ALTER TABLE menu_selectionne ADD CONSTRAINT FK_284C561B1EB5AC52 FOREIGN KEY (reserved_user_id) REFERENCES app_user (id)');
        $this->addSql('ALTER TABLE user_cantine ADD CONSTRAINT FK_FF689645A76ED395 FOREIGN KEY (user_id) REFERENCES app_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_menu ADD CONSTRAINT FK_784765AA76ED395 FOREIGN KEY (user_id) REFERENCES app_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cantine ADD menu_id INT NOT NULL, ADD relation VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE cantine ADD CONSTRAINT FK_A765884FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_A765884FCCD7E912 ON cantine (menu_id)');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A939C921CFD');
        $this->addSql('DROP INDEX IDX_7D053A939C921CFD ON menu');
        $this->addSql('ALTER TABLE menu DROP menu_of_cantine_id');
        $this->addSql('ALTER TABLE menu_selectionne DROP FOREIGN KEY FK_284C561B1EB5AC52');
        $this->addSql('ALTER TABLE user_cantine DROP FOREIGN KEY FK_FF689645A76ED395');
        $this->addSql('ALTER TABLE user_menu DROP FOREIGN KEY FK_784765AA76ED395');
    }
}
