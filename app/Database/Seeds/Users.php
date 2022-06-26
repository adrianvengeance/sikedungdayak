<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        //// insert 1 data
        // $data = [
        //     'name' => 'Administrator',
        //     'username' => 'admin',
        //     'password' => password_hash('admin12345', PASSWORD_BCRYPT),
        // ];
        // $this->db->table('users')->insert($data);

        //// insert multi data
        // $data = [
        //     [
        //         'name' => 'Administrator',
        //         'username' => 'admin',
        //         'password' => password_hash('admin12345', PASSWORD_BCRYPT),
        //     ],
        //     [
        //         'name' => 'Administrator',
        //         'username' => 'admin',
        //         'password' => password_hash('admin12345', PASSWORD_BCRYPT),
        //     ],

        // ];
        // $this->db->table('users')->insertBatch($data);
    }
}
