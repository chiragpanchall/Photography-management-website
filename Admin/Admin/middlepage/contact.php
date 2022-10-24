<?php 
@$contact_id = $_REQUEST['contact_id'];
$selectContact = "SELECT * FROM `contact` WHERE `contact_id` = '".$contact_id."' ";
$qryContact = mysqli_query($con,$selectContact);
$rowContact = mysqli_fetch_assoc($qryContact);
if (@$_REQUEST['contact_id']!="") 
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
            <h4 class="card-title" id="basic-layout-form">Contact Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
             <form class="form" action="index.php?page=contact_action" method="post">
              <input type="hidden" name="action" value="<?php echo $action; ?>">
              <input type="hidden" name="contact_id" value="<?php echo $rowContact['contact_id']; ?>">
             <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Contact Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">First Name</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowContact['fname']; ?>" name="fname" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Last Name</label>
                      <input type="text" id="projectinput2" class="form-control" value="<?php echo $rowContact['lname']; ?>" name="lname" required>
                    </div>
                  </div>
                </div> 
                 <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Email</label>
                      <input type="text" id="projectinput2" class="form-control" value="<?php echo $rowContact['email']; ?>" name="email" required>
                    </div>
                  </div>  
              
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput3">Password</label>
                      <input type="text" id="projectinput3" class="form-control" value="<?php echo $rowContact['password']; ?>" name="password" required>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">Contact Number</label>
                      <input type="contact no." id="projectinput4" class="form-control" value="<?php echo $rowContact['contact']; ?>" name="contact" required>
                    </div>
                  </div>
                  </div>
              </div>

            <center>  <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success">
                <!-- <button type="button" name="submit" class="btn btn-success">
                  <i class="icon-note"></i> Save
                </button>
                <button type="button" name="reset" class="btn btn-danger mr-1">
                  <i class="icon-trash"></i> Cancel
                </button> -->
              </div>
              </center>
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
    