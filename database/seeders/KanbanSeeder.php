<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KanbanColumn;
use App\Models\KanbanTicket;

class KanbanSeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama
        KanbanTicket::truncate();
        KanbanColumn::truncate();

        // Buat kolom
        $columns = [
            ['name' => 'New', 'position' => 0],
            ['name' => 'In Progress', 'position' => 1],
            ['name' => 'Done', 'position' => 2],
            ['name' => 'Waiting', 'position' => 3],
            ['name' => 'Pending', 'position' => 4],
        ];

        foreach ($columns as $col) {
            KanbanColumn::create($col);
        }

        // Ticket contoh
        KanbanTicket::create([
            'title' => 'Testing',
            'description' => 'Task example',
            'kanban_column_id' => 1,
            'position' => 0
        ]);

        KanbanTicket::create([
            'title' => 'Testing 2',
            'description' => 'Second task',
            'kanban_column_id' => 3,
            'position' => 0
        ]);
    }
}
