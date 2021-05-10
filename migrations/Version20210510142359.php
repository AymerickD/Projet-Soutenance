<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510142359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artwork (id INT AUTO_INCREMENT NOT NULL, gallery_id INT NOT NULL, artwork_storage_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, published_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, view_count INT DEFAULT NULL, is_sold TINYINT(1) NOT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_881FC5764E7AF8F (gallery_id), INDEX IDX_881FC57644286572 (artwork_storage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artwork_storage (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_A73E996FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_472B783AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery_category (gallery_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_33C1CB7A4E7AF8F (gallery_id), INDEX IDX_33C1CB7A12469DE2 (category_id), PRIMARY KEY(gallery_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC5764E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57644286572 FOREIGN KEY (artwork_storage_id) REFERENCES artwork_storage (id)');
        $this->addSql('ALTER TABLE artwork_storage ADD CONSTRAINT FK_A73E996FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE gallery_category ADD CONSTRAINT FK_33C1CB7A4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gallery_category ADD CONSTRAINT FK_33C1CB7A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC57644286572');
        $this->addSql('ALTER TABLE gallery_category DROP FOREIGN KEY FK_33C1CB7A12469DE2');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC5764E7AF8F');
        $this->addSql('ALTER TABLE gallery_category DROP FOREIGN KEY FK_33C1CB7A4E7AF8F');
        $this->addSql('DROP TABLE artwork');
        $this->addSql('DROP TABLE artwork_storage');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE gallery_category');
    }
}
