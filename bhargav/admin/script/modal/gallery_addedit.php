<!-- Modal -->
<?php
$id = $_GET['id'];

include '../../../conection/config.php';

if ($id != '') {
    
    $sql = "SELECT * FROM gallery WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        $row = array();
    }
} else {
    $row = array();
}

$sql = "SELECT  id, name FROM category WHERE status = 'Active'";
$category = $conn->query($sql);

?>
<div class="modal fade" id="gallery_model_open" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Gallery AddEdit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="gallery_form" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                    <div class="form-group col-md-12">
                        <label for="selectField">Select Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <?php
                            if ($category->num_rows > 0) {
                                while ($cat_row = $category->fetch_assoc()) {
                                    $selected = isset($row['category_id']) ? ($row['category_id'] == $cat_row['id']) ? 'selected' : '' : '';
                                    echo '<option value="' . $cat_row['id'] . '" ' . $selected . '>' . $cat_row['name'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No categories found</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputField">Image</label> 
                        <input type="file" class="form-control" name="image" />
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
                    <button type="button" class="btn btn-primary gallery_modal_submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
