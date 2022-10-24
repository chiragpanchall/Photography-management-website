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
                  <!--   <div class="mb-3 pull-right">
              <a href="index.php?page=employee" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;Event Order</a>
              
              </div> -->
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Event Order</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Event Order Date</th>
                                    <th>Event Address</th>
                                    <th>Event Date</th>
                                    <th>Last Date Event</th>
                                    <th>Album Delivery Address</th>
                                    <th>User Name </th>
                                    <th>User Email </th>
                                    <th>Additional Package ID</th>
                                    <th>Event Category </th>
                                    <th>Package  </th>
                                    <th>Area  </th>
                                    <th>Price  </th>
                                    <th> Operation </th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                $i = 1;
                                $selectProduct = "SELECT `event_order`.*, `user`.*, `additional_package`.*, `package`.*, `event_category`.*, `area`.*
                                FROM `event_order` 
                                  LEFT JOIN `user` ON `event_order`.`User_ID_idUser` = `user`.`idUser` 
                                  LEFT JOIN `additional_package` ON `event_order`.`Additional_Package_idAdditional_Package` = `additional_package`.`idAdditional_Package` 
                                  LEFT JOIN `package` ON `event_order`.`Package_idPackage` = `package`.`idPackage` 
                                  LEFT JOIN `event_category` ON `event_order`.`Event_Category_idEvent_Category` = `event_category`.`idEvent_Category` 
                                  LEFT JOIN `area` ON `event_order`.`Area_idArea` = `area`.`idArea` where Status != 4 and Status != 3 ";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                while($rowProduct = mysqli_fetch_array($qryProduct))
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
                                    <?php // echo ucfirst($rowCat['Event_Type']); ?>
                                    <td><?php echo $rowProduct['Event_Order_Date']; ?></td>
                                    <td><?php echo $rowProduct['Event_Address']; ?></td>
                                    <td><?php echo $rowProduct['Event_Date']; ?></td>
                                    <td><?php echo $rowProduct['Last_Date_Event']?></td>
                                    <td><?php echo $rowProduct['Album_Delivery_Address']?></td>
                                    <td><?php echo $rowProduct['User_Fname']?></td>
                                    <td><?php echo $rowProduct['User_Email']?></td>
                                    <td><?php echo $rowProduct['Additional_Package_idAdditional_Package']?></td>
                                    <td><?php echo $rowProduct['Event_Type']?></td>
                                    <td><?php echo $rowProduct['Package_name']?></td>
                                    <td><?php echo $rowProduct['Area_Name']?></td>
                                    <td>₹<?php echo $rowProduct[12]?></td>



                                   <!--  <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/product/".$rowProduct['product_img']; ?>">
                                    </td> -->
                                   <!--  <td><?php echo $rowProduct['Product_Price']; ?></td> -->
                                    <?php //echo $rowProduct['Product_quantity']; ?>
                                    <td>
                                        <!-- <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a> -->
                                      <!-- <a href="index.php?page=product_action&action=delete&idProduct=<?php //echo $rowProduct['idEvent_Order']; ?>" class="btn btn-outline-danger mr-1" onclick="Pressme()"><i class="fa fa-trash"></i></a> -->
<!--  -->
<?php
 $p1 = "/Final_Project/Admin/Admin/middlepage/event_order_action.php?action=1&id=".$rowProduct['idEvent_Order'];
 $p2 = "/Final_Project/Admin/Admin/middlepage/event_order_action.php?action=2&id=".$rowProduct['idEvent_Order'];
 //$p3 = "/Final_Project/Admin/Admin/middlepage/event_order_action.php?action=3&id=".$rowProduct['idEvent_Order'];
?>
<select class="form-control" name="idProduct" onchange="location = this.value;">
<option value="" selected>Action</option>
<option value="<?php echo $p1;?>">Pending</option>
<option value="<?php echo $p2;?>" >Proccessing</option>
<!-- <option value="<?php //echo $p3;?>" >Done</option> -->
  </select>
  <br/>
  <?php //echo ($rowProduct['Status'] == 1) ? "Pending" : (($rowProduct['Status'] == 2) ? "Processing" : "Done"); ?>
  <?php echo ($rowProduct['Status'] == 0) ? "Pending"  :  "Processing" ; ?>
<!--  -->
                                    </td>
                                </tr>
                                <?php $i++; } ?>
 
                            </tbody>
                          <script>
                          function Pressme(){
                              if(confirm('Are you sure want to delete Event order ?'))
                              {

                              }
                              else{

                              }
                          }
                          </script>
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