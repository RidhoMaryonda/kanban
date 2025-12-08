<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run()
    {
        DB::table('kanban_tickets')->insert([
            [
                'title' => 'Belajar Laravel',
                'description' => 'Mempelajari dasar Laravel',
                'kanban_column_id' => 1
            ],
            [
                'title' => 'Membuat Kanban Board',
                'description' => 'Mengerjakan project',
                'kanban_column_id' => 2
            ],
        ]);
    }
}
