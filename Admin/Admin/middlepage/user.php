<?php 
@$user_id = $_REQUEST['user_id'];
$selectUser = "SELECT * FROM `user` WHERE `idUser` = '".$user_id."' ";
$qryUser = mysqli_query($con,$selectUser);
$rowUser = mysqli_fetch_assoc($qryUser);
if (@$_REQUEST['user_id']!="") 
{
   $action = "update";
}
else
{
  $action = "insert";
}


?>
    <div class="wrapper">

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title-wrap bar-success">
            <h4 class="card-title" id="basic-layout-form">User Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=user_action" method="post" enctype="multipart/form-data">
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="idUser" value="<?php echo $rowUser['idUser']; ?>" required>
  
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> User Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">First Name</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowUser['User_Fname']; ?>" name="User_Fname" required>
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Middle Name</label>
                      <input type="text" id="projectinput2" class="form-control" value="<?php echo $rowUser['mname']; ?>" name="mname">
                    </div>
                  </div> -->
               
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Last Name</label>
                      <input type="text" id="projectinput3" class="form-control" value="<?php echo $rowUser['User_Lname']; ?>" name="User_Lname" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput3">E-mail</label>
                      <input type="text" id="projectinput4" class="form-control" value="<?php echo $rowUser['User_Email']; ?>" name="User_Email" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">Password</label>
                      <input type="password" id="projectinput5" class="form-control" value="<?php echo $rowUser['User_Password']; ?>" name="User_Password" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Profile</label>
                          <div class="input-group md-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01" required>
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                            <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/user/".$rowUser['User_Photo_path']; ?>">
                    
                    </div>
                  </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                
                  
                  <label class="col-md-3 label-control">Gender </label>
                
                    <div class="input-group col-md-4">
                      <div class="custom-control custom-radio display-inline-block">
                        <input type="radio" id="customRadioInline1" <?php if(isset($rowUser['gender']) && $rowUser['gender']=="male") { echo "checked=checked"; } ?> name="gender" value="male" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadioInline1">Male</label>
                      </div>
                      &nbsp;
                      <div class="custom-control custom-radio display-inline-block">
                        <input type="radio" id="customRadioInline2" <?php if(isset($rowUser['gender']) && $rowUser['gender']=="female") { echo "checked=checked"; } ?> value="female" name="gender" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                      </div>
                    </div>
              </div>
            </div>
            <!-- <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-md-3 label-control" for="userinput8"> Address: </label>
                      <div class="col-md-9">
                        <textarea id="userinput8" rows="6" class="form-control col-md-9 border-primary" value="<?php echo $rowUser['address']; ?>" name="address"></textarea>
                      </div>
                    </div>
                  </div> -->
                     <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">Contact Number</label>
                      <input type="contact no." id="projectinput4" class="form-control" value="<?php echo $rowUser['User_MobileNo']; ?>" name="User_MobileNo">
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6">
                  <div class="form-group">
                                        <h5>Date of Birth </h5>
                                        <div class="controls">
                                            <input type="date" value="<?php echo $rowUser['dob']; ?>" name="dob" class="form-control" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email">
                                          </div>
                                        </div>
                                    </div>
                       
                                     <div class="col-md-6">
                                        <div class="form-group">
                                        <h5>State :</h5>
                                        <div class="controls">
                                          <select  value="<?php echo $rowUser['state']; ?>"name="state" id="state" required class="form-control">
                                          <option value="">Select Your State</option>
                                          <option value="1">Gujarat</option>
                                          <option value="2">Mumbai</option>
                                          <option value="3">Rajsthan</option>
                                            </select>
                                          </div>
                                        </div>
                                    </div>  -->
                                    
                                      <!-- <div class="col-md-6">
                                        <div class="form-group">
                                        <h5>City </h5>
                                        <div class="controls">
                                            <select  value="<?php echo $rowUser['city']; ?>" name="city" id="city" required class="form-control">
                                                <option value="">Select Your City</option>
                                                <option value="1">Ahemdabaqd</option>
                                                <option value="2">Vadodara</option>
                                                <option value="3">Surat</option>
                                                <option value="4">Rajkot</option>
                                                <option value="5">Bhavnagar</option>
                                            </select>
                                          </div>
                                        </div>
                                    </div>   -->
                                    <div class="col-md-6">
                    <!-- <div class="form-group">
                      <label for="projectinput4">Pincode</label>
                      <input type="pincode" id="projectinput4" class="form-control" value="<?php echo $rowUser['pincode']; ?>" name="pincode">
                    </div>
                     <div class="col-md-6">
                    <div class="form-group">
                
                  
              </div> -->
           </div>
         </div>
       </div>

                </div> 
              </div>

            <center>  
              <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success">
                </div>
                </center>
                <!-- <button type="button" class="btn btn-success">
                  <i class="icon-note"></i> Save
                </button>
                <button type="button" class="btn btn-danger mr-1">
                  <i class="icon-trash"></i> Cancel
                </button> -->
        
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- // Basic form layout section end -->
            </div>
          </div>
        </div>

        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2018 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>

      </div>
    </div>
   