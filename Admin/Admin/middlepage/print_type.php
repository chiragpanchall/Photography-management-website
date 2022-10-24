<?php 
include_once('config.php');
$action = "insert";
// $idPrint_Type  = $_REQUEST['idPrint_Type '];
// $selectCategory = "SELECT * FROM print_type WHERE `idPrint_Type ` = '".$idPrint_Type ."' ";
// $qryCategory = mysqli_query($conn,$selectCategory);
// $rowCategory = mysqli_fetch_assoc($qryCategory);
// if ($_REQUEST['idPrint_Type ']!="") 
// {
//    $action = "update";
// }
// else
// {
//   $action = "insert";
// }


?>

 <div class="wrapper">

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title-wrap bar-success">
            <h4 class="card-title" id="basic-layout-form">Print Type Details </h4>
          </div>
          </div>

        <div class="card-body">
          <div class="px-3">
            <form class="form" action="index.php?page=print_action&" method="post" enctype="multipart/form-data">
               <input type="hidden" name="action" value="<?php echo $action; ?>">
              <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Print Type </h4>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Product Name</label>
                      <select class="form-control" name="idProduct">
                        
                        <?php $selectCat = mysqli_query($conn,"SELECT * FROM `product` ");
                              while($rwCat = mysqli_fetch_assoc($selectCat))
                              {
                        ?>
                        <option value="<?php echo $rwCat['idProduct']; ?>" ><?php echo $rwCat['Product_Name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Print Type</label>
                      <input type="text" id="projectinput1" class="form-control" value="<?php //echo $rowCategory['Print_Size']; ?>" name="Print_Size" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">Print Price</label>
                     <input type="text" id="projectinput1" class="form-control" value="<?php //echo $rowCategory['Print_Price']; ?>" name="Print_Price" required>
                    </div>
                  </div>


                </div>    
              </div>
            </div>

               <center>
                 
                <div class="col-md-6">
              <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success">
                </div>
                </center>
            
                   <!-- <div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>
                    </div>
                   </center>-->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- // Basic form layout section end -->
            </div>
          </div>
        </div>

        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2018 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>

      </div>
    </div>
    
   