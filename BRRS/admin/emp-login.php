<?php
    session_start();
    include('assets/inc/config.php');
    if(isset($_POST['emp_login']))
    {
      $admin_email=$_POST['admin_email'];
      $admin_pwd=sha1(md5($_POST['admin_pwd']));
      $stmt=$mysqli->prepare("SELECT admin_email ,admin_pwd , admin_id FROM orrs_admin WHERE admin_email=? and admin_pwd=? ");
      $stmt->bind_param('ss',$admin_email,$admin_pwd);
      $stmt->execute();
      $stmt -> bind_result($admin_email,$admin_pwd,$admin_id);
      $rs=$stmt->fetch();
      $_SESSION['admin_id']=$admin_id;
      if($rs)
      {
        header("location:emp-dashboard.php");
      }
      else
      {
        $error = "Access Denied Please Check Your Credentials";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Bangladesh Railway Reservation System</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
    <?php if(isset($error)) {?>
      <script>
            setTimeout(function () 
            { 
              swal("Failed!","<?php echo $error;?>!","error");
            },
              100);
      </script>
    <?php } ?>
</head>
<body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-danger">
              <div class="card-header"><img class="logo-img" src="assets/img/logo-min.png" alt="logo" width="{conf.logoWidth}" height="100"><span class="splash-description">Admin Login Panel</span></div>
              <div class="card-body">
                <form method ="POST">
                  <div class="login-form ">
                    <div class="form-group">
                      <input class="form-control" name="admin_email" type="text" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="admin_pwd" type="password" placeholder="Password">
                    </div>
                    <div class="form-group row login-tools">
                      <div class="col-6 login-remember">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="check1">
                          <label class="custom-control-label" for="check1">Remember Me</label>
                        </div>
                      </div>
                      <div class="col-6 login-forgot-password"><a href="../pass-pwd-forgot.php">Forgot Password?</a></div>
                    </div>
                    <div class="form-group row login-submit">
                      <div class="col-12"><input type = "submit" name ="emp_login" class="btn btn-danger btn-xl btn-block" value ="Log In"></div>
                    </div>
                  </div>
                </form>
                <div class="splash-footer">Back <a href = "../index.php">Home</a></div>
              </div>
            </div>
            <div class="splash-footer">&copy; <?php echo date ('Y');?> Bangladesh Railway Reservation System | Developed By Team WhySoSerious</div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/swal.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.init();
      });
    </script>
  </body>
</html>
