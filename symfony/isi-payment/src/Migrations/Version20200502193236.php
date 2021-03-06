<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502193236 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE subscription (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', next_payment_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_order (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', subscription_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', payment_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', userid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, totalValue INT NOT NULL, currency_code VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_F1192EB9A1887DC (subscription_id), INDEX IDX_F1192EB4C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', cardNumber VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subscription_order ADD CONSTRAINT FK_F1192EB9A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE subscription_order ADD CONSTRAINT FK_F1192EB4C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subscription_order DROP FOREIGN KEY FK_F1192EB9A1887DC');
        $this->addSql('ALTER TABLE subscription_order DROP FOREIGN KEY FK_F1192EB4C3A3BB');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE subscription_order');
        $this->addSql('DROP TABLE payment');
    }
}
