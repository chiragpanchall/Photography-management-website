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
                    <!-- <div class="mb-3 pull-right">
                         <a href="index.php?page=gallery" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;   Add Gallery</a>
            </div> -->
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Gallery List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr><th>Sr no.</th>
                                    <th>Event Order Date</th>
                                    <th>Event Address</th>
                                    <th>Album Delivery Address</th>
                                     <th>User</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                 <?php 
                                $i = 1;
                                $selectGallery = "select * from event_order,user where event_order.User_ID_idUser = user.idUser and status = 2";
                                $qryGallery = mysqli_query($con,$selectGallery);
                                while($rowGallery = mysqli_fetch_assoc($qryGallery))
                                {
                                ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowGallery['Event_Order_Date']; ?></td>
                                    <td><?php echo $rowGallery['Event_Address']; ?></td>
                                    <td><?php echo $rowGallery['Album_Delivery_Address']; ?></td>
                                    <td><?php echo $rowGallery['User_Fname']." ".$rowGallery['User_Lname']; ?></td>
                                
                                    <td>
                                                                           <center>
                                      <a href="index.php?page=gallery&action=insert&gallery_id=<?php echo $rowGallery['idEvent_Order']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-plus"></i></a></center>

                                      <center>
                                      <a href="index.php?page=gallery_action&action=status&gallery_id=<?php echo $rowGallery['idEvent_Order']; ?>" class="btn btn-outline-success mr-1"><i class="fa fa-ship"></i></a></center>

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

