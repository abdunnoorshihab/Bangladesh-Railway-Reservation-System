<?php
	session_start();
	include('assets/inc/config.php');
	if(isset($_POST['Create_Profile'])) {
		$pass_fname=$_POST['pass_fname'];
		$pass_lname=$_POST['pass_lname'];
		$pass_phone=$_POST['pass_phone'];
		$pass_addr=$_POST['pass_addr'];
		$pass_uname=$_POST['pass_uname'];
		$pass_email=$_POST['pass_email'];
		$pass_pwd=sha1(md5($_POST['pass_pwd']));
		$query="insert into orrs_passenger (pass_fname, pass_lname, pass_phone, pass_addr, pass_uname, pass_email, pass_pwd) values(?,?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		$rc=$stmt->bind_param('sssssss',$pass_fname, $pass_lname, $pass_phone, $pass_addr, $pass_uname, $pass_email, $pass_pwd);
		$stmt->execute();
		if($stmt) {
			$success = "Passenger's Account Has Been Created";
		} else {
			$err = "Please Try Again Or Try Later";
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
          <h2 class="page-head-title">Create Passenger</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Passenger</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </nav>
        </div>
        <?php if(isset($success)) {?>
          <script>
            setTimeout(function () { 
              swal("Success!","<?php echo $success;?>!","success");
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
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider">Create Passenger Profile<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="pass_fname"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-right">
                        <input class="btn btn-space btn-success" value ="Create Passenger " name = "Create_Profile" type="submit">
                        <button class="btn btn-space btn-danger">Cancel</button>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('assets/inc/footer.php');?>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.init();
      	App.formElements();
      });
    </script>
  </body>
</html>
