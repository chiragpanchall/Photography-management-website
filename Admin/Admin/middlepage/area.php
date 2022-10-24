<?php 
@$idArea = $_REQUEST['idArea'];
$selectState = "SELECT * FROM `area` WHERE `idArea` = '".$idArea."' ";
$qryState = mysqli_query($con,$selectState);
$rowState = mysqli_fetch_assoc($qryState);
if (@$_REQUEST['idArea']!="") 
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
            <form class="form" action="index.php?page=area_action" method="post" >
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="idArea" value="<?php echo $rowState['idArea']; ?>" required>
                       
            <form class="form">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Area Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Area Name</label>
                      <input type="text" id="projectinput1"  onkeyup="charonly(this)" class="form-control" value="<?php echo $rowState['Area_Name']; ?>" name="Area_Name" required>
                    </div>
                  </div>

<script> function charonly(input)
          {
            var char=/[^a-z]/gi;
            input.value = input.value.replace(char,"");
          }</script>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">City Name</label>
                      <select class="form-control" name="idCity">
                       
                        <?php 
                        $selectState = "SELECT * FROM `city` ";
                        $qryState = mysqli_query($con,$selectState);
                        while($rowState = mysqli_fetch_assoc($qryState))
                        {
                        ?>
                        <option value="<?php echo $rowState['idCity'] ?>"><?php echo $rowState['City_Name']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
          
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
    
   