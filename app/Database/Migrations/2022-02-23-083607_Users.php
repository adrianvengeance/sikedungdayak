<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'           => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null'       => true
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true
            ],
            'password'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'info_user'         => [
                'type'          => 'TEXT',
                'null'          => true,
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
