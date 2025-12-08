<div class="modal fade" id="addTicketModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('kanban.tickets.store') }}">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Add Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="kanban_column_id" id="add_column_id">

                <label>Title</label>
                <input name="title" class="form-control mb-2" required>

                <label>Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal(columnId) {
    document.getElementById("add_column_id").value = columnId;
    new bootstrap.Modal(document.getElementById("addTicketModal")).show();
}
</script>
