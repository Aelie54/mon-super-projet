<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220316185515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fitness (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, durée DOUBLE PRECISION NOT NULL, vitesse DOUBLE PRECISION NOT NULL, pente VARCHAR(100) DEFAULT NULL, nombre_pas INT DEFAULT NULL, INDEX IDX_E583D7471179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gainage (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, poids DOUBLE PRECISION DEFAULT NULL, nombre INT NOT NULL, actif TINYINT(1) NOT NULL, INDEX IDX_17F2D4671179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musculation (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, poids DOUBLE PRECISION DEFAULT NULL, nombre INT NOT NULL, INDEX IDX_F9EDEE4471179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titres_fit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titres_gainage (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titres_muscu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_D5128A8F217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_exercise (training_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_49BFC68BBEFD98D1 (training_id), INDEX IDX_49BFC68BE934951A (exercise_id), PRIMARY KEY(training_id, exercise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fitness ADD CONSTRAINT FK_E583D7471179CD6 FOREIGN KEY (name_id) REFERENCES titres_fit (id)');
        $this->addSql('ALTER TABLE gainage ADD CONSTRAINT FK_17F2D4671179CD6 FOREIGN KEY (name_id) REFERENCES titres_gainage (id)');
        $this->addSql('ALTER TABLE musculation ADD CONSTRAINT FK_F9EDEE4471179CD6 FOREIGN KEY (name_id) REFERENCES titres_muscu (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F217BBB47 FOREIGN KEY (person_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE training_exercise ADD CONSTRAINT FK_49BFC68BBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_exercise ADD CONSTRAINT FK_49BFC68BE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training_exercise DROP FOREIGN KEY FK_49BFC68BE934951A');
        $this->addSql('ALTER TABLE fitness DROP FOREIGN KEY FK_E583D7471179CD6');
        $this->addSql('ALTER TABLE gainage DROP FOREIGN KEY FK_17F2D4671179CD6');
        $this->addSql('ALTER TABLE musculation DROP FOREIGN KEY FK_F9EDEE4471179CD6');
        $this->addSql('ALTER TABLE training_exercise DROP FOREIGN KEY FK_49BFC68BBEFD98D1');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F217BBB47');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE fitness');
        $this->addSql('DROP TABLE gainage');
        $this->addSql('DROP TABLE musculation');
        $this->addSql('DROP TABLE titres_fit');
        $this->addSql('DROP TABLE titres_gainage');
        $this->addSql('DROP TABLE titres_muscu');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_exercise');
        $this->addSql('DROP TABLE `user`');
    }
}
