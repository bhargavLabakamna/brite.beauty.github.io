<?php
    include('../include/header.php');
    include '../conection/config.php';

    $sql = "SELECT * FROM gallery WHERE status = 'Active' and category_id = 2";
	$gallery = $conn->query($sql);

    $sql = "SELECT * FROM category WHERE status = 'Active'";
	$category = $conn->query($sql);
?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Gallery</h2>
                </div>
                <div class="col-12">
                    <a href="home">Home</a>
                    <a href="">Gallery</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Portfolio Start -->
    <div class="portfolio">
        <div class="container">
            <div class="section-header text-center">
                <p>Barber Image Gallery</p>
                <h2>Some Images From Our Barber Gallery</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul id="portfolio-flters">
                    <?php if ($category->num_rows > 0) {
                        while ($cat = $category->fetch_assoc()) { ?>
                        <li data-filter=".first" class="getCategory" data-id="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></li>
                    <?php } } else { echo "No Category Found."; } ?>
                    </ul>
                </div>
            </div>
            <div class="row galleryImage">
                <?php if ($gallery->num_rows > 0) {
                    while ($row = $gallery->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first">
                    <div class="portfolio-wrap" style="height: 240px; wedth=350;">
                        <a href="../upload/gallery/<?php echo $row['image']; ?>" data-lightbox="portfolio">
                            <img src="../upload/gallery/<?php echo $row['image']; ?>" alt="Portfolio Image">
                        </a>
                    </div>
                </div>
                <?php } } else { echo "No images found."; } ?>
            </div>
        </div>
    </div>
<?php
    include('../include/footer.php');
?>

