<?php
    include('../include/header.php');
    
?>

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Contact</h2>
                    </div>
                    <div class="col-12">
                        <a href="home">Home</a>
                        <a href="">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="section-header text-center" style="margin-top: 90px;">
            <p>Get In Touch</p>
            <h2>If You Have Any Query, Please Contact Us</h2>
        </div>
        <div class="contact" style="margin-bottom: 90px;">
            <div class="container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <div class="contact-form">
                                <div id="success"></div>
                                <!-- <form name="sentMessage" id="contactForm" novalidate="novalidate"> -->
                                <form action="" method="post" id="contact_form" class="contact-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="control-group">
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required" data-validation-required-message="Please Enter Your First Name" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="control-group">
                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="required" data-validation-required-message="Please Enter Your Last Name" />
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div>
                                        <button class="btn contact_submit" type="submit" id="contact_submit">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
<?php
    include('../include/footer.php');
?>