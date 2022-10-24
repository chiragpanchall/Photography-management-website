<?php 
@$product_id = $_REQUEST['product_id'];
$selectProduct = "SELECT * FROM `product` WHERE `idProduct` = '".$product_id."' ";
$qryProduct = mysqli_query($con,$selectProduct);
$rowProduct = mysqli_fetch_assoc($qryProduct);
if (@$_REQUEST['product_id']!="") 
{
   $action = "update";
}
else
{
  $action = "insert";
}


?>

<div class="wrapper">

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Basic form layout section start -->
                    <section id="basic-form-layouts">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-success">
                                            <h4 class="card-title" id="basic-layout-form">Additional Package Form</h4>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="px-3">
                                            <form class="form" action="index.php?page=additional_package_action"
                                                method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>">
                                                <input type="hidden" name="product_id"
                                                    >
<!-- value="<?php //echo $rowProduct['idProduct']; ?>" -->
                                                <form class="form">
                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="icon-user"></i> Package Details
                                                        </h4>
                                                        <div class="row">



                                                        </div>
                                                        <div class="row">


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Frames</label>
                                                                    <input type="text" id="projectinput1"
                                                                        onkeyup="numberonly(this)" class="form-control"
                                                                        
                                                                        name="Frames">
                                                                </div>
                                                                <!-- value="<?php //echo $rowProduct['product_name']; ?>" -->
                                                                <script>
                                                                function numberonly(input) {
                                                                    var num = /[^0-9]/gi;
                                                                    input.value = input.value.replace(num, "");

                                                                }
                                                                </script>
                                                            </div>
<script>function numberonly(input)
          {
              var num = /[^0-9]/gi;
              input.value = input.value.replace(num,"");

          }</script>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Video_Duration</label>
                                                                    <input type="text" id="projectinput1" onkeyup="numberonly(this)" 
                                                                        class="form-control"                                                        
                                                                        name="Video_MDuration">
                                                                </div>
                                                            </div>
<!-- value="<?php //echo $rowProduct['Product_Type']; ?>" -->


                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Price</label>
                                                                    <input type="text" id="projectinput1"  onkeyup="numberonly(this)"
                                                                        class="form-control"
                                                                        value="<?php echo $rowProduct['Product_MaterialType']; ?>"
                                                                        name="Price">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Images</label>
                                                                    <input type="text" id="projectinput1"  onkeyup="numberonly(this)"
                                                                        class="form-control"
                                                                        value="<?php echo $rowProduct['Product_MaterialType']; ?>"
                                                                        name="Images">
                                                                </div>
                                                            </div>
 </div>
          

                                                            <div class="row">


                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="projectinput1">Drone_Shooting</label>
                                                                        <!-- <input type="text" id="projectinput1"
                                                                            class="form-control"
                                                                            value="<?php echo $rowProduct['product_name']; ?>"
                                                                            name="Drone_Shooting"> -->
                                                                            <select class="form-control" name="Drone_Shooting">
                                                                            <option value="0">No</option>
                                                                             <option value="1">Yes</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
<!--                                                                         
                                                                        <!--  -->

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">Live_Shooting</label>
                                                                         <select class="form-control" name="Live_Shooting">
                                                                             <option value="0">No</option>
                                                                             <option value="1">Yes</option>
                                                                            </select>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <center>
                                            <div class="form-actions">
                                                <input type="submit" name="submit" class="btn btn-success">

                                                <!--<center>  
                    <div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>-->
                                            </div>
                                    </div>
                                    </center>
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
    <p class="clearfix text-muted text-center px-2"><span>Copyright &copy; 2018 <a
                href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank"
                class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
</footer>

</div>
</div>