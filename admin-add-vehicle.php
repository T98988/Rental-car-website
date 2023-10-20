<?php
 session_start();
 $dbuser="root";
 $dbpass="";
 $host="localhost:3307";
 $db="project";
 $mysqli=new mysqli($host,$dbuser, $dbpass, $db);
 function check_login()
{
if(strlen($_SESSION['a_id'])==0)
 {
   $host = $_SERVER['HTTP_HOST'];
   $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   $extra="admin-login.php";
   $_SESSION["a_id"]="";
   header("Location: http://$host$uri/$extra");
 }
}
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['add_veh']))
    {

            $v_name=$_POST['v_name'];
            $v_reg_no = $_POST['v_reg_no'];
            $v_category=$_POST['v_category'];
            $v_pass_no=$_POST['v_pass_no'];
            $v_status=$_POST['v_status'];
            $v_driver=$_POST['v_driver'];
            $Route=$_POST['Route'];
            $v_dpic=$_FILES["v_dpic"]["name"];
		        move_uploaded_file($_FILES["v_dpic"]["tmp_name"],"../vendor/img/".$_FILES["v_dpic"]["name"]);
            $query="insert into tms_vehicle (v_name, v_pass_no, v_reg_no, Route, v_driver, v_category, v_dpic, v_status ) values(?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssss', $v_name, $v_pass_no, $v_reg_no,$Route, $v_driver, $v_category, $v_dpic, $v_status);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Car Added";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('inc1/head.php');?>

<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("inc1/nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("inc1/sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">
      <?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Cars</a>
          </li>
          <li class="breadcrumb-item active">Add Cars</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
          Add Vehicle
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <form method ="POST" enctype="multipart/form-data"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Car Name</label>
                <input type="text" required class="form-control" id="exampleInputEmail1" name="v_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Car Registration Number</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="v_reg_no">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Car Number Of Seats</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="v_pass_no">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Route</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="Route">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Driver</label>
              <select class="form-control" name="v_driver" id="exampleFormControlSelect1">
                <?php

                $ret="SELECT * FROM tms_user where u_category = 'Driver' "; //sql code to get to ten trains randomly
                $stmt= $mysqli->prepare($ret) ;
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $cnt=1;
                while($row=$res->fetch_object())
                {
                ?>
                <option><?php echo $row->u_fname;?> <?php echo $row->u_lname;?></option>
                <?php }?> 
              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Car Category</label>
              <select class="form-control" name="v_category" id="exampleFormControlSelect1">
                <option>Bus</option>
                <option>Sedan</option>
                <option>SUV</option>
                <option>Van</option>

              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Car Status</label>
              <select class="form-control" name="v_status" id="exampleFormControlSelect1">
                <option>Booked</option>
                <option>Available</option>
                
              </select>
            </div>

            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Car Picture</label>
                <input type="file" class="btn btn-success" id="exampleInputEmail1" name="v_dpic">
            </div>

            <button type="submit" name="add_veh" class="btn btn-success">Add Vehicle</button>
          </form>
          <!-- End Form-->
        </div>
      </div>
       
      <hr>
     

     
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>

</body>

</html>
