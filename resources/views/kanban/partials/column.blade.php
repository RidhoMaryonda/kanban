<div class="kanban-column" data-column-id="{{ $column->id }}">

    {{-- Header --}}
    <div class="kanban-column-header"
         style="background: {{ $column->color ?? '#3b82f6' }}">
        <span>{{ strtoupper($column->name) }}</span>
        <span class="ticket-count">{{ $column->tickets->count() }}</span>
    </div>

    {{-- Body --}}
    <div class="kanban-column-body" data-column-id="{{ $column->id }}">
        @foreach ($column->tickets as $ticket)
            @include('kanban.partials.ticket', ['ticket' => $ticket])
        @endforeach
    </div>

    {{-- Footer --}}
    <button class="add-ticket" data-column-id="{{ $column->id }}">
        + Tambah Ticket
    </button>

</div>
