<?php
    include('../include/header.php');
    include('../include/menu.php');
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-header">Category</h1>
            </div>
            <div class="col-lg-6">
                <button type="button" style="float: right;" class="btn btn btn-light page-header delete_category ms-10"><i class="fas fa-trash"></i> Delete</button>
                <button type="button" style="float: right; margin-right:5px" data-id="" class="btn btn-primary page-header add_category ms-10">Add New</button>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                           Category Records
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="category_table">
                                <thead>
                                    <tr>
                                    <th style="width: 10px;">Id</th>
                                    <th style="width: 100px;">Name</th>
                                    <th style="width: 20px;">Status</th>
                                    <th style="width: 30px;">Date</th>
                                    <th style="width: 10px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div id="categoryModalResponce"><>
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
    <script src="../script/js/category.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>

</body>

</html>
