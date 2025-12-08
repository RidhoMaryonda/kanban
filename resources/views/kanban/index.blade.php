@extends('layouts.app')

@section('content')

{{-- ============================= --}}
{{-- CSS LANGSUNG DI FILE INI --}}
{{-- ============================= --}}
<style>
    .kanban-wrapper {
        display: flex;
        gap: 24px;
        padding: 20px;
        overflow-x: auto;
        align-items: flex-start;
        width: 100%;
    }

    .kanban-column {
        width: 280px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        flex-shrink: 0;
    }

    .kanban-column-header {
        padding: 14px;
        font-size: 16px;
        font-weight: bold;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .kanban-column-body {
        padding: 16px;
        min-height: 120px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .ticket-item {
        background: #ffffff;
        padding: 12px 14px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.07);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: 0.15s;
    }

    .ticket-item:hover {
        transform: scale(1.02);
    }

    .delete-ticket {
        background: #f44336;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 2px 8px;
        cursor: pointer;
        font-weight: bold;
    }

    .add-ticket {
        width: 100%;
        padding: 14px;
        font-weight: 600;
        background: #f8fafc;
        border: none;
        border-top: 1px solid #e5e7eb;
        cursor: pointer;
        transition: background 0.15s ease;
    }

    .add-ticket:hover {
        background: #f1f5f9;
    }
</style>



{{-- ============================= --}}
{{-- KANBAN BOARD --}}
{{-- ============================= --}}
<div class="kanban-wrapper">

    @foreach ($columns as $column)
    <div class="kanban-column" data-column-id="{{ $column->id }}">

        {{-- Header --}}
        <div class="kanban-column-header" style="background: {{ $column->color ?? '#4F46E5' }}">
            <span>{{ strtoupper($column->name) }}</span>
            <span class="ticket-count">{{ $column->tickets->count() }}</span>
        </div>

        {{-- Body --}}
        <div class="kanban-column-body" data-column-id="{{ $column->id }}">
            @foreach ($column->tickets as $ticket)
                <div class="ticket-item" data-ticket-id="{{ $ticket->id }}">
                    <span>{{ $ticket->title }}</span>
                    <button class="delete-ticket" data-id="{{ $ticket->id }}">X</button>
                </div>
            @endforeach
        </div>

        {{-- Add Ticket Button --}}
        <button class="add-ticket" data-column-id="{{ $column->id }}">
            + Tambah Ticket
        </button>

    </div>
    @endforeach

</div>

@endsection



{{-- ============================= --}}
{{-- JAVASCRIPT --}}
{{-- ============================= --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>

document.addEventListener("DOMContentLoaded", () => {

    /* ======================================
       DRAG & DROP
    ====================================== */
    document.querySelectorAll(".kanban-column-body").forEach(column => {
        new Sortable(column, {
            group: "kanban",
            animation: 150,

            onEnd: async (evt) => {
                let ticketId = evt.item.dataset.ticketId;
                let newColumnId = evt.to.dataset.columnId;

                await fetch("/kanban/update", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        id: ticketId,
                        kanban_column_id: newColumnId
                    })
                });

                updateCounts();
            }
        });
    });



    /* ======================================
       ADD TICKET
    ====================================== */
    document.querySelectorAll(".add-ticket").forEach(button => {
        button.addEventListener("click", async () => {

            let colId = button.dataset.columnId;
            let title = prompt("Masukkan judul ticket:");

            if (!title) return;

            let response = await fetch("/kanban/ticket", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    title: title,
                    kanban_column_id: colId
                })
            });

            let ticket = await response.json();

            const targetBody = button.parentElement.querySelector(".kanban-column-body");

            targetBody.insertAdjacentHTML("beforeend", `
                <div class="ticket-item" data-ticket-id="${ticket.id}">
                    <span>${ticket.title}</span>
                    <button class="delete-ticket" data-id="${ticket.id}">X</button>
                </div>
            `);

            updateCounts();
        });
    });



    /* ======================================
       DELETE TICKET
    ====================================== */
    document.addEventListener("click", async (e) => {
        if (e.target.classList.contains("delete-ticket")) {

            let id = e.target.dataset.id;

            await fetch("/kanban/ticket/" + id, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            });

            e.target.closest(".ticket-item").remove();

            updateCounts();
        }
    });



    /* ======================================
       UPDATE JUMLAH TICKET PER KOLOM
    ====================================== */
    function updateCounts() {
        document.querySelectorAll(".kanban-column").forEach(col => {
            const count = col.querySelectorAll(".ticket-item").length;
            col.querySelector(".ticket-count").textContent = count;
        });
    }

});
</script>

@endpush
