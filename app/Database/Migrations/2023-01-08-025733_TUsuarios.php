<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('t_usuario');
    }

    public function down()
    {
        $this->forge->dropTable('t_usuario');
    }
}

