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
              <a href="index.php?page=print_type" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;   Add Print Type</a>
              
              </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Print Type List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Product Name</th>
                                    <th>Print Size</th>
                                    <th>Print Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                 include_once('config.php');
                                $i = 1;
                                $selectProduct = "SELECT * FROM print_type INNER JOIN product on print_type.Product_idProduct_Id = product.idProduct";
                                $qryProduct = mysqli_query($conn,$selectProduct);
                                while( $rowProduct = mysqli_fetch_array($qryProduct) )
                                {
                                
                                ?>
                               
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <?php // echo ucfirst($rowCat['Event_Type']); ?>
                                   
                                    <td><?php echo $rowProduct['Product_Name']; ?></td>
                                    <td><?php echo $rowProduct['Print_Size']; ?></td>
                                    <td><?php echo "₹".$rowProduct['Print_Price']?></td>
                                   <!--  <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/product/".$rowProduct['idPrint_Type']; ?>">
                                    </td> -->
                                   <!--  <td><?php echo $rowProduct['Product_Price']; ?></td> -->
                                    <?php //echo $rowProduct['Product_quantity']; ?>
                                    <td>
                                        <!-- <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a> -->
                                      <a href="index.php?page=print_action&action=delete&idPrint_Type=<?php echo $rowProduct['idPrint_Type']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
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