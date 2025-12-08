<div class="modal fade" id="editTicketModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editTicketForm" class="modal-content" method="POST">
            @csrf @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Ticket</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <label>Title</label>
                <input id="edit_title" name="title" class="form-control mb-2">

                <label>Description</label>
                <textarea id="edit_description" name="description" class="form-control"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning">Update</button>
            </div>

        </form>
    </div>
</div>

<script>
function openEditModal(id, title, desc) {
    document.getElementById("edit_title").value = title;
    document.getElementById("edit_description").value = desc;

    let form = document.getElementById("editTicketForm");
    form.action = "/kanban/tickets/" + id;

    new bootstrap.Modal(document.getElementById("editTicketModal")).show();
}
</script>
