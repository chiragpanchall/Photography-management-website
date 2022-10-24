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
              
            </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Admin Block List</h4>
                    </div>
               
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Profile</th>
                                    <th>Gender</th>
                                    <th>Create Date</th>
                                    <th>Update Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $selectAdmin = "SELECT * FROM `User` WHERE `status` = 'inactive' ";
                                $qryAdmin = mysqli_query($con,$selectAdmin);
                                while($rowAdmin = mysqli_fetch_assoc($qryAdmin))
                                {
                                ?>
                        
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowAdmin['User_Fname']; ?></td>
                                    <td><?php echo $rowAdmin['User_Lname']; ?></td>
                                    <td><?php echo $rowAdmin['User_Email']; ?></td>
                                    <td><?php echo $rowAdmin['User_Password']; ?></td>
                                    <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/admin/".$rowAdmin['User_Photo_Path']; ?>">
                                    </td>
                                    <td><?php echo $rowAdmin['gender']; ?></td>
                                    <td><?php echo $rowAdmin['c_date']; ?></td>
                                    <td><?php echo $rowAdmin['u_date']; ?></td>
                                    <td>
                                        <?php 
                                        if ($rowAdmin['status']=="active") 
                                        { ?>
                                            <b style="color: green;"><?php echo ucfirst($rowAdmin['status']); ?></b>
                                       <?php } else { ?>
                                       <a onclick="return confirm('Are You Sure Want To Account Active..???')" href="index.php?page=admin_action&action=active&admin_id=<?php echo $rowAdmin['admin_id']; ?>"><b style="color: red;"><?php echo ucfirst($rowAdmin['status']); ?></b></a> 
                                        <?php } ?>

                                        </td>
                                    <td>
                                        <a href="index.php?page=admin&admin_id=<?php echo $rowAdmin['idUser']; ?>" class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a>

                                      <a href="index.php?page=admin_action&action=delete&admin_id=<?php echo $rowAdmin['admin_id']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
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