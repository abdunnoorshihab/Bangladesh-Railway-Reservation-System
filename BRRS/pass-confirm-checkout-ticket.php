<?php
    session_start();
    include('assets/inc/config.php');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['pass_id'];
    if(isset($_POST['train_fare_confirm_checkout']))
    {
            $pass_name=$_POST['pass_name'];
            $pass_addr=$_POST['pass_addr'];
            $pass_email=$_POST['pass_email'];        
            $train_name = $_POST['train_name'];
            $train_no = $_POST['train_no'];
            $train_dep_stat = $_POST['train_dep_stat'];
            $train_arr_stat = $_POST['train_arr_stat'];
            $train_fare = $_POST['train_fare'];
            $fare_payment_code = $_POST['fare_payment_code'];
            $query="insert into orrs_train_tickets (pass_name, pass_addr, pass_email, train_name, train_no, train_dep_stat, train_arr_stat,  train_fare, fare_payment_code) values (?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssssss', $pass_name, $pass_addr, $pass_email, $train_name, $train_no, $train_dep_stat, $train_arr_stat, $train_fare, $fare_payment_code);
            $stmt->execute();
            if($stmt)
            {
                $succ = "Ticket Payment Confirmed";
            }
            else 
            {
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
                <h2 class="page-head-title">Train Tickt Checkout </h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Tickets</a></li>
                        <li class="breadcrumb-item"><a href="#">Checkout</a></li>
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
                    $aid=$_SESSION['pass_id'];
                    $ret="select * from orrs_passenger where pass_id=?";
                    $stmt= $mysqli->prepare($ret);
                    $stmt->bind_param('i',$aid);
                    $stmt->execute();
                    $res=$stmt->get_result();
                    while($row=$res->fetch_object())
                    {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-border-color card-border-color-success">
                            <div class="card-header card-header-divider"><span class="card-subtitle"></span></div>
                            <div class="card-body">
                                <form method ="POST">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Name</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" readonly name="pass_name" value="<?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?>" id="inputText3" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <p class="text-right">
                                            <input class="btn btn-space btn-success" value="Confirm Payment" name="train_fare_confirm_checkout" type="submit">
                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php include('assets/inc/footer.php');?>
        </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    
</body>
</html>
