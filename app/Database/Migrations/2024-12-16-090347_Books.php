<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
        $this->forge->addField([
            
            'id_buku' => [
                'type'       => 'INT ',
                'constraint' =>   5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun_terbit ' => [
                'type'       => 'year',
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 6,
            ]
            
        ]);
        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('books'); 
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
