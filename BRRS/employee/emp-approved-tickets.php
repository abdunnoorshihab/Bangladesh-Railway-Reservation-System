<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['emp_id'];
  if(isset($_GET['del'])) {
    $id=intval($_GET['del']);
    $adn="delete from orrs_train where id=?";
    $stmt= $mysqli->prepare($adn);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();	 
    if($stmt) {
      $succ = "Train Details Deleted";
    } else {
      $err = "Try Again Later";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('assets/inc/head.php');?>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <?php include('assets/inc/navbar.php');?>
      <?php include('assets/inc/sidebar.php');?>
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Approved Tickets</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="emp-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </nav>
        </div>
        <?php if(isset($succ)) {?>
          <script>
            setTimeout(function () { 
              swal("Success!","<?php echo $succ;?>!","success");
            }, 100);
          </script>
        <?php } ?>
        <?php if(isset($err)) {?>
          <script>
            setTimeout(function () { 
              swal("Failed!","<?php echo $err;?>!","Failed");
            }, 100);
          </script>
        <?php } ?>

        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Tickets
                  <div class="tools dropdown">
                    <span class="icon mdi mdi-download"></span>
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                      <span class="icon mdi mdi-more-vert"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                        <th>Passeger</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Train Number</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Fare</th>
                        <th>Payment Code</th>
                      </tr> 
                    </thead>
                    <tbody>
                      <?php
                        $ret="SELECT * FROM `orrs_train_tickets` where confirmation ='Approved' ";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object()) {
                      ?>
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                        <td><?php echo $row->pass_name;?></td>
                        <td><?php echo $row->pass_email;?></td>
                        <td><?php echo $row->pass_addr;?></td>
                        <td><?php echo $row->train_no;?></td>
                        <td class="center"><?php echo $row->train_dep_stat;?></td>
                        <td class="center"><?php echo $row->train_arr_stat;?></td>
                        <td class="center">$<?php echo $row->train_fare;?></td>
                        <td class="center"><?php echo $row->fare_payment_code;?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php include('assets/inc/footer.php');?>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        App.init();
        App.dataTables();
      });
    </script>
  </body>
</html>
