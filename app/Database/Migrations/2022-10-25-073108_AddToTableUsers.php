<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddToTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'username' => [
                'type' => 'varchar',
                'constraint' => 50,
                'unique' => true,
                'after' => 'lastName',
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
                'after' => 'username',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
