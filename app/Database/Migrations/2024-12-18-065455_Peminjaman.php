<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peminjam' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nisn' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'id_buku' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'tanggal_pinjam' => [
                'type' => 'DATE',
            ],
            'batas_pengembalian' => [
                'type' => 'DATE',
            ],
        ]);

        // Add Primary Key
        $this->forge->addKey('id_peminjam', true);

        // Add Foreign Keys
        $this->forge->addForeignKey('nisn', 'members', 'nisn', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_buku', 'books', 'id_buku', 'CASCADE', 'CASCADE');

        // Create Table
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        // Drop Table
        $this->forge->dropTable('peminjaman');
    }
}
