<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181125165254 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE aresta (id SERIAL NOT NULL, origem_id INT DEFAULT NULL, destino_id INT DEFAULT NULL, distancia DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DAD1F2F781E73123 ON aresta (origem_id)');
        $this->addSql('CREATE INDEX IDX_DAD1F2F7E4360615 ON aresta (destino_id)');
        $this->addSql('CREATE TABLE grafo (id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE grafo_vertice (grafo_id INT NOT NULL, vertice_id INT NOT NULL, PRIMARY KEY(grafo_id, vertice_id))');
        $this->addSql('CREATE INDEX IDX_723AB5BFEB6412AC ON grafo_vertice (grafo_id)');
        $this->addSql('CREATE INDEX IDX_723AB5BF9CEA738B ON grafo_vertice (vertice_id)');
        $this->addSql('CREATE TABLE grafo_aresta (grafo_id INT NOT NULL, aresta_id INT NOT NULL, PRIMARY KEY(grafo_id, aresta_id))');
        $this->addSql('CREATE INDEX IDX_274847A7EB6412AC ON grafo_aresta (grafo_id)');
        $this->addSql('CREATE INDEX IDX_274847A7194C1C2 ON grafo_aresta (aresta_id)');
        $this->addSql('CREATE TABLE localidade (id SERIAL NOT NULL, regiao INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pedido (id SERIAL NOT NULL, destino_id INT DEFAULT NULL, tipo VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C4EC16CEE4360615 ON pedido (destino_id)');
        $this->addSql('CREATE TABLE vertice (id SERIAL NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE aresta ADD CONSTRAINT FK_DAD1F2F781E73123 FOREIGN KEY (origem_id) REFERENCES vertice (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE aresta ADD CONSTRAINT FK_DAD1F2F7E4360615 FOREIGN KEY (destino_id) REFERENCES vertice (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE grafo_vertice ADD CONSTRAINT FK_723AB5BFEB6412AC FOREIGN KEY (grafo_id) REFERENCES grafo (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE grafo_vertice ADD CONSTRAINT FK_723AB5BF9CEA738B FOREIGN KEY (vertice_id) REFERENCES vertice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE grafo_aresta ADD CONSTRAINT FK_274847A7EB6412AC FOREIGN KEY (grafo_id) REFERENCES grafo (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE grafo_aresta ADD CONSTRAINT FK_274847A7194C1C2 FOREIGN KEY (aresta_id) REFERENCES aresta (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEE4360615 FOREIGN KEY (destino_id) REFERENCES localidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE grafo_aresta DROP CONSTRAINT FK_274847A7194C1C2');
        $this->addSql('ALTER TABLE grafo_vertice DROP CONSTRAINT FK_723AB5BFEB6412AC');
        $this->addSql('ALTER TABLE grafo_aresta DROP CONSTRAINT FK_274847A7EB6412AC');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CEE4360615');
        $this->addSql('ALTER TABLE aresta DROP CONSTRAINT FK_DAD1F2F781E73123');
        $this->addSql('ALTER TABLE aresta DROP CONSTRAINT FK_DAD1F2F7E4360615');
        $this->addSql('ALTER TABLE grafo_vertice DROP CONSTRAINT FK_723AB5BF9CEA738B');
        $this->addSql('DROP TABLE aresta');
        $this->addSql('DROP TABLE grafo');
        $this->addSql('DROP TABLE grafo_vertice');
        $this->addSql('DROP TABLE grafo_aresta');
        $this->addSql('DROP TABLE localidade');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE vertice');
    }
}
