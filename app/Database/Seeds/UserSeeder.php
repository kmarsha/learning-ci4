<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'firstName' => 'Admin',
                'lastName' => '001',
                'username' => 'admin1',
                'password' => password_hash('pass', PASSWORD_BCRYPT),
                'role' => 'admin',
            ],
            [
                'firstName' => 'Admin',
                'lastName' => '002',
                'username' => 'admin2',
                'password' => password_hash('pass', PASSWORD_BCRYPT),
                'role' => 'admin',
            ],
        ];

        $model = new UserModel();

        $model->insertBatch($data);
    }
}
