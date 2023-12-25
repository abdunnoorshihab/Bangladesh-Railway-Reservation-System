<?php
    session_start();
    include('assets/inc/config.php');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['emp_id'];
    if(isset($_POST['train_fare_confirm_checkout'])) {
        $id = $_GET['ticket_id'];
        $confirmation = $_POST['confirmation'];
        $query="update orrs_train_tickets set confirmation = ? where ticket_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('si', $confirmation, $id);
        $stmt->execute();
        if($stmt) {
            $succ = "Ticket Payment Confirmed";
        } else {
            $err = "Please Try Again Later";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php');?>
  <body>
    <div class="be-wrapper be-fixed-sidebar ">
      <?php include('assets/inc/navbar.php');?>
      <?php include('assets/inc/sidebar.php');?>
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Train Ticket Checkout Approval</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item"><a href="#">Manage</a></li>
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
        <?php
            $aid=$_GET['ticket_id'];
            $ret="select * from orrs_train_tickets where ticket_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;
            $res=$stmt->get_result();
            while($row=$res->fetch_object()) {
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider"><span class="card-subtitle"></span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Passenger Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_name"  value="<?php echo $row->pass_name;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <!-- Other form fields -->
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Confirmation</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <select class="form-control" name= "confirmation" id="exampleFormControlSelect1 inputText3">
                          <option selected>--Select--</option>
                          <option value="Approved">Approved</option>
                          <option value="Pending">Pending</option>
                        </select>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
        <?php }?>
        </div>
        <?php include('assets/inc/footer.php');?>
      </div>
    </div>
  </body>
</html>
