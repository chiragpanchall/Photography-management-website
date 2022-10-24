<?php 
@$admin_id = $_REQUEST['idUser'];
$selectAdmin = "SELECT * FROM `User` WHERE `idUser` = '".$admin_id."' ";
$qryAdmin = mysqli_query($con,$selectAdmin);
$rowAdmin = mysqli_fetch_assoc($qryAdmin);
if (@$_REQUEST['idUser']!="") 
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
            <h4 class="card-title" id="basic-layout-form">Offer Form</h4>
          </div>
         <!-- Here is -->
        </div>
        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=offer_action" method="post" enctype="multipart/form-data">
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="idUser" value="<?php echo $rowAdmin['idUser']; ?>" required>
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Offercode</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowAdmin['User_Fname']; ?>" name="Offercode" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Offer_Details</label>
                      <input type="text" id="projectinput2" class="form-control" value="<?php echo $rowAdmin['User_Lname']; ?>" name="Offer_Details" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">Off in Percentage</label>
                      <input type="number" id="projectinput4" class="form-control" minlength="5" maxlength="90" value="0" value="<?php echo $rowAdmin['Product_Off_Percentage']; ?>" name="OffPercentage" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput3">Offer_Begins</label>
                      <input type="date" id="projectinput3" class="form-control" value="<?php echo $rowAdmin['User_Email']; ?>" name="Offer_Begins" required>
                    </div>
                  </div>
                </div>
              </div>


                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">Offer_Ending</label>
                      <input type="date" id="projectinput4" class="form-control" value="<?php echo $rowAdmin['User_text']; ?>" name="Offer_Ending" required>
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
    