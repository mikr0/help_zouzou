<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625122747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clinic (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, INDEX IDX_783F8B4816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, arrival DATE NOT NULL, departure DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, vehicle TINYINT(1) NOT NULL, accommodation TINYINT(1) NOT NULL, support TINYINT(1) NOT NULL, INDEX IDX_8D93D649816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clinic ADD CONSTRAINT FK_783F8B4816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clinic DROP FOREIGN KEY FK_783F8B4816C6140');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649816C6140');
        $this->addSql('DROP TABLE clinic');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE user');
    }
}
