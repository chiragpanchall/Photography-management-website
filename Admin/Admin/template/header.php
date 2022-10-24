<?php 

?>
<nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <div class="container-fluid">
          <div class="navbar-header">
            
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">  
              <?php 
              /*  $loginAdmin = "SELECT * FROM `user` WHERE `admin_id` = '".$_SESSION['admin_id']."' ";
                $qryLogin = mysqli_query($con,$loginAdmin);
                $rowLogin = mysqli_fetch_assoc($qryLogin);
*/
                ?>
                 <li class="dropdown nav-item mr-0">
                   <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle">
                    <b><?php echo "<b>".$_SESSION['email']."</b>";?></b>
                     <span class="avatar avatar-online">
                <!-- <img id="navbar-avatar" src="userlogo.png" alt="avatar"/> -->
              
              
              
                </span>
                    <p class="d-none">User Settings</p></a>
                  <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                    <div class="arrow_box_right">
                    
                    <!-- <a href="user-profile-page.html" class="dropdown-item py-1"> -->
                    <!-- <i class="ft-edit mr-2"> -->
                    <!-- </i> -->
                    <!-- <span>My Profile</span> -->
                    <!-- </a> -->
                    <!-- <a href="chat.html" class="dropdown-item py-1"> -->
                    <!-- <i class="ft-message-circle mr-2"></i> -->
                    <!-- <span>My Chat</span> -->
                    <!-- </a> -->
                    <!-- <a href="javascript:;" class="dropdown-item py-1"> -->
                    <!-- <i class="ft-settings mr-2">
                    </i> -->
                    <!-- <span>Settings</span></a> -->
                    
                      <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
