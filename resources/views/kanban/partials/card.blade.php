<div class="bg-gray-50 border rounded-lg p-3 shadow-sm cursor-move" data-id="{{ $ticket->id }}">
    <p class="font-semibold">{{ $ticket->title }}</p>

    @if ($ticket->description)
        <p class="text-sm text-gray-500 mt-1">{{ $ticket->description }}</p>
    @endif
</div>
