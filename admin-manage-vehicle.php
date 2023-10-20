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

  if(isset($_GET['del']))
{
      $id=intval($_GET['del']);
      $adn="delete from tms_vehicle where v_id=?";
      $stmt= $mysqli->prepare($adn);
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $stmt->close();	 

        if($stmt)
        {
          $succ = "Vehicle Removed";
        }
          else
          {
            $err = "Try Again Later";
          }
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('inc1/head.php');?>

<body id="page-top">

 <?php include("inc1/nav.php");?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("inc1/sidebar.php");?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Vehicles</a>
          </li>
          <li class="breadcrumb-item active">Manage Vehicles</li>
        </ol>
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


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Available</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Registration Number</th>
                    <th>Driver</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <?php

                    $ret="SELECT * FROM tms_vehicle "; 
                    $stmt= $mysqli->prepare($ret) ;
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    $cnt=1;
                    while($row=$res->fetch_object())
                {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $row->v_name;?></td>
                    <td><?php echo $row->v_reg_no;?></td>
                    <td><?php echo $row->v_driver;?></td>
                    <td>
                      <a href="admin-manage-single-vehicle.php?v_id=<?php echo $row->v_id;?>" class="badge badge-success">Update</a>
                      <a href="admin-manage-vehicle.php?del=<?php echo $row->v_id;?>" class="badge badge-danger">Delete</a>
                    </td>
                  </tr>
                </tbody>
                <?php $cnt = $cnt+1; }?>

              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
      <!-- /.container-fluid -->

   
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
  

</body>

</html>
