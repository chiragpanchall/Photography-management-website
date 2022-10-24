<?php 
@$sub_category_id = $_REQUEST['sub_category_id'];
$selectSubcat = "SELECT * FROM `sub_category` WHERE `sub_category_id` = '".$sub_category_id."' ";
$qrySubcat = mysqli_query($con,$selectSubcat);
$rowSubcat = mysqli_fetch_assoc($qrySubcat);
if (@$_REQUEST['sub_category_id']!="") 
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
            <h4 class="card-title" id="basic-layout-form">Sub_category Form</h4>
          </div>
          </div>

        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=subcat_action" method="post">
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="sub_category_id" value="<?php echo $rowSubcat['sub_category_id']; ?>" required>
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Sub_category Details</h4>

                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">category Name</label>
                      <select class="form-control" name="category_id">
                        <option>Select Any One...</option>
                        <?php 
                        $selectCat = "SELECT * FROM `category` ";
                        $qryCat = mysqli_query($con,$selectCat);
                        while($rowCat = mysqli_fetch_assoc($qryCat))
                        {
                        ?>
                        <option value="<?php echo $rowCat['category_id'] ?>"><?php echo $rowCat['category_name']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
              
              
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Sub Category Name</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowSubcat['category_name']; ?>" name="category_name" required>
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
              </div>
                </center>


                </form>
              </div>
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
    
   
            
 