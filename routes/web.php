<?php

use App\Http\Controllers\KanbanController;

Route::get('/kanban', [KanbanController::class, 'index'])->name('kanban.index');
Route::post('/kanban/ticket', [KanbanController::class, 'store'])->name('kanban.ticket.store');
Route::post('/kanban/update', [KanbanController::class, 'updateTicket']);
Route::delete('/kanban/ticket/{id}', [KanbanController::class, 'destroy'])->name('kanban.ticket.destroy');
Route::post('/kanban/color', [KanbanController::class, 'updateColor']);




