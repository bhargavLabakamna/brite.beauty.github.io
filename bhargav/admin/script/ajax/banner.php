<?php
// Include database connection
include '../../../conection/config.php';

$actionType = $_POST['actionType'];


// -------------------- LOAD DATATABLE --------------------

if($actionType == 'bannerList')
{
    $requestData = $_REQUEST;
    $primaryKey = 'id';

    $sql = "SELECT * FROM banner WHERE status != 'Trash'";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {

        $delete_btn = '<button type="button" data-id="'.$row['id'].'" class="btn btn-danger banner_delete_onclick"><i class="fas fa-trash"></i></button>';
        $edit_btn = '<button type="button" data-id="'.$row['id'].'" class="btn btn-primary add_banner"><i class="fas fa-edit"></i></button>';
        $option = $edit_btn .' '. $delete_btn;
        if($row['status'] == 'Active'){
            $status = '<span class="btn btn-sucess">Active</span>';
        } else {
            $status = '<span class="btn btn-danger">Inactive</span>';
        }

        $data[] = array(
            "id" => $row['id'],
            "name" => $row['name'],
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

// if($actionType == 'bannerAddEdit')
// {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $link = $_POST['link'];
//     $status = $_POST['status'];

//     if (isset($_FILES['image'])) 
//     {
//         $targetDir = "../../../upload/banner/";
//         $targetFile = $targetDir . basename($_FILES["image"]["name"]);
//         $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//         $image = move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
//     }
    
//     if($id!='')
//     {
//         $sql = "UPDATE banner SET image='$image', name='$name', link='$link', status='$status' WHERE id=$id";
//         $conn->query($sql);
//     }
//     else
//     {
//         $sql = "INSERT INTO banner (image, name, link, status) VALUES ('$image', '$name', '$link','$status')";
//         $id = $conn->query($sql);
//     }

//     $result = array(
//         "message" => 'Banner Added Success',
//         "msgcode" => 1
//     );

// }

if ($actionType == 'bannerAddEdit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $status = $_POST['status'];

    if (isset($_FILES['image'])) {
        $targetDir = "../../../upload/banner/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $imageFileName = uniqid() . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $imageFileName)) {
            $image = $imageFileName;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $image = "";
    }

    if ($id != '') {
        $sql = "UPDATE banner SET image='$image', name='$name', link='$link', status='$status' WHERE id=$id";
        $conn->query($sql);
    } else {
        $sql = "INSERT INTO banner (image, name, link, status) VALUES ('$image', '$name', '$link', '$status')";
        $id = $conn->query($sql);
    }

    $result = array(
        "message" => 'Banner Added Success',
        "msgcode" => 1
    );
}


// ----------------------------------------



// -------------------- SINGLE DELETE --------------------

if($actionType == 'banner_delete')
{
    $id = $_POST['id'];
    if($id!='')
    {
        $sql = "UPDATE banner SET status='Trash' WHERE id=$id";
        $conn->query($sql);

        $result = array(
            "message" => 'Banner Deleted Success',
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
