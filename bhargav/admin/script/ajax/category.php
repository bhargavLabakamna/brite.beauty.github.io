<?php
// Include database connection
include '../../../conection/config.php';

$actionType = $_POST['actionType'];


// -------------------- LOAD DATATABLE --------------------

if($actionType == 'categoryList')
{
    $requestData = $_REQUEST;
    $primaryKey = 'id';

    $sql = "SELECT * FROM category WHERE status != 'Trash'";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {

        $delete_btn = '<button type="button" data-id="'.$row['id'].'" class="btn btn-danger category_delete_onclick"><i class="fas fa-trash"></i></button>';
        $edit_btn = '<button type="button" data-id="'.$row['id'].'" class="btn btn-primary add_category"><i class="fas fa-edit"></i></button>';
        $option = $edit_btn .' '. $delete_btn;
        if($row['status'] == 'Active'){
            $status = '<span class="badge badge-success">Active</span>';
        } else {
            $status = '<span class="badge badge-danger">Inactive</span>';
        }
        // $date = date("d-m-Y h:i A", strtotime($row['created_at']));
        $date = date("d-m-Y", strtotime($row['created_at'])) . '<br/>' . date("h:i A", strtotime($row['created_at']));

        $data[] = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "status" => $status,
            "created_at" => $date,
            "action" => $option
        );
    }

    $conn->close();

    $result = array(
        "draw" => intval($requestData['draw']),
        "recordsTotal" => count($data),
        "recordsFiltered" => count($data),
        "data" => $data
    );

}

// ----------------------------------------



// -------------------- ADD EDIT RECORDS --------------------

if ($actionType == 'categoryAddEdit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];

    if ($id != '') {
        $sql = "UPDATE category SET name='$name', status='$status' WHERE id=$id";
        $conn->query($sql);
    } else {
        $sql = "INSERT INTO category (name, status) VALUES ('$name', '$status')";
        $id = $conn->query($sql);
    }

    $result = array(
        "message" => 'Category Added Success',
        "msgcode" => 1
    );
}


// ----------------------------------------



// -------------------- SINGLE DELETE --------------------

if($actionType == 'category_delete')
{
    $id = $_POST['id'];
    if($id!='')
    {
        $sql = "UPDATE category SET status='Trash' WHERE id=$id";
        $conn->query($sql);

        $result = array(
            "message" => 'Category Deleted Success',
            "msgcode" => 1
        );
    }
    $result = array(
        "message" => 'Something Went Wrong',
        "msgcode" => 0
    );    
}

// ----------------------------------------

echo json_encode($result);
?>
