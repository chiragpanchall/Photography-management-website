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
              <a href="index.php?page=user" class="btn gradient-blue-grey-blue white"><i class="icon-user"></i>&nbsp;   Add User</a>
              </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">User List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Middle Name</th>
                                    <th>Dob</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Profile</th>
                                    <th>Gender</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $selectUser = "SELECT * FROM `user` WHERE `status` = 'active' ";
                                $qryUser = mysqli_query($con,$selectUser);
                                while($rowUser = mysqli_fetch_assoc($qryUser))
                                {
                                ?>
                                <tr>
                                    <td><?php  echo $i ?></td>
                                    <td><?php echo $rowUser['User_Fname']; ?></td>
                                    <td><?php echo $rowUser['User_Lname']; ?></td>
                                    <td><?php echo $rowUser['mname']; ?></td>
                                    <td><?php echo $rowUser['dob']; ?></td>
                                    <td><?php echo $rowUser['address']; ?></td>
                                    <td><?php echo $rowUser['User_MobileNo']; ?></td>
                                    <td><?php echo $rowUser['User_Email']; ?></td>
                                    <td><?php echo $rowUser['User_Password']; ?></td>
                                    <td>
                                         <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "upload/user/".$rowUser['User_Photo_path']; ?>">
                                    
                                    </td>
                                    <td><?php echo $rowUser['gender']; ?></td>
                                    <td><?php echo $rowUser['state']; ?></td>
                                    <td><?php echo $rowUser['city']; ?></td>
                                    <td><?php echo $rowUser['pincode']; ?></td>
                                    <td><?php echo $rowUser['created_date']; ?></td>
                                    <td>
                                        <?php 
                                        if ($rowUser['status']=="active") 
                                        { ?>
                                           <a onclick="return confirm('Are You Sure Want To Account Inactive...???')" href="index.php?page=user_action&action=inactive&user_id=<?php echo $rowUser['user_id']; ?>"><b style="color: green;"><?php echo ucfirst($rowUser['status']); ?></b></a> 
                                       <?php } else { ?>
                                        <b style="color: red;"><?php echo ucfirst($rowUser['status']); ?></b>
                                        <?php } ?>

                                        </td>
                            
                                 <td>
                                        <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a>

                                      <a href="index.php?page=user_action&action=delete&user_id=<?php echo $rowUser['idUser']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
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