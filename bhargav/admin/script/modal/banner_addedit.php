<!-- Modal -->
<?php
$id = $_GET['id'];

if ($id != '') {
    include '../../../conection/config.php';

    $sql = "SELECT * FROM banner WHERE id = $id";
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
<div class="modal fade" id="banner_model_open" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Banner AddEdit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="banner_form" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                    <div class="form-group col-md-12">
                        <label for="inputField">Image</label> 
                        <input type="file" class="form-control" name="image" />
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputField">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputField">Link</label>
                        <input type="text" class="form-control" id="link" name="link"  value="<?php echo isset($row['link']) ? $row['link'] : ''; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="selectField">Select Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive 2</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary banner_modal_submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
