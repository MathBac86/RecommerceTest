<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115140017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, produits_id INT NOT NULL, num_commande VARCHAR(10) NOT NULL, date_commande DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', mail_commande VARCHAR(100) NOT NULL, INDEX IDX_6EEAA67DCD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(100) NOT NULL, marque_produit VARCHAR(255) NOT NULL, prix_produit DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        
        $this->addSql('INSERT INTO produits (nom_produit, marque_produit, prix_produit)
                       VALUES ("Iphone 6", "Apple", 250.00),
                       ("PinePhone", "Pine", 180.00),
                       ("FairPhone 3", "FairPhone", 380.00),
                       ("FairPhone 4", "FairPhone", 550.00),
                       ("Volla Phone", "Volla", 250.00),
                       ("Iphone 20", "Apple", 5250.00),
                       ("Galaxy Fold 3", "Samsung", 2250.00),
                       ("Pro 1", "F(x)tec", 550.00),
                       ("Iphone 7", "Apple", 350.00),
                       ("Pro 5", "Meizu", 150.00)');
   
   
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DCD11A2CF');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE produits');
    }
}
