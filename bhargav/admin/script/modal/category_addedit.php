<!-- Modal -->
<?php
$id = $_GET['id'];

if ($id != '') {
    include '../../../conection/config.php';

    $sql = "SELECT * FROM category WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        $row = array();
    }
} else {
    $row = array();
}
?>
<div class="modal fade" id="category_model_open" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Category AddEdit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="category_form" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                    <div class="form-group col-md-12">
                        <label for="inputField">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="selectField">Select Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Active" <?php echo (isset($row['status']) && $row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?php echo (isset($row['status']) && $row['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary category_modal_submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
