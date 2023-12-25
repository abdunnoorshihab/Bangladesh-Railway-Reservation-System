<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['emp_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <?php include("assets/inc/head.php");?>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <?php include("assets/inc/navbar.php");?>
      <?php include('assets/inc/sidebar.php');?>
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
            <!-- Widgets -->
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">airline_seat_recline_normal</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM orrs_passenger";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($pass);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Passengers</div>
                  <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Other widgets -->
          </div>            
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Trains
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                        <th>Train Number</th>
                        <!-- Other table headers -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $ret="SELECT * FROM orrs_train ORDER BY RAND() LIMIT 10 ";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $row->number;?></td>
                            <!-- Other table data -->
                          </tr>
                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Passenger Reservations
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <!-- Other table headers -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $ret="SELECT * FROM orrs_train_tickets WHERE confirmation ='Approved'";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <!-- Other table data -->
                          </tr>
                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('assets/inc/footer.php');?>
      </div>
    </div>
  </body>
</html>
