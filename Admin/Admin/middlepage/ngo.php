<?php 
@$ngo_id = $_REQUEST['ngo_id'];
$selectNgo = "SELECT * FROM `ngo` WHERE `ngo_id` = '".$ngo_id."' ";
$qryNgo = mysqli_query($con,$selectNgo);
$rowNgo = mysqli_fetch_assoc($qryNgo);
if (@$_REQUEST['ngo_id']!="") 
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
            <h4 class="card-title" id="basic-layout-form">NGO Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=ngo_action" method="post" >
              <input type="hidden" name="action" value="<?php echo $action; ?>">
              <input type="hidden" name="ngo_id" value="<?php echo $rowNgo['ngo_id']; ?>">
            
            <form class="form">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> NGO Details</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">NGO Name :</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowNgo['n_name']; ?>" name="n_name">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">NGO Description :</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowNgo['des']; ?>" name="des">
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">NGO Type :</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowNgo['n_type']; ?>" name="n_type">
                    </div>
                  </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-md-3 label-control" for="userinput8"> NGO Address: </label>
                      <div class="col-md-9">
                        <textarea id="userinput8" rows="6" class="form-control col-md-9 border-primary" value="<?php echo $rowNgo['address']; ?>" name="address"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                                        <div class="form-group">
                                        <h5> NGO City :</h5>
                                        <div class="controls">
                                            <select name="city" value="<?php echo $rowNgo['city']; ?>" id="select" required class="form-control">
                                                <option value=""> City </option>
                                                <option value="1">Ahemdabad</option>
                                                <option value="2">Vadodara</option>
                                                <option value="3">Surat</option>
                                                <option value="3">Rajkot</option>
                                                <option value="3">Bhavnagar</option>
                                                </select>
                                          </div>
                                        </div>
                                    </div>
           
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">NGO Pincode :</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowNgo['pincode']; ?>" name="pincode">
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
    
   