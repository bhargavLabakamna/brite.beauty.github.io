<?php
// Include database connection
include '../../../conection/config.php';

// Datatables request
$requestData = $_REQUEST;
// Define the primary key
$primaryKey = 'id';

// SQL query
$sql = "SELECT * FROM contact_inquiry";
$result = $conn->query($sql);

// Process query results
$data = array();
while ($row = $result->fetch_assoc()) {

    $edit_btn = '<button type="button"" data-id="' . $row['id'] . '" class="btn btn-primary page-header delete_contact_inquiry"><i class="fas fa-edit"></i></button>';
    $delete_btn = '<button type="button"" data-id="' . $row['id'] . '" class="btn btn-danger page-header delete_contact_inquiry"><i class="fas fa-trash"></i></button>';
    $btn = $edit_btn . ' ' . $delete_btn;

    $data[] = array(

        "id" => $row['id'],
        "name" => $row['name'],
        "email" => $row['email'],
        "subject" => $row['subject'],
        "message" => $row['message'],
        "action" =>$btn
    );
}

// Close the database connection
$conn->close();

// Send the JSON response
$json_data = array(
    "draw" => intval($requestData['draw']),
    "recordsTotal" => count($data),
    "recordsFiltered" => count($data),
    "data" => $data
);

echo json_encode($json_data);
?>
