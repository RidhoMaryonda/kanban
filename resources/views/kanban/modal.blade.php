<!-- ticket modal -->
<div id="ticket-modal" class="fixed inset-0 hidden items-center justify-center z-50">
    <div class="absolute inset-0 modal-backdrop" aria-hidden="true"></div>

    <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-2xl z-50">
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 id="modal-title" class="text-lg font-semibold">Add Ticket</h3>
            <button id="modal-close" class="text-gray-500 hover:text-gray-800">✕</button>
        </div>

        <form id="ticket-form" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input id="ticket-title" name="title" type="text" class="mt-1 block w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="ticket-description" name="description" rows="4" class="mt-1 block w-full border rounded px-3 py-2"></textarea>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Priority</label>
                    <select id="ticket-priority" name="priority" class="mt-1 block w-full border rounded px-2 py-2">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input id="ticket-deadline" name="deadline" type="date" class="mt-1 block w-full border rounded px-2 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Column</label>
                    <select id="ticket-column" name="kanban_column_id" class="mt-1 block w-full border rounded px-2 py-2">
                        @foreach($columns as $col)
                            <option value="{{ $col->id }}">{{ $col->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-4">
                <button id="modal-cancel" type="button" class="px-4 py-2 border rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>
