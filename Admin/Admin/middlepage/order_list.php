<div class="wrapper">

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Zero configuration table -->
                    <section id="configuration">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-success">
                                            <h4 class="card-title">Shipped Order List</h4>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="card-block card-dashboard">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Order Type</th>
                                                        <th>User Name</th>
                                                        <th>Email</th>
                                                        <th>Delivery Address</th>
                                                        <th>Total Amount</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                $selOrd = mysqli_query($con,"SELECT `printing_order`.*, `printing_order_details`.*, `print_type`.*, `product`.*, `offer`.`Offer_Details`, `user`.*
                                FROM `printing_order` 
                                    LEFT JOIN `printing_order_details` ON `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order` 
                                    LEFT JOIN `print_type` ON `printing_order_details`.`Print_Type_idPrint_Type` = `print_type`.`idPrint_Type` 
                                    LEFT JOIN `product` ON `print_type`.`Product_idProduct_Id` = `product`.`idProduct` 
                                    LEFT JOIN `offer` ON `printing_order`.`Offer_idOffer` = `offer`.`idOffer` 
                                    LEFT JOIN `user` ON `printing_order`.`User_idUser` = `user`.`idUser` where Status = 3");
                                    $i = 1;
                                while($rwOrd = mysqli_fetch_assoc($selOrd)) 
                                {
                         
                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo 'Printing Order'; ?></td>
                                                        <td><?php echo $rwOrd['User_Fname']." ".$rwOrd['User_Lname']; ?></td>
                                                        <td><?php echo $rwOrd['User_Email']; ?></td>
                                                        <td><?php echo $rwOrd['Delivery_Address']; ?></td>
                                                        <!-- <td><?php  // echo $rwOrd['pincode'] ?>380007</td> -->
                                                        <td>₹<?php echo $rwOrd['Total_Amount']; ?></td>
                                                        
                                                    </tr>
                                                    <?php $i++;} ?>
                             
                             
                             <!--  -->
                             <?php 
                                
                                $selectProduct = "SELECT `event_order`.*, `user`.*, `additional_package`.*, `package`.*, `event_category`.*, `area`.*
                                FROM `event_order` 
                                  LEFT JOIN `user` ON `event_order`.`User_ID_idUser` = `user`.`idUser` 
                                  LEFT JOIN `additional_package` ON `event_order`.`Additional_Package_idAdditional_Package` = `additional_package`.`idAdditional_Package` 
                                  LEFT JOIN `package` ON `event_order`.`Package_idPackage` = `package`.`idPackage` 
                                  LEFT JOIN `event_category` ON `event_order`.`Event_Category_idEvent_Category` = `event_category`.`idEvent_Category` 
                                  LEFT JOIN `area` ON `event_order`.`Area_idArea` = `area`.`idArea` where  Status = 3 ";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                while($rowProduct = mysqli_fetch_array($qryProduct))
                                                 {?>
                                                                           <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo 'Event Order'; ?></td>
                                                        <td><?php echo $rowProduct['User_Fname']." ".$rowProduct['User_Lname']; ?></td>
                                                        <td><?php echo $rowProduct['User_Email']; ?></td>
                                                        <td><?php echo $rowProduct['Album_Delivery_Address']; ?></td>
                                                        <!-- <td><?php  // echo $rwOrd['pincode'] ?>380007</td> -->
                                                        <td>₹<?php echo $rowProduct[12]; ?></td>
                                                        
                                                    </tr>
                                                    <?php $i++;} ?>

                             <!--  -->
                             
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