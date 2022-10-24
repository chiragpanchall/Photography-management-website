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
              <a href="index.php?page=additional_package" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;   Add Package</a>
              
              </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Additional Package List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Frames</th>
                                    <th>Images</th>
                                    <th>Video MDuration</th>
                                    <th>Price</th>
                                    
                                    <th>Drone Shooting</th>
                                    <th>Live Shooting</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                $i = 1;
                                $selectProduct = "SELECT * FROM `additional_package` ";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                while($rowProduct = mysqli_fetch_assoc($qryProduct))
                                {
                                  /*$cat = "SELECT * FROM `event_category` WHERE `idEvent_Category` = '".$rowProduct['idEvent_Category']."' ";
                                  $qryCat = mysqli_query($con,$cat);
                                  $rowCat = mysqli_fetch_assoc($qryCat); 

                                 /* $SubCat = "SELECT * FROM `sub_category` WHERE `sub_category_id` = '".$rowProduct['sub_category_id']."' ";
                                  $qrySubCat = mysqli_query($con,$SubCat);
                                  $rowSubCat = mysqli_fetch_assoc($qrySubCat);

                                  $Brand = "SELECT * FROM `brand` WHERE `brand_id` = '".$rowProduct['brand_id']."' ";
                                  $qryBrand = mysqli_query($con,$Brand);
                                  $rowBrand = mysqli_fetch_assoc($qryBrand);*/


                                ?>
                               
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <?php //echo ucfirst($rowCat['Event_Type']); ?>
                                    <td><?php echo $rowProduct['Frames']; ?></td>
                                    <td><?php echo $rowProduct['images']; ?></td>
                                    <td><?php echo $rowProduct['Video_MDuration']; ?></td>
                                    <td>₹<?php echo $rowProduct['Price']; ?></td>
                                    
                                    <td><?php echo $rowProduct['Drone_Shooting'] ? "Yes":"No" ?></td>
                                    <td><?php echo $rowProduct['Live_Shooting']? "Yes":"No"  ?></td>

                                
                                    <td>
                                        <!-- <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a> -->
                                        <center>
                                      <a href="index.php?page=additional_package_action&action=delete&idAdditional_Package=<?php echo $rowProduct['idAdditional_Package']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
                                      </center>
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