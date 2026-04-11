<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBranchToUsers extends Migration
{
    public function up()
    {
        // Add branch column to users table
        $this->forge->addColumn('users', [
            'branch' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'default'    => null,
                'after'      => 'position',
            ],
        ]);

        // Add branch column to maintanance table (no user_id FK, so store branch directly)
        $this->forge->addColumn('maintanance', [
            'branch' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'default'    => null,
                'after'      => 'suggestion',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'branch');
        $this->forge->dropColumn('maintanance', 'branch');
    }
}
