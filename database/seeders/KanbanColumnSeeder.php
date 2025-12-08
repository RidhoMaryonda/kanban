<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KanbanColumnSeeder extends Seeder
{
    public function run()
    {
        DB::table('kanban_columns')->insert([
            ['name' => 'NEW', 'sort_order' => 1],
            ['name' => 'IN PROGRESS', 'sort_order' => 2],
            ['name' => 'DONE', 'sort_order' => 3],
            ['name' => 'WAITING', 'sort_order' => 4],
            ['name' => 'PENDING', 'sort_order' => 5],
        ]);
    }
}
