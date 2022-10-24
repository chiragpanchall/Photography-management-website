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
              <a href="index.php?page=brand" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;   Add Brand</a>
              
            </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Brand List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Brand Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $selectBrand = "SELECT * FROM `brand` ";
                                $qryBrand = mysqli_query($con,$selectBrand);
                                while($rowBrand = mysqli_fetch_assoc($qryBrand))
                                {
                                  $cat = "SELECT * FROM `category` WHERE `category_id` = '".$rowBrand['category_id']."' ";
                                  $qryCat = mysqli_query($con,$cat);
                                  $rowCat = mysqli_fetch_assoc($qryCat); 

                                  $SubCat = "SELECT * FROM `sub_category` WHERE `sub_category_id` = '".$rowBrand['sub_category_id']."' ";
                                  $qrySubCat = mysqli_query($con,$SubCat);
                                  $rowSubCat = mysqli_fetch_assoc($qrySubCat);


                                ?>
                                
                                <tr>
                                     <td><?php echo $i; ?></td>
                                     <td><?php echo ucfirst($rowCat['category_name']); ?></td>
                                     <td><?php echo ucfirst($rowSubCat['category_name']); ?></td>
                                     <td><?php echo ucfirst($rowBrand['brand_name']); ?></td>
                                     <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/brand/".$rowBrand['brand_image']; ?>">
                                    </td>
                                     <td>
                                        <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a>

                                      <a href="index.php?page=brand_action&action=delete&brand_id=<?php echo $rowBrand['brand_id']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
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