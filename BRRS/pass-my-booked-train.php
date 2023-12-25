<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['pass_id'];
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
          <h2 class="page-head-title">My Train</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">My Booked Train</li>
            </ol>
          </nav>
        </div>

        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
              
              <?php
                $aid=$_SESSION['pass_id'];
                $ret="select * from orrs_passenger where pass_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$aid);
                $stmt->execute();
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                 {
                    ?>
                <div class="card-header"><?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?>  This Is Your Booked Train!</div>

                <?php }?>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                        <th>Train Number</th>
                        <th>Train</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Departure Time</th>
                        <th>Fare</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ret="select * from orrs_passenger where pass_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$aid);
                            $stmt->execute();
                            $res=$stmt->get_result();
                        while($row=$res->fetch_object())
                        {
                        ?>
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA">
                        <td><?php echo $row->pass_train_number;?></td>
                        <td><?php echo $row->pass_train_name;?></td>
                        <td class="center"><?php echo $row->pass_dep_station;?></td>
                        <td class="center"><?php echo $row->pass_arr_station;?></td>
                        <td class="center"><?php echo $row->pass_dep_time;?></td>
                        <td class="center">$<?php echo $row->pass_train_fare;?></td>
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
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        App.init();
        App.dataTables();
      });
    </script>
  </body>
</html>
