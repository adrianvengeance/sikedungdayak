<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lapak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'           => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'gambar'           => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'harga'       => [
                'type'       => 'decimal',
                'constraint' => '6',
            ],
            'no_wa'       => [
                'type'       => 'varcar',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('lapak');
    }

    public function down()
    {
        $this->forge->dropTable('lapak');
    }
}
