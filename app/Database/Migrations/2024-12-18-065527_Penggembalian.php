<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengembalian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengembali' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_peminjam' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'tanggal_pengembalian' => [
                'type' => 'DATE',
            ],
        ]);

        // Add Primary Key
        $this->forge->addKey('id_pengembali', true);

        // Add Foreign Key
        $this->forge->addForeignKey('id_peminjam', 'peminjaman', 'id_peminjam', 'CASCADE', 'CASCADE');

        // Create Table
        $this->forge->createTable('pengembalian');
    }

    public function down()
    {
        // Drop Table
        $this->forge->dropTable('pengembalian');
    }
}
