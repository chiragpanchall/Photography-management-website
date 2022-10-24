<?php
include("config.php");
?>
<div class="wrapper">

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
     
                <div class="card-header">
                    <div class="mb-3 pull-right">
              <!-- <a href="index.php?page=user" class="btn gradient-blue-grey-blue white"><i class="icon-user"></i>&nbsp;   Add  User</a> -->
              
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
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile no</th> 
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <!-- <th>Gender</th> -->
                                    <!-- <th>Create Date</th> -->
                                    <!-- <th>Update Date</th> -->
                                    <!-- <th>Status</th> -->
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $selectAdmin = "SELECT * FROM `user` where isAdmin = 0";
                                $qryAdmin = mysqli_query($conn,$selectAdmin);
                                while($rowAdmin = mysqli_fetch_array($qryAdmin))
                                {
                                    echo "<script>".$rowAdmin['User_Fname']."</script>";
                                ?>
                                
                                 <tr>
                               
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowAdmin['User_Fname']; ?></td>
                                    <td><?php echo $rowAdmin['User_Lname']; ?></td>
                                    <td><?php echo $rowAdmin['User_MobileNo']; ?></td>    
                                    <td><?php echo $rowAdmin['User_Email']; ?></td>
                                    <!-- <td><?php echo $rowAdmin['User_Password']; ?></td> -->
                                    <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "\Final_Project\Data\ProfilePic\\".$rowAdmin['User_Photo_Path']; ?>">
                                    </td>
                                   
                                    
                                    <!-- <td><?php echo $rowAdmin['Company_idCompany']; ?></td> -->
                                   
                                    
                                    <!-- <td>
                                        <?php 
                                        if ($rowAdmin['status']=="active") 
                                        { ?>
                                           <a onclick="return confirm('Are You Sure Want To Account Inactive...???')" href="index.php?page=admin_action&action=inactive&idUser=<?php echo $rowAdmin['idUser']; ?>"><b style="color: green;"><?php echo ucfirst($rowAdmin['status']); ?></b></a> 
                                       <?php } else { ?>
                                        <b style="color: red;"><?php echo ucfirst($rowAdmin['status']); ?></b>
                                        <?php } ?>

                                        </td> -->
                                    <!-- <td>
                                        <a href="index.php?page=admin&idUser=<?php echo $rowAdmin['idUser']; ?>" class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a>

                                      <a href="index.php?page=admin_action&action=delete&idUser=<?php echo $rowAdmin['idUser']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
                                    </td> -->
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