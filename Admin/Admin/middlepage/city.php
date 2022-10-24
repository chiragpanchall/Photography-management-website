<?php 
@$city_id = $_REQUEST['city_id'];
$selectCity = "SELECT * FROM `city` WHERE `idCity` = '".$city_id."' ";
$qryCity = mysqli_query($con,$selectCity);
$rowCity = mysqli_fetch_assoc($qryCity);
if (@$_REQUEST['idCity']!="") 
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
            <h4 class="card-title" id="basic-layout-form">City Form</h4>
          </div>
         <script>
         function charonly(input)
          {
            var char=/[^a-z]/gi;
            input.value = input.value.replace(char,"");
          }
         </script>
        </div>
        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=city_action" method="post" >
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="idCity" value="<?php echo $rowCity['idCity']; ?>" required>            
            <form class="form">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> City Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">City Name</label>
                      <input type="text" id="projectinput1" class="form-control" onkeyup="charonly(this)"  value="<?php echo $rowCity['City_Name']; ?>" name="City_Name" required>
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">State Name</label>
                      <select class="form-control" name="state_id">
                        <option>Select Any One...</option>
                        <?php 
                        $selectState = "SELECT * FROM `state` ";
                        $qryState = mysqli_query($con,$selectState);
                        while($rowState = mysqli_fetch_assoc($qryState))
                        {
                        ?>
                        <option value="<?php echo $rowState['idState'] ?>"><?php echo $rowState['State_Name']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                </div> 
                
                   <!--<div class="col-md-6">
                  <div class="card-body">
                    <div class="card-block">
                        <span class="dropdown mr-2">
                          <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" value="<?php echo $rowCity['state_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            state_id
                          </button>
                          <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">45</a>
                            <a class="dropdown-item" href="#">89</a>
                            <a class="dropdown-item" href="#">67</a>
                          </span>
                        </span>-->
                    </div>
                  </div>
                </div>
              </div>
            
                   <center>  
                    <div class="form-actions">
                       <input type="submit" name="submit" class="btn btn-success">
                          <!--<button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>-->
                        </div>
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
    
   