<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Members extends Migration
{
    public function up()
    {
        $this->forge->addField([
            
            'nisn' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '2',
            ],
            'kota_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_lahir' => [
                'type'       => 'date',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
            
        ]);
        $this->forge->addKey('nisn', true);
        $this->forge->createTable('members'); 
    }

    public function down()
    {
        $this->forge->dropTable('members');
    }
}
