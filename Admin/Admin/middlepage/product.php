<?php

@$product_id = $_REQUEST['product_id'];
$selectProduct = "SELECT * FROM `product` WHERE `idProduct` = '" . $product_id . "' ";
$qryProduct = mysqli_query($con, $selectProduct);
$rowProduct = mysqli_fetch_assoc($qryProduct);
if (@$_REQUEST['product_id'] != "") {
    $action = "update";
} else {
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
                                            <h4 class="card-title" id="basic-layout-form">Product Form</h4>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="px-3">
                                            <form class="form" action="index.php?page=product_action&action=insert" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>" required>
                                                <input type="hidden" name="product_id" value="<?php echo $rowProduct['idProduct']; ?>" required>

                                                <form class="form">
                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="icon-user"></i> Product Details
                                                        </h4>
                                                        <div class="row">



                                                        </div>
                                                        <div class="row">


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Product Name</label>
                                                                    <input type="text" id="productname" onkeyup="charonly(this)" class="form-control" value="<?php echo $rowProduct['product_name']; ?>" name="product_name" required>
                                                                </div>

                                                                <script>
                                                                    function charonly(input) {
                                                                        var char = /[^a-z]/gi;
                                                                        input.value = input.value.replace(char, "");
                                                                    }
                                                                </script>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Product Type</label>
                                                                    <input type="text" id="producttype" onkeyup="charonly(this)" class="form-control" value="<?php echo $rowProduct['Product_Type']; ?>" name="Product_Type" required>
                                                                </div>
                                                                <script>
                                                                    function charonly(input) {
                                                                        var char = /[^a-z]/gi;
                                                                        input.value = input.value.replace(char, "");
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Product Material
                                                                        type</label>
                                                                    <input type="text" id="productmaterial" onkeyup="charonly(this)" class="form-control" value="<?php echo $rowProduct['Product_MaterialType']; ?>" name="Product_MaterialType" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Product_img 1</label>
                                                                    <div class="input-group md-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Upload</span>
                                                                        </div>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="product_img1" id="inputGroupFile01" required accept="image/png, image/gif, image/jpeg">
                                                                            for="inputGroupFile01">Choose
                                                                            <label class="custom-file-label">file
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label>Product_img 2</label>
                                                                <div class="input-group md-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Upload</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="product_img2" id="inputGroupFile02" required accept="image/png, image/gif, image/jpeg">
                                                                        for="inputGroupFile01">Choose
                                                                        <label class="custom-file-label">file
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label>Product_img 3</label>
                                                                <div class="input-group md-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Upload</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="product_img3" id="inputGroupFile03" required accept="image/png, image/gif, image/jpeg"> 
                                                                        for="inputGroupFile01">Choose
                                                                        <label class="custom-file-label">file
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Product_img 4</label>
                                                                <div class="input-group md-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Upload</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="product_img4" id="inputGroupFile04" required accept="image/png, image/gif, image/jpeg"> 
                                                                        for="inputGroupFile01">Choose
                                                                        <label class="custom-file-label">file
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>


                                <center>
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-success" onclick="Alertme()">
<script>
function Alertmes(){
    alert('Product added Successfully');
}
</script>


                                   <center> 
                                        
                    <!-- <div class="form-actions">
                          <button type="button" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </button>-->
                                    <!-- </div>
                                    </div>
                                    </center> -->
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
    <p class="clearfix text-muted text-center px-2"><span>Copyright &copy; 2018 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
</footer>

</div>
</div>