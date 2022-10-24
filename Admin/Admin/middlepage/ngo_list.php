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
              <a href="index.php?page=ngo" class="btn gradient-blue-grey-blue white"><i class="icon-user"></i>&nbsp;   Add NGO</a>
              
            </div>
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">NGO List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Ngo Name</th>
                                    <th>Ngo Disc</th>
                                    <th>Ngo Type</th>
                                    <th>Ngo Address</th>
                                    <th>Ngo City</th>
                                    <th>Ngo Pincode</th>
                                    <th>Action </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                  <?php 
                                $i = 1;
                                $selectNgo = "SELECT * FROM `ngo` ";
                                $qryNgo = mysqli_query($con,$selectNgo);
                                while($rowNgo = mysqli_fetch_assoc($qryNgo))
                                {
                                ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowNgo['n_name']; ?></td>
                                    <td><?php echo $rowNgo['des']; ?></td>
                                    <td><?php echo $rowNgo['n_type']; ?></td>
                                    <td><?php echo $rowNgo['address']; ?></td>
                                    <td><?php echo $rowNgo['city']; ?></td>
                                    <td><?php echo $rowNgo['pincode']; ?></td>
                                         <td>
                                        <a href="index.php?page=ngo&ngo_id=<?php echo $rowNgo['ngo_id']; ?>" class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a>

                                      <a href="index.php?page=ngo_action&action=delete&ngo_id=<?php echo $rowNgo['ngo_id']; ?>" class="btn btn-outline-danger mr-1"><i class="fa fa-trash"></i></a>
                                    </td>
                               
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