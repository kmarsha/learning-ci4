<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleToTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'role' => [
                'type' => 'enum',
                'constraint' => ['admin', 'employee'],
                'default' => 'employee',
                'after' => 'password',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
