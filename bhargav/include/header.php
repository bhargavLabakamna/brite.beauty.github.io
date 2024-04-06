<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    if($currentPage == 'index.php'){
        $meta_title = "Home | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'about.php'){
        $meta_title = "About | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'service.php'){
        $meta_title = "Service | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'price.php'){
        $meta_title = "Price | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'team.php'){
        $meta_title = "Team | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'portfolio.php'){
        $meta_title = "Portfolio | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'blog.php'){
        $meta_title = "Blog | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'single.php'){
        $meta_title = "Single | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else if($currentPage == 'contact.php'){
        $meta_title = "Contact | Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    } else {
        $meta_title = "Brite Beauty Parlour";
        $meta_keywords ="Brite Beauty Parlour";
        $meta_description = "Brite Beauty Parlour";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $meta_title; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="<?php echo $meta_keywords; ?>" name="keywords">
        <meta content="<?php echo $meta_description; ?>" name="description">

        <!-- Favicon -->
        <link href="../assets/img/logo.jpg" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-bar-left">
                            <div class="text">
                                <h2>8:00 - 9:00</h2>
                                <p>Opening Hour Mon - Fri</p>
                            </div>
                            <div class="text">
                                <h2>6354051301</h2>
                                <p>Call Us For Appointment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="home" class="navbar-brand">Brite Beauty</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <!-- <a href="index.php" class="nav-item nav-link active">Home</a> -->
                        
                        <?php if($currentPage == 'index.php'){ ?>
                            <a href="home" class="nav-item nav-link active">Home</a>
                        <?php } else { ?>
                            <a href="home" class="nav-item nav-link">Home</a>
                        <?php } 
                        
                        if($currentPage == 'about.php'){ ?>
                            <a href="about" class="nav-item nav-link active">About</a>
                        <?php } else { ?>
                            <a href="about" class="nav-item nav-link">About</a>
                        <?php } 

                        if($currentPage == 'service.php'){ ?>
                            <a href="service" class="nav-item nav-link active">Service</a>
                        <?php } else { ?>
                            <a href="service" class="nav-item nav-link">Service</a>
                        <?php } 
                        
                        if($currentPage == 'price.php'){ ?>
                            <a href="price" class="nav-item nav-link active">Price</a>
                        <?php } else { ?>
                            <a href="price" class="nav-item nav-link">Price</a>
                        <?php } 
                        
                        if($currentPage == 'team.php'){ ?>
                            <a href="team" class="nav-item nav-link active">Barber</a>
                        <?php } else { ?>
                            <a href="team" class="nav-item nav-link">Barber</a>
                        <?php } 
                        
                        if($currentPage == 'portfolio.php'){ ?>
                            <a href="portfolio" class="nav-item nav-link active">Gallery</a>
                        <?php } else { ?>
                            <a href="portfolio" class="nav-item nav-link">Gallery</a>
                        <?php } ?>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="blog" class="dropdown-item">Blog Page</a>
                                <a href="single" class="dropdown-item">Single Page</a>
                            </div>
                        </div>

                        <?php if($currentPage == 'contact.php'){ ?>
                            <a href="contact" class="nav-item nav-link active">Contact</a>
                        <?php } else { ?>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->