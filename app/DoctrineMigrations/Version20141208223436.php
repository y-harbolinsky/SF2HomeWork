<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141208223436 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('test2');
        $table->addColumn('firstName1', 'string');
        $table->addColumn('firstName2', 'string');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('test2');
    }
}
