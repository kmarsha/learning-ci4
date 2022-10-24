<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class UsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'firstName' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'lastName' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('user_id');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
