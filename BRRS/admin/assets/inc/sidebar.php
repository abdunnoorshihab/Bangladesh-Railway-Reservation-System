<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class=""><a href="emp-dashboard.php"><i class="icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                  </li>
                    <?php
                      $aid=$_SESSION['admin_id'];//assaign session a varible [PASSENGER ID]
                      $ret="select * from orrs_admin where admin_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;//ok
                      $res=$stmt->get_result();
                      //$cnt=1;
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->admin_uname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="emp-profile.php">View</a>
                      </li>
                      
                      
                    </ul>
                  </li>
                    <?php }?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-train"></i><span>Trains</span></a>
                  
                    <ul class="sub-menu">
                       <li><a href="emp-add-train.php">Add Train</a>
                       <li><a href="emp-manage-train.php">Manage Trains</a>
                    </li>
                      
                    </ul>
                
                  </li>
               
                  <li class="parent"><a href="#"><i class="icon mdi  mdi-account-check"></i><span>Employees</span></a>
                    <ul class="sub-menu">
                      <li><a href="admin-add-employee.php">Add Employee</a>
                      </li>
                      <li><a href="admin-manage-employee.php">Manage Employee</a>
                      </li>
                      
                    </ul>
                  </li>
                
                  <li class="parent"><a href="#"><i class="icon mdi  mdi-key-variant"></i><span>Password Resets</span></a>
                    <ul class="sub-menu">
                      <li><a href="emp-approved-pwdresets.php"><span class="badge badge-success float-right">Approved</span>View</a>
                      <li><a href="emp-pending-pwdresets.php"><span class="badge badge-info float-right">Pending</span>View</a>
                      </li>
                    </ul>
                  </li> 

                 
                  <li><a href="emp-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>