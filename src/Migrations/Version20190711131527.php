<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711131527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accompagnement_menu (accompagnement_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_8A7C5D248E768805 (accompagnement_id), INDEX IDX_8A7C5D24CCD7E912 (menu_id), PRIMARY KEY(accompagnement_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dessert_menu (dessert_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_301FF776745B52FD (dessert_id), INDEX IDX_301FF776CCD7E912 (menu_id), PRIMARY KEY(dessert_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entree_menu (entree_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_A1A5FB5FAF7BD910 (entree_id), INDEX IDX_A1A5FB5FCCD7E912 (menu_id), PRIMARY KEY(entree_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat_menu (plat_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_CA9ED79CD73DB560 (plat_id), INDEX IDX_CA9ED79CCCD7E912 (menu_id), PRIMARY KEY(plat_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_cantine (user_id INT NOT NULL, cantine_id INT NOT NULL, INDEX IDX_FF689645A76ED395 (user_id), INDEX IDX_FF689645D30588FE (cantine_id), PRIMARY KEY(user_id, cantine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_menu (user_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_784765AA76ED395 (user_id), INDEX IDX_784765ACCD7E912 (menu_id), PRIMARY KEY(user_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accompagnement_menu ADD CONSTRAINT FK_8A7C5D248E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagnement_menu ADD CONSTRAINT FK_8A7C5D24CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dessert_menu ADD CONSTRAINT FK_301FF776745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dessert_menu ADD CONSTRAINT FK_301FF776CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entree_menu ADD CONSTRAINT FK_A1A5FB5FAF7BD910 FOREIGN KEY (entree_id) REFERENCES entree (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entree_menu ADD CONSTRAINT FK_A1A5FB5FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plat_menu ADD CONSTRAINT FK_CA9ED79CD73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plat_menu ADD CONSTRAINT FK_CA9ED79CCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_cantine ADD CONSTRAINT FK_FF689645A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_cantine ADD CONSTRAINT FK_FF689645D30588FE FOREIGN KEY (cantine_id) REFERENCES cantine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_menu ADD CONSTRAINT FK_784765AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_menu ADD CONSTRAINT FK_784765ACCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cantine ADD menu_id INT NOT NULL, ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cantine ADD CONSTRAINT FK_A765884FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_A765884FCCD7E912 ON cantine (menu_id)');
        $this->addSql('ALTER TABLE menu ADD cantine_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93D30588FE FOREIGN KEY (cantine_id) REFERENCES cantine (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93D30588FE ON menu (cantine_id)');
        $this->addSql('ALTER TABLE menu_selectionne ADD entree_id INT DEFAULT NULL, ADD dessert_id INT DEFAULT NULL, ADD plat_id INT NOT NULL, ADD accompagnement_id INT NOT NULL, ADD reserved_user_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE menu_selectionne ADD CONSTRAINT FK_284C561BAF7BD910 FOREIGN KEY (entree_id) REFERENCES entree (id)');
        $this->addSql('ALTER TABLE menu_selectionne ADD CONSTRAINT FK_284C561B745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id)');
        $this->addSql('ALTER TABLE menu_selectionne ADD CONSTRAINT FK_284C561BD73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE menu_selectionne ADD CONSTRAINT FK_284C561B8E768805 FOREIGN KEY (accompagnement_id) REFERENCES accompagnement (id)');
        $this->addSql('ALTER TABLE menu_selectionne ADD CONSTRAINT FK_284C561B1EB5AC52 FOREIGN KEY (reserved_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_284C561BAF7BD910 ON menu_selectionne (entree_id)');
        $this->addSql('CREATE INDEX IDX_284C561B745B52FD ON menu_selectionne (dessert_id)');
        $this->addSql('CREATE INDEX IDX_284C561BD73DB560 ON menu_selectionne (plat_id)');
        $this->addSql('CREATE INDEX IDX_284C561B8E768805 ON menu_selectionne (accompagnement_id)');
        $this->addSql('CREATE INDEX IDX_284C561B1EB5AC52 ON menu_selectionne (reserved_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE menu_selectionne DROP FOREIGN KEY FK_284C561B1EB5AC52');
        $this->addSql('ALTER TABLE user_cantine DROP FOREIGN KEY FK_FF689645A76ED395');
        $this->addSql('ALTER TABLE user_menu DROP FOREIGN KEY FK_784765AA76ED395');
        $this->addSql('DROP TABLE accompagnement_menu');
        $this->addSql('DROP TABLE dessert_menu');
        $this->addSql('DROP TABLE entree_menu');
        $this->addSql('DROP TABLE plat_menu');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_cantine');
        $this->addSql('DROP TABLE user_menu');
        $this->addSql('ALTER TABLE cantine DROP FOREIGN KEY FK_A765884FCCD7E912');
        $this->addSql('DROP INDEX IDX_A765884FCCD7E912 ON cantine');
        $this->addSql('ALTER TABLE cantine DROP menu_id, DROP relation');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93D30588FE');
        $this->addSql('DROP INDEX IDX_7D053A93D30588FE ON menu');
        $this->addSql('ALTER TABLE menu DROP cantine_id');
        $this->addSql('ALTER TABLE menu_selectionne DROP FOREIGN KEY FK_284C561BAF7BD910');
        $this->addSql('ALTER TABLE menu_selectionne DROP FOREIGN KEY FK_284C561B745B52FD');
        $this->addSql('ALTER TABLE menu_selectionne DROP FOREIGN KEY FK_284C561BD73DB560');
        $this->addSql('ALTER TABLE menu_selectionne DROP FOREIGN KEY FK_284C561B8E768805');
        $this->addSql('DROP INDEX IDX_284C561BAF7BD910 ON menu_selectionne');
        $this->addSql('DROP INDEX IDX_284C561B745B52FD ON menu_selectionne');
        $this->addSql('DROP INDEX IDX_284C561BD73DB560 ON menu_selectionne');
        $this->addSql('DROP INDEX IDX_284C561B8E768805 ON menu_selectionne');
        $this->addSql('DROP INDEX IDX_284C561B1EB5AC52 ON menu_selectionne');
        $this->addSql('ALTER TABLE menu_selectionne DROP entree_id, DROP dessert_id, DROP plat_id, DROP accompagnement_id, DROP reserved_user_id, DROP name, DROP date');
    }
}
