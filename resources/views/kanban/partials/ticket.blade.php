<div class="ticket-item p-3 bg-white shadow rounded flex justify-between items-center"
     data-ticket-id="{{ $ticket->id }}">

    <span>{{ $ticket->title }}</span>

    <button class="delete-ticket text-red-500 font-bold" data-id="{{ $ticket->id }}">
        X
    </button>

</div>
