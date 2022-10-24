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
                        <h4 class="card-title">Printing Product Order</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Printing Order Date</th>
                                    <th>Order Image</th>
                                    <th>Delivery Address</th>
                                    <th>User Name </th>
                                    <th>User Email </th>
                                    <th>Offer Details</th>
                                    <th>Print type </th>
                                    <th>Product Category  </th>
                                    <th> Quantity  </th>
                                    <th>Price  </th>
                                    <th>Status </th>
                                    <th> Operation </th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                $i = 1;
                                $selectProduct = "SELECT `printing_order`.*, `printing_order_details`.*, `print_type`.*, `product`.*, `offer`.`Offer_Details`, `user`.*
                                FROM `printing_order` 
                                    LEFT JOIN `printing_order_details` ON `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order` 
                                    LEFT JOIN `print_type` ON `printing_order_details`.`Print_Type_idPrint_Type` = `print_type`.`idPrint_Type` 
                                    LEFT JOIN `product` ON `print_type`.`Product_idProduct_Id` = `product`.`idProduct` 
                                    LEFT JOIN `offer` ON `printing_order`.`Offer_idOffer` = `offer`.`idOffer` 
                                    LEFT JOIN `user` ON `printing_order`.`User_idUser` = `user`.`idUser` where Status != 2 and Status != 3";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                while($rowProduct = mysqli_fetch_array($qryProduct))
                                {
                                ?>
                               
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowProduct['Printing_Order_Date']; ?></td>
                                    <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "/Final_Project/Data/Order_Image/PrintedOrderImg/".$rowProduct['Printing_Order_Image']; ?>">
                                    </td>
                                    <td><?php echo $rowProduct['Delivery_Address']; ?></td>
                                    <td><?php echo $rowProduct['User_Fname']?></td>
                                    <td><?php echo $rowProduct['User_Email']?></td>
                                    <td><?php echo $rowProduct['Offer_Details']?></td>
                                    <td><?php echo $rowProduct['Print_Size']?></td>
                                    <td><?php echo $rowProduct['Product_Name']?></td>
                                    <td><?php echo $rowProduct['Printing_Order_Quantity']?></td>
                                    <td>₹<?php echo $rowProduct['Total_Amount']?></td>
                                    <!-- <td><?php //echo $rowProduct['Area_Name']?></td> -->
                                    <td><?php echo $rowProduct['Status']?></td>
                                    <td>
                                        <!--  -->
<?php
 $p1 = "/Final_Project/Admin/Admin/middlepage/printing_order_action.php?action=1&id=".$rowProduct['idPrinting_Order'];
 $p2 = "/Final_Project/Admin/Admin/middlepage/printing_order_action.php?action=1&id=".$rowProduct['idPrinting_Order'];
 $p3 = "/Final_Project/Admin/Admin/middlepage/printing_order_action.php?action=2&id=".$rowProduct['idPrinting_Order'];
?>
<select class="form-control" name="idProduct" onchange="location = this.value;">
<option value="" selected>Action</option>
<!-- <option value="<?php //echo $p1;?>">Pending</option> -->
<option value="<?php echo $p2;?>" >Proccessing</option>
<option value="<?php echo $p3;?>" >Done</option>
  </select>
  <br/>
  <?php 
  if($rowProduct['Status'] == 0)
         echo "Waiting";
    else if($rowProduct['Status'] == 1)
         echo "Processing";
    else if($rowProduct['Status'] == 2)
         echo "Done";
  
    else {}     
  
  ?>
  <?php //echo ($rowProduct['Status'] == 0) ? "" : (($rowProduct['Status'] == 1) ? "Pending" : "Processing"); ?>
  <?php //echo ($rowProduct['Status'] == 0) ? "Pending"  :  "Processing" ; ?>
<?php //echo $rowProduct['Status'];?>
                                        <!--  -->
                                    </td>

                                   <!--  <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php //echo "upload/product/".$rowProduct['product_img']; ?>">
                                    </td> -->
                                    <!-- <td><?php //echo $rowProduct['Product_Price']; ?></td>
                                    <?php //echo $rowProduct['Product_quantity']; ?>
                                    <td> -->
                                        <!-- <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a> -->
                                      <!-- <a href="index.php?page=product_action&action=delete&idProduct=<?php //echo $rowProduct['idEvent_Order']; ?>" class="btn btn-outline-danger mr-1" onclick="Pressme()"><i class="fa fa-trash"></i></a> -->
<!--  -->

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