<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanbanTicket extends Model
{
    protected $fillable = ['kanban_column_id', 'title', 'position'];

    public function column()
    {
        return $this->belongsTo(KanbanColumn::class);
    }
}
