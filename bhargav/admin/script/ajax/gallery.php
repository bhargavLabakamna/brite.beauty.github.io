<?php
// Include database connection
include '../../../conection/config.php';

$actionType = $_POST['actionType'];


// -------------------- LOAD DATATABLE --------------------

if($actionType == 'galleryList')
{
    $requestData = $_REQUEST;
    $primaryKey = 'id';

    // $sql = "SELECT * FROM gallery WHERE status != 'Trash'";
    $sql = "SELECT g.*, c.name as category_name 
            FROM gallery g 
            LEFT JOIN category c ON g.category_id = c.id
            WHERE g.status != 'Trash'";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {

        $delete_btn = '<button type="button" data-id="'.$row['id'].'" class="btn btn-danger gallery_delete_onclick"><i class="fas fa-trash"></i></button>';
        // $edit_btn = '<button type="button" data-id="'.$row['id'].'" class="btn btn-primary add_gallery"><i class="fas fa-edit"></i></button>';
        $option = $delete_btn;
        if($row['status'] == 'Active'){
            $status = '<span class="btn btn-sucess">Active</span>';
        } else {
            $status = '<span class="btn btn-danger">Inactive</span>';
        }

        $data[] = array(
            "id" => $row['id'],
            "name" => $row['category_name'],
            "status" => $status,
            "created_at" => $row['created_at'],
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

if ($actionType == 'galleryAddEdit') {
    $id = $_POST['id'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    if (isset($_FILES['image'])) {
        $targetDir = "../../../upload/gallery/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $imageFileName = uniqid() . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $imageFileName)) {
            $image = $imageFileName;
        } else {
            $image = '';
        }
    } else {
        $image = '';
    }

    if ($id != '') {
        $sql = "UPDATE gallery SET image='$image', category_id='$category_id', status='$status' WHERE id=$id";
        $conn->query($sql);
    } else {
        $sql = "INSERT INTO gallery (image, category_id, status) VALUES ('$image', '$category_id', '$status')";
        $id = $conn->query($sql);
    }

    $result = array(
        "message" => 'gallery Added Success',
        "msgcode" => 1
    );
}


// ----------------------------------------



// -------------------- SINGLE DELETE --------------------

if($actionType == 'gallery_delete')
{
    $id = $_POST['id'];
    if($id!='')
    {
        $sql = "UPDATE gallery SET status='Trash' WHERE id=$id";
        $conn->query($sql);

        $result = array(
            "message" => 'gallery Deleted Success',
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
