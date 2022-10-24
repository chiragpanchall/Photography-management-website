<?php 
include('config.php');
@$state_id = $_REQUEST['state_id'];
$selectState = "SELECT * FROM `state` WHERE `state_id` = '".$state_id."' ";
$qryState = mysqli_query($con,$selectState);
$rowState = mysqli_fetch_assoc($qryState);
if (@$_REQUEST['admin_id']!="") 
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
            <h4 class="card-title" id="basic-layout-form">State Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=state_action" method="post" >
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="state_id" value="<?php echo $rowState['state_id']; ?>" required>
                       
            <form class="form">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> State Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">State Name</label>
                      <input type="text" id="projectinput1" onkeyup="charonly(this)" class="form-control" value="<?php echo $rowState['state_name']; ?>" name="state_name" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>

function charonly(input)
          {
            var char=/[^a-z]/gi;
            input.value = input.value.replace(char,"");
          }


          </script>

                   <center>  
                     
                 
                <div class="col-md-6">
              <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success">
                </div>
                </center>
            
              
                    <!--<div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>-->
            
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
    
   