<?php
// include '../../conection/config.php';

// // $actionType = $_POST['actionType'];

// // if($actionType == 'galleryWithCategory')
// // {
//     $id = $_POST['categoryId'];
//     $sql = "SELECT * FROM gallery WHERE status = 'Active' and category_id=$id";
// 	$gallery = $conn->query($sql);

//     $gallery = array();
// if ($galleryResult->num_rows > 0) {
//     while ($row = $galleryResult->fetch_assoc()) {
//         $gallery[] = $row; // Append each row to the $gallery array
//     }
// }

//     $result = array(
//         "message" => '123 Added Success',
//         "msgcode" => 1,
//         "gallery" => $gallery
//     );
// // }

// echo json_encode($result);

?>
<?php
include '../../conection/config.php';

$id = $_POST['categoryId']; // Assuming you're sending categoryId via POST

$sql = "SELECT * FROM gallery WHERE status = 'Active' and category_id = $id";
$galleryResult = $conn->query($sql);

$gallery = array();
if ($galleryResult->num_rows > 0) {
    while ($row = $galleryResult->fetch_assoc()) {
        $html = '<div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first">';
        $html .= '<div class="portfolio-wrap" style="height: 240px; wedth=350;">';
        $html .= '<a href="../upload/gallery/' . $row['image'] . '" data-lightbox="portfolio">';
        $html .= '<img src="../upload/gallery/' . $row['image'] . '" alt="Portfolio Image">';
        $html .= '</a>';
        $html .= '</div>';
        $html .= '</div>';
        
        $gallery[] = $html; // Append the HTML to the $gallery array
    }
}

$result = array(
    "message" => "123 Added Success",
    "msgcode" => 1,
    "gallery" => $gallery
);

echo json_encode($result);
?>
