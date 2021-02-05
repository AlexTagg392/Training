<?php

include('includes/header.php');
include('includes/dashboard.php');

?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Adding User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
             
                <div class="col-md-10 col-md-offset-1 ">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                  <div class="col-lg-12">
                    <h4 class="page-header text-center">Register Admin User</h4>
                  </div>
                  <div class="col-md-12">
                    <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="" for="privilege">Select privilege </label>
                             <div class="">
                                 <select class="form-control" id="" name="privilege" required>

                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>

                                 </select>
                              </div>
                        </div>

                         <div class="form-group">
                          <label class="" for="name">Full Name</label>
                          <div class="">
                            <input type="name" class="form-control" name="fullname" placeholder="Enter Full Name" value="">
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="" for="prof">Designation</label>
                          <div class="">
                            <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="">
                          </div>
                        </div>

                         <div class="form-group">
                          <label class="" for="country">Country</label>
                          <div class="">
                            <input type="text" class="form-control" name="country" placeholder="Enter Country" value="">
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="" for="text">Responsibility</label>
                          <div class="">
                              <textarea type="text" class="form-control" name="responsibility" value="" placeholder="Responsibility" required></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="">
                            <button type="submit" class="btn btn-primary" name="update_profile">Create Admin</button><hr>
                          </div>
                        </div>


                        </form>

                            <br />


                    </div>
                  </div>
                </div>
                 
              </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
