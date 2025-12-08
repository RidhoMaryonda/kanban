<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanbanColumn extends Model
{
    protected $fillable = ['name', 'position', 'color'];

    public function tickets()
    {
        return $this->hasMany(KanbanTicket::class)->orderBy('position');
    }
}
