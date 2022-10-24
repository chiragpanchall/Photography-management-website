<?php 
@$brand_id = $_REQUEST['brand_id'];
$selectBrand = "SELECT * FROM `brand` WHERE `brand_id` = '".$brand_id."' ";
$qryBrand = mysqli_query($con,$selectBrand);
$rowBrand = mysqli_fetch_assoc($qryBrand);
if (@$_REQUEST['brand_id']!="") 
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
            <h4 class="card-title" id="basic-layout-form">Brand Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
             <form class="form" action="index.php?page=brand_action" method="post" enctype="multipart/form-data">
               <input type="hidden" name="action" value="<?php echo $action; ?>">
              <input type="hidden" name="brand_id" value="<?php echo $rowBrand['brand_id']; ?>">
           
            <form class="form">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Brand Details</h4>
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
                      <select class="form-control" name="sub_category_id">
                        <option>Select Any One...</option>
                        <?php 
                        $selectSubCat = "SELECT * FROM `sub_category` ";
                        $qrySubCat = mysqli_query($con,$selectSubCat);
                        while($rowSubCat = mysqli_fetch_assoc($qrySubCat))
                        {
                        ?>
                        <option value="<?php echo $rowSubCat['sub_category_id'] ?>"><?php echo $rowSubCat['category_name']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                    
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Brand_Name</label>
                      <input type="text" id="projectinput1" class="form-control" 
                      value="<?php echo $rowBrand['bname']; ?>"name="bname">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Brand_Image</label>
                          <div class="input-group md-6">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="brand_image" class="custom-file-input" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                          <?php 
                          if ($rowBrand['brand_image']) 
                          { ?>
                            <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/brand/".$rowBrand['brand_image']; ?>">
                         <?php } ?>

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
            
                   <!--<center>  
                    <div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>
              </div>-->
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
    
   