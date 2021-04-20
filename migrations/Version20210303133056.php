<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303133056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottles ADD domaine_id INT NOT NULL');
        $this->addSql('ALTER TABLE bottles ADD CONSTRAINT FK_A3C3D94272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('CREATE INDEX IDX_A3C3D94272FC9F ON bottles (domaine_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottles DROP FOREIGN KEY FK_A3C3D94272FC9F');
        $this->addSql('DROP INDEX IDX_A3C3D94272FC9F ON bottles');
        $this->addSql('ALTER TABLE bottles DROP domaine_id');
    }
}
