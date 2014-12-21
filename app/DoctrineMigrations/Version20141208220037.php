<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141208220037 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('CREATE TABLE test_migrate_table (id INT NOT NULL, test_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE test_migrate_table');
    }
}
