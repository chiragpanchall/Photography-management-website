<?php 
@$gallery_id = $_REQUEST['gallery_id'];
// $selectGallery = "SELECT * FROM `gallery` WHERE `gallery_id` = '".$gallery_id."' ";
// $qryGallery = mysqli_query($con,$selectGallery);
// $rowGallery = mysqli_fetch_array($qryGallery);
if (@$_REQUEST['gallery_id']!="") 
{
   $action = "insert";
}
else
{
  $action = ""; //update
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
            <h4 class="card-title" id="basic-layout-form">Gallery Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
             <form class="form" action="index.php?page=gallery_action" method="post" enctype="multipart/form-data">
               <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="gallery_id" value="<?php echo $_REQUEST['gallery_id']; ?>" required>
             
           
            <form class="form">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Gallery Details</h4>
                <!-- <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Image Name</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php //echo $rowGallery['image_name']; ?>" name="image_name" required>
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6"> -->
                    <!-- <div class="form-group">
                      <label for="projectinput1">Description</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php //echo $rowGallery['description']; ?>" name="description" required>
                    </div>
                  </div> -->
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                       <label>Gallery image</label>
                          <div class="input-group md-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                            </div>

                            <div class="custom-file">
                              <input type="file" class="custom-file-input"  name="image[]" id="inputGroupFile01" accept="image/png, image/jpg, image/jpeg" multiple required>
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                          <?php 
                          // if ($rowGallery['image']) 
                          // {
                             ?>
                          <!-- <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php //echo "upload/gallery/".$rowGallery['image']; ?>"> -->
                          <?php //} ?>
                    </div>
                  </div>
                </div>
              </div>
                   <!--<center>  
                    <div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>-->
                           <center> 
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
</section>
<!-- // Basic form layout section end -->
            </div>
          </div>
        </div>
        

        <!-- <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2018 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer> -->

      </div>
    </div>
    


   <!-- Tabless -->



   <div class="wrapper">
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <?php if(isset($_SESSION['succ']) && $_SESSION['succ']) { echo $_SESSION['succ'];unset($_SESSION['succ']); }  ?>

         <?php if(isset($_SESSION['delMsg']) && $_SESSION['delMsg']) { echo $_SESSION['delMsg'];unset($_SESSION['delMsg']); }  ?>

         <?php if(isset($_SESSION['UpMsg']) && $_SESSION['UpMsg']) { echo $_SESSION['UpMsg'];unset($_SESSION['UpMsg']); }  ?>
        
            <div class="card">
                <div class="card-header">
                    <div class="mb-3 pull-right">
                         <!-- <a href="index.php?page=gallery" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;   Add Gallery</a> -->
            </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Gallery List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr><th>Sr no.</th>
                                    <th>Album Image</th>
                                    <th>Selection</th>
                                    <!-- <th>Album Delivery Address</th> -->
                                     <!-- <th>User</th>  -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                 <?php 
                                $i = 1;
                                $idd = $_REQUEST['gallery_id'];
                                $selectGallery = "SELECT * FROM `album_images` WHERE `Event_Order_idEvent_Order` = '$idd'";
                                $qryGallery = mysqli_query($con,$selectGallery);
                                while($rowGallery = mysqli_fetch_array($qryGallery))
                                {
                                ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>  

                                    <center>   
                                      <!-- border-radius: 100px; -->
<img style="height: 100px; width: 100px; " src="<?php echo "/Final_Project/Data/Order_Image/EventOrderImg/".$rowGallery['Album_Images_Path']; ?>" value ="<?php echo "/Final_Project/Data/Order_Image/EventOrderImg/".$rowGallery['Album_Images_Path']; ?>"  onclick="window.open(this.src, '_blank')">
</center>  </td>

                                       
                              <td>
                              <center>
                                <?php echo $rowGallery['Album_Selection']==1 ? "Selected" :"Not select"; ?>
                                </center></td>
                           
                                
                                    <td style="padding: 15px;">
                                                                           <center>
                                      <a href="index.php?page=gallery_action&action=delete&gallery_id=<?php echo $rowGallery['idAlbum_Images']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-remove"></i></a></center>

                                      <!-- <center><a class="btn btn-outline-success mr-1"><i class="fa fa-ship"></i></a></center> -->

                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            
                               </tbody>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Language - Comma decimal place table -->

            </div>
          </div>
        </div>
      </div>
    </div>

