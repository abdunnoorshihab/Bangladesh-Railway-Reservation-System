<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['admin_id'];
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
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span></div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">directions_subway</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM orrs_train";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($train);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Trains</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $train;?>">0</span></div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">rowing</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM `orrs_train_tickets` ";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($resevations);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Reservations</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $resevations;?>">0</span></div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">supervisor_account</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM orrs_employee";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($pass);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Employees</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span></div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-4">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">person</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM orrs_admin ";  
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($pass);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Administrators</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span></div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-4">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">loyalty</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM orrs_train_tickets where confirmation = 'Approved'";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($ticket);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Approved Tickets</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $ticket;?>">0</span></div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-4">
              <div class="widget widget-tile">
                <div class="chart sparkline"><i class="material-icons">assignment_late</i></div>
                <div class="data-info">
                  <?php
                    $result ="SELECT count(*) FROM orrs_train_tickets where confirmation != 'Approved' ";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($pass);
                    $stmt->fetch();
                    $stmt->close();
                  ?>
                  <div class="desc">Pending Tickets</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span></div>
                </div>
              </div>
            </div>
          </div>            
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Trains
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a></div>
                </div>
                <div class="card-body">
                  <table class="table table-striped
