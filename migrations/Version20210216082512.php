<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210216082512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beer (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, published_at DATETIME DEFAULT NULL, price NUMERIC(5, 2) DEFAULT NULL, degree NUMERIC(5, 2) NOT NULL, INDEX IDX_58F666ADF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beer_category (beer_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_CC90155FD0989053 (beer_id), INDEX IDX_CC90155F12469DE2 (category_id), PRIMARY KEY(beer_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, term VARCHAR(100) DEFAULT \'normal\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, address LONGTEXT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE beer ADD CONSTRAINT FK_58F666ADF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE beer_category ADD CONSTRAINT FK_CC90155FD0989053 FOREIGN KEY (beer_id) REFERENCES beer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_category ADD CONSTRAINT FK_CC90155F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, weight NUMERIC(2, 0) DEFAULT NULL, name VARCHAR(100) NOT NULL, number_beer INT DEFAULT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistic (id INT AUTO_INCREMENT NOT NULL, beer_id INT NOT NULL, client_id INT NOT NULL, category_id INT NOT NULL, score INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beer_category DROP FOREIGN KEY FK_CC90155FD0989053');
        $this->addSql('ALTER TABLE beer_category DROP FOREIGN KEY FK_CC90155F12469DE2');
        $this->addSql('ALTER TABLE beer DROP FOREIGN KEY FK_58F666ADF92F3E70');
        $this->addSql('DROP TABLE beer');
        $this->addSql('DROP TABLE beer_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE statistic');
    }
}
