<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KanbanTicket;
use App\Models\KanbanColumn;

class KanbanController extends Controller
{
    public function index()
    {
        $columns = KanbanColumn::with('tickets')->orderBy('position')->get();
        return view('kanban.index', compact('columns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kanban_column_id' => 'required|integer|exists:kanban_columns,id',
        ]);

        $ticket = KanbanTicket::create([
            'title' => $request->title,
            'kanban_column_id' => $request->kanban_column_id,
        ]);

        return response()->json($ticket);
    }

    public function updateTicket(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|integer|exists:kanban_tickets,id',
            'kanban_column_id' => 'required|integer|exists:kanban_columns,id',
        ]);

        $ticket = KanbanTicket::findOrFail($request->ticket_id);
        $ticket->kanban_column_id = $request->kanban_column_id;
        $ticket->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $ticket = KanbanTicket::findOrFail($id);
        $ticket->delete();

        return response()->json(['success' => true]);
    }

    public function updateColor(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:kanban_columns,id',
            'color' => 'required|string'
        ]);

        $col = KanbanColumn::findOrFail($request->id);
        $col->color = $request->color;
        $col->save();

        return response()->json(['success' => true]);
    }
}
