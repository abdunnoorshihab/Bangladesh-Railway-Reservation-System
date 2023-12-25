<?php
    session_start();
    include('assets/inc/config.php');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['pass_id'];
    if(isset($_POST['Update_Profile']))
    {
        $pass_fname=$_POST['pass_fname'];
        $pass_lname = $_POST['pass_lname'];
        $pass_phone=$_POST['pass_phone'];
        $pass_addr=$_POST['pass_addr'];
        $pass_email=$_POST['pass_email'];
        $pass_uname=$_POST['pass_uname'];
        $pass_bday=$_POST['pass_bday'];
        $pass_bio=($_POST['pass_bio']);
        $query="update  orrs_passenger set pass_fname = ?, pass_lname = ?, pass_phone = ?, pass_addr = ?, pass_email = ?, pass_uname = ?, pass_bday = ?, pass_bio = ? where pass_id=?";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('ssssssssi', $pass_fname, $pass_lname, $pass_phone, $pass_addr, $pass_email, $pass_uname, $pass_bday, $pass_bio, $aid);
        $stmt->execute();
        if($stmt)
        {
            $succ = "Your Profile Has Been Updated";
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
          <h2 class="page-head-title">Profile </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Profile</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
            </ol>
          </nav>
        </div>
        <?php if(isset($succ)) {?>
          <script>
              setTimeout(function () 
              { 
                  swal("Success!","<?php echo $succ;?>!","success");
              },
                  100);
          </script>
        <?php } ?>
        <?php if(isset($err)) {?>
          <script>
              setTimeout(function () 
              { 
                  swal("Failed!","<?php echo $err;?>!","Failed");
              },
                  100);
          </script>
        <?php } ?>
        <div class="main-content container-fluid">
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
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider">Update Your Profile<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="pass_fname" value="<?php echo $row->pass_fname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <p class="text-right">
                        <input class="btn btn-space btn-success" value ="Update Profile" name = "Update_Profile" type="submit">
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
   
  </body>
</html>
