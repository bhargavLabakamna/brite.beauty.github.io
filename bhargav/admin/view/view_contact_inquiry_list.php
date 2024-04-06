<?php
    include('../include/header.php');
    include('../include/menu.php');
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-header">Contact Inquiry</h1>
            </div>
            <div class="col-lg-6">
            <button type="button" style="float: right;" class="btn btn-success page-header add_contact_inquiry">
                Delete
            </button>

            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                           contact_inquiry Records
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="contact_inquiry_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div id="contact_inquiryModalResponce"><>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- <script src="../assets/plugins/jquery-1.10.2.js"></script> -->
    <!-- <script src="../assets/plugins/metisMenu/jquery.metisMenu.js"></script> -->
    <script src="../assets/plugins/pace/pace.js"></script>
    <script src="../assets/scripts/siminta.js"></script>
    <script src="../assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/plugins/morris/morris.js"></script>
    <script src="../assets/scripts/dashboard-demo.js"></script>
    <script src="../script/js/comon.js"></script>
    <script src="../script/js/contact_inquiry.js"></script>

</body>

</html>
