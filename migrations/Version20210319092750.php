<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319092750 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_produit (categorie_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_76264285BCF5E72D (categorie_id), INDEX IDX_76264285F347EFB (produit_id), PRIMARY KEY(categorie_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_produit ADD CONSTRAINT FK_76264285BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_produit ADD CONSTRAINT FK_76264285F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acheteur CHANGE id_utilisateur id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE acheteur ADD CONSTRAINT FK_304AFF9DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_304AFF9DC6EE5C49 ON acheteur (id_utilisateur_id)');
        $this->addSql('ALTER TABLE categorie ADD id_sous_categorie_id INT DEFAULT NULL, DROP id_produit, DROP id_categories');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634F252D75F FOREIGN KEY (id_sous_categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_497DD634F252D75F ON categorie (id_sous_categorie_id)');
        $this->addSql('ALTER TABLE commissaire_priseur ADD id_personne_id INT NOT NULL, DROP id_personne');
        $this->addSql('ALTER TABLE commissaire_priseur ADD CONSTRAINT FK_E21F5C61BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE INDEX IDX_E21F5C61BA091CE5 ON commissaire_priseur (id_personne_id)');
        $this->addSql('ALTER TABLE date ADD id_lieu_id INT DEFAULT NULL, ADD id_vente_id INT DEFAULT NULL, DROP id_lieu, DROP id_vente');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377AB42FBABC FOREIGN KEY (id_lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377A2D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('CREATE INDEX IDX_AA9E377AB42FBABC ON date (id_lieu_id)');
        $this->addSql('CREATE INDEX IDX_AA9E377A2D1CFB9F ON date (id_vente_id)');
        $this->addSql('ALTER TABLE estimation ADD id_produit_id INT DEFAULT NULL, ADD id_comissaire_id INT DEFAULT NULL, DROP id_produit, DROP id_comissaire');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D05270241130FE97 FOREIGN KEY (id_comissaire_id) REFERENCES commissaire_priseur (id)');
        $this->addSql('CREATE INDEX IDX_D0527024AABEFE2C ON estimation (id_produit_id)');
        $this->addSql('CREATE INDEX IDX_D05270241130FE97 ON estimation (id_comissaire_id)');
        $this->addSql('ALTER TABLE lot CHANGE id_vente id_vente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B2D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('CREATE INDEX IDX_B81291B2D1CFB9F ON lot (id_vente_id)');
        $this->addSql('ALTER TABLE offre ADD id_produit_id INT DEFAULT NULL, ADD id_acheteur_id INT DEFAULT NULL, DROP id_produit, DROP id_acheteur');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FAABEFE2C ON offre (id_produit_id)');
        $this->addSql('CREATE INDEX IDX_AF86866F8EB576A8 ON offre (id_acheteur_id)');
        $this->addSql('ALTER TABLE photo CHANGE id_produit id_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_14B78418AABEFE2C ON photo (id_produit_id)');
        $this->addSql('ALTER TABLE produit ADD id_lot_id INT DEFAULT NULL, DROP id_lot, DROP id_vente, DROP id_vendeur');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC278EFC101A ON produit (id_lot_id)');
        $this->addSql('ALTER TABLE utilisateur CHANGE id_personne id_personne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3BA091CE5 ON utilisateur (id_personne_id)');
        $this->addSql('ALTER TABLE vendeur CHANGE id_utilisateur id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vendeur ADD CONSTRAINT FK_7AF49996C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7AF49996C6EE5C49 ON vendeur (id_utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_produit');
        $this->addSql('ALTER TABLE acheteur DROP FOREIGN KEY FK_304AFF9DC6EE5C49');
        $this->addSql('DROP INDEX UNIQ_304AFF9DC6EE5C49 ON acheteur');
        $this->addSql('ALTER TABLE acheteur CHANGE id_utilisateur_id id_utilisateur INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634F252D75F');
        $this->addSql('DROP INDEX IDX_497DD634F252D75F ON categorie');
        $this->addSql('ALTER TABLE categorie ADD id_categories INT DEFAULT NULL, CHANGE id_sous_categorie_id id_produit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commissaire_priseur DROP FOREIGN KEY FK_E21F5C61BA091CE5');
        $this->addSql('DROP INDEX IDX_E21F5C61BA091CE5 ON commissaire_priseur');
        $this->addSql('ALTER TABLE commissaire_priseur ADD id_personne INT DEFAULT NULL, DROP id_personne_id');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377AB42FBABC');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377A2D1CFB9F');
        $this->addSql('DROP INDEX IDX_AA9E377AB42FBABC ON date');
        $this->addSql('DROP INDEX IDX_AA9E377A2D1CFB9F ON date');
        $this->addSql('ALTER TABLE date ADD id_lieu INT DEFAULT NULL, ADD id_vente INT DEFAULT NULL, DROP id_lieu_id, DROP id_vente_id');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024AABEFE2C');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D05270241130FE97');
        $this->addSql('DROP INDEX IDX_D0527024AABEFE2C ON estimation');
        $this->addSql('DROP INDEX IDX_D05270241130FE97 ON estimation');
        $this->addSql('ALTER TABLE estimation ADD id_produit INT DEFAULT NULL, ADD id_comissaire INT DEFAULT NULL, DROP id_produit_id, DROP id_comissaire_id');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B2D1CFB9F');
        $this->addSql('DROP INDEX IDX_B81291B2D1CFB9F ON lot');
        $this->addSql('ALTER TABLE lot CHANGE id_vente_id id_vente INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FAABEFE2C');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F8EB576A8');
        $this->addSql('DROP INDEX IDX_AF86866FAABEFE2C ON offre');
        $this->addSql('DROP INDEX IDX_AF86866F8EB576A8 ON offre');
        $this->addSql('ALTER TABLE offre ADD id_produit INT DEFAULT NULL, ADD id_acheteur INT DEFAULT NULL, DROP id_produit_id, DROP id_acheteur_id');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418AABEFE2C');
        $this->addSql('DROP INDEX IDX_14B78418AABEFE2C ON photo');
        $this->addSql('ALTER TABLE photo CHANGE id_produit_id id_produit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278EFC101A');
        $this->addSql('DROP INDEX IDX_29A5EC278EFC101A ON produit');
        $this->addSql('ALTER TABLE produit ADD id_vente INT DEFAULT NULL, ADD id_vendeur INT DEFAULT NULL, CHANGE id_lot_id id_lot INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BA091CE5');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3BA091CE5 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE id_personne_id id_personne INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vendeur DROP FOREIGN KEY FK_7AF49996C6EE5C49');
        $this->addSql('DROP INDEX UNIQ_7AF49996C6EE5C49 ON vendeur');
        $this->addSql('ALTER TABLE vendeur CHANGE id_utilisateur_id id_utilisateur INT DEFAULT NULL');
    }
}
