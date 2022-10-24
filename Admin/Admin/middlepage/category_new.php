<?php 
@$category_id = $_REQUEST['category_id'];
$selectCategory = "SELECT * FROM `category` WHERE `category_id` = '".$category_id."' ";
$qryCategory = mysqli_query($con,$selectCategory);
$rowCategory = mysqli_fetch_assoc($qryCategory);
if (@$_REQUEST['category_id']!="") 
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
            <h4 class="card-title" id="basic-layout-form">Category Form</h4>
          </div>
          </div>

        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=category_action_new" method="post" enctype="multipart/form-data">
               <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="category_id" value="<?php echo $rowCategory['category_id']; ?>" required>
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Category Details</h4>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Product Name</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowCategory['Product_Name']; ?>" name="Product_Name" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Product Type</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowCategory['Product_Type']; ?>" name="Product_Type" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Product Material Type</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php echo $rowCategory['Product_MaterialType']; ?>" name="Product_MaterialType" required>
                    </div>
                  </div>


                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>Category_Image</label>
                          <div class="input-group md-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="Product_Image1" class="custom-file-input" id="inputGroupFile01" required>
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                          <?php 
                          if ($rowCategory['category_image']) 
                          { ?>
                            <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/product/".$rowCategory['Product_Image1']; ?>">
                         <?php } ?>
                    
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
            
                   <!-- <div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>
                    </div>
                   </center>-->
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
    
   