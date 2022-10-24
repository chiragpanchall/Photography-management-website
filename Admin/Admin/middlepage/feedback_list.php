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
           <!--    <a href="index.php?page=employee" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;   Add Employee</a> -->
              
              </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Feedback List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Date</th>
                                    <th>Feedback</th>
                                    <th>User </th>
                                    <th>Order Date </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                $i = 1;
                                $selectProduct = "SELECT feedback.idFeedback,feedback.Feedback_Date,feedback.Feedback_Content,user.User_Fname,user.User_Lname,printing_order.Printing_Order_Date FROM `feedback`,printing_order,user WHERE `Printing_Order_idPrinting_Order` = printing_order.idPrinting_Order and printing_order.User_idUser = user.idUser";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                mysqli_num_rows($qryProduct);
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
                                    <td><?php echo $rowProduct['Feedback_Date']; ?></td>
                                    <td><?php echo $rowProduct['Feedback_Content']; ?></td>
                                    <td><?php echo $rowProduct['User_Fname']." ".$rowProduct['User_Lname']; ?></td>
                                    <td><?php echo $rowProduct['Printing_Order_Date']?></td>
                                   
                                   <!--  <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/product/".$rowProduct['product_img']; ?>">
                                    </td> -->
                                   <!--  <td><?php echo $rowProduct['Product_Price']; ?></td> -->
                                    <?php //echo $rowProduct['Product_quantity']; ?>
                                    <td>
                                        <!-- <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a> -->

                                      <a href="index.php?page=feedback_action&action=delete&idFeedback=<?php echo $rowProduct['idFeedback']; ?>" class="btn btn-outline-danger mr-1" onclick="Pressme()"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
 <script>
 function Pressme(){
     if(confirm('Are You sure want to delete the feedback')){}
     else{}
 } 
 </script>
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