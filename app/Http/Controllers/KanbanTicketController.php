<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KanbanTicket;

class KanbanTicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kanban_column_id' => 'required',
            'title' => 'required'
        ]);

        KanbanTicket::create([
            'kanban_column_id' => $request->kanban_column_id,
            'title' => $request->title,
            'description' => $request->description,
            'position' => 999
        ]);

        return back()->with('success', 'Ticket created');
    }


    public function update(Request $request, $id)
    {
        $ticket = KanbanTicket::findOrFail($id);

        $ticket->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back()->with('success', 'Ticket updated');
    }


    public function destroy($id)
    {
        KanbanTicket::findOrFail($id)->delete();
        return back()->with('success', 'Ticket deleted');
    }
}
