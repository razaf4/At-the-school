<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130194324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annee_courante (id INT AUTO_INCREMENT NOT NULL, annee_debut DATE NOT NULL, annee_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E51E6528F');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E762A0D2C');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8B0B20A6');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8B0B20A6 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E762A0D2C ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E51E6528F ON seance');
        $this->addSql('ALTER TABLE seance ADD id_niveau_id INT DEFAULT NULL, ADD id_matiere_id INT DEFAULT NULL, ADD id_parcours_id INT DEFAULT NULL, ADD id_au_courant_id INT DEFAULT NULL, DROP id_niveau, DROP id_matiere, DROP id_parcours');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8B2CDAF0 FOREIGN KEY (id_au_courant_id) REFERENCES annee_courante (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E51E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E762A0D2C FOREIGN KEY (id_parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8B0B20A6 FOREIGN KEY (id_niveau_id) REFERENCES niveau (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8B2CDAF0 ON seance (id_au_courant_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8B0B20A6 ON seance (id_niveau_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E762A0D2C ON seance (id_parcours_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E51E6528F ON seance (id_matiere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8B2CDAF0');
        $this->addSql('DROP TABLE annee_courante');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT fk_a_f_a FOREIGN KEY (id_matiere) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT fk_a_f_f FOREIGN KEY (id_niveau) REFERENCES niveau (id)');
        $this->addSql('CREATE INDEX fk_a_f_a ON enseignant (id_matiere)');
        $this->addSql('CREATE INDEX IDX_81A72FA16DE84686 ON enseignant (id_niveau)');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A5634CC6B3');
        $this->addSql('DROP INDEX UNIQ_6977C7A5634CC6B3 ON presence');
        $this->addSql('ALTER TABLE presence CHANGE id_seance_id id_seance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A5634CC6B3 FOREIGN KEY (id_seance) REFERENCES seance (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6977C7A5634CC6B3 ON presence (id_seance)');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8B0B20A6');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E51E6528F');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E762A0D2C');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8B2CDAF0 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8B0B20A6 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E51E6528F ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E762A0D2C ON seance');
        $this->addSql('ALTER TABLE seance ADD id_niveau INT DEFAULT NULL, ADD id_matiere INT DEFAULT NULL, ADD id_parcours INT DEFAULT NULL, DROP id_niveau_id, DROP id_matiere_id, DROP id_parcours_id, DROP id_au_courant_id');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8B0B20A6 FOREIGN KEY (id_niveau) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E51E6528F FOREIGN KEY (id_matiere) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E762A0D2C FOREIGN KEY (id_parcours) REFERENCES parcours (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8B0B20A6 ON seance (id_niveau)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E51E6528F ON seance (id_matiere)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E762A0D2C ON seance (id_parcours)');
    }
}
