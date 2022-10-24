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
            <h4 class="card-title" id="basic-layout-form">Event Venue</h4>
          </div>
         <!-- Here is -->
        </div>
        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=event_venue_action" method="post" enctype="multipart/form-data">
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="idUser" value="<?php echo $rowAdmin['idUser']; ?>" required>
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Venue_Name</label>
                      <input type="text" id="projectinput1" onkeyup="charonly(this)" class="form-control" value="<?php echo $rowAdmin['User_Fname']; ?>" name="Venue_Name" required="">
                    </div>
                  </div>
                  <script>
                   function numberonly(input)
          {
              var num = /[^0-9]/gi ;
              input.value = input.value.replace(num,"");
              
              

          }
          function charonly(input)
          {
            var char=/[^a-z]/gi;
            input.value = input.value.replace(char,"");
          }
                  </script>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Venue_Price</label>
                      <input type="text" id="projectinput2" class="form-control"  maxlength="8" minlength="3" onkeyup="numberonly(this)"   value="<?php echo $rowAdmin['User_Lname']; ?>" pattern=".{8,3}" name="Venue_Price"  required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput3">Venue_Contact</label>
                      <input type="text" id="projectinput3" class="form-control"  maxlength="10"  onkeyup="numberonly(this)" pattern="[1-9]{1}[0-9]{9}" value="<?php echo $rowAdmin['User_Email']; ?>" pattern=".{10,}" name="Venue_Contact" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">Choose Area </label>

                      <select class="form-control" name="VenueId">
                        <!-- <option>Select Any One...</option> -->
                        <?php 
                        include_once('config.php');
                        $selectState = "SELECT * FROM `area` ";
                        $qryState = mysqli_query($conn,$selectState);
                        while($rowState = mysqli_fetch_assoc($qryState))
                        {
                        ?>
                        <option value="<?php echo $rowState['idArea'] ?>"><?php echo $rowState['Area_Name']; ?></option>
                      <?php } ?>
                      </select>
                    
                    </div>
                  </div>
                </div>
               
                
              </div>

            <center>  <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success" onclick="Pressme()">
                <!-- <button type="button" name="submit" class="btn btn-success">
                  <i class="icon-note"></i> Save
                </button>
                <button type="button" name="reset" class="btn btn-danger mr-1">
                  <i class="icon-trash"></i> Cancel
                </button> -->
              </div>
              <script>
              function Pressme(){
                alert('Event Venue Added Successfully');
              }
              </script>
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
    