<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130202355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annee_courante CHANGE annee_debut annee_debut VARCHAR(15) DEFAULT NULL, CHANGE annee_fin annee_fin VARCHAR(15) DEFAULT NULL');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annee_courante CHANGE annee_debut annee_debut DATE NOT NULL, CHANGE annee_fin annee_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT fk_a_f_a FOREIGN KEY (id_matiere) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT fk_a_f_f FOREIGN KEY (id_niveau) REFERENCES niveau (id)');
        $this->addSql('CREATE INDEX fk_a_f_a ON enseignant (id_matiere)');
        $this->addSql('CREATE INDEX IDX_81A72FA16DE84686 ON enseignant (id_niveau)');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A5634CC6B3');
        $this->addSql('DROP INDEX UNIQ_6977C7A5634CC6B3 ON presence');
        $this->addSql('ALTER TABLE presence CHANGE id_seance_id id_seance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A5634CC6B3 FOREIGN KEY (id_seance) REFERENCES seance (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6977C7A5634CC6B3 ON presence (id_seance)');
    }
}
