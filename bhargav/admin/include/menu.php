<?php
include('../../conection/config.php');
$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch all rows as an associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Use a for loop to iterate through each row
    for ($i = 0; $i < count($rows); $i++) {
        echo "Name: " . $rows[$i]["name"] . "<br>";
        
    }
} else {
    echo "0 results";
    exit;
}
?>


<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <div class="user-section">
                    <!-- <div class="user-section-inner">
                        <img src="../assets/img/user.jpg" alt="">
                    </div> -->
                    <div class="user-section-innecr">
                        <img src="../assets/img/user.jpg" alt="" style="width: 100px; height: 100px;">
                    </div>

                    <div class="user-info">
                    <?php for ($i = 0; $i < count($rows); $i++) { ?>
                            <div><?php echo $rows[$i]["name"]; ?></strong></div>
                      <?php  } ?>

                    </div>
                </div>
            </li>
            
            <!-- <li class="selected"> -->
            <li>
                <a href="index"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="banner"><i class="fa-regular fa-image"></i> Banner</a>
            </li>
            <li>
                <a href="category"><i class="fa fa-list fa-fw"></i> Category</a>
            </li>
            <li>
                <a href="gallery"><i class="fa fa-th-large"></i> Gallery</a>
            </li>
            <li>
                <a href="contact"><i class="fa-regular fa-envelope"></i> Contact Enquiry</a>
            </li>
            <li>
                <a href="home-detail"><i class="fa-regular fa-envelope"></i> Home Detail</a>
            </li>
            <li>
                <a href="business-info"><i class="fa-regular fa-envelope"></i> Business Info</a>
            </li>
        </ul>
    </div>
</nav>
