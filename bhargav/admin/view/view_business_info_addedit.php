<?php
    include('../include/header.php');
    include('../include/menu.php');
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Business Info</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <form id="business_info_form" action="" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                                <div class="form-group col-md-6">
                                    <label for="inputField">Name</label>
                                    <input type="text" class="form-control required" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputField">Mobile</label>
                                    <input type="text" class="form-control required" id="mobile" name="mobile" value="<?php echo isset($row['mobile']) ? $row['mobile'] : ''; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputField">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputField">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"  value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputField">Instagram Link</label>
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="<?php echo isset($row['instagram_link']) ? $row['instagram_link'] : ''; ?>">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputField">Facebook Link</label>
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo isset($row['facebook_link']) ? $row['facebook_link'] : ''; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputField">Linkedin Link</label>
                                    <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="<?php echo isset($row['linkedin_link']) ? $row['linkedin_link'] : ''; ?>">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary business_info_submit">Save</button>
                        </div>
                    </form>
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
    <script src="../script/js/business_info.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
