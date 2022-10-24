<?php
@$admin_id = $_REQUEST['idUser'];
$selectAdmin = "SELECT * FROM `User` WHERE `idUser` = '" . $admin_id . "' ";
$qryAdmin = mysqli_query($con, $selectAdmin);
$rowAdmin = mysqli_fetch_assoc($qryAdmin);
if (@$_REQUEST['idUser'] != "") {
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
                                            <h4 class="card-title" id="basic-layout-form">Package Form</h4>
                                        </div>
                                        <!-- Here is -->
                                    </div>
                                    <div class="card-body">
                                        <div class="px-3">
                                            <form class="form" action="index.php?page=package_action" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>" required>
                                                <input type="hidden" name="idUser" value="<?php echo $rowAdmin['idUser']; ?>" required>
                                                <div class="form-body">
                                                    <h4 class="form-section">
                                                        <i class="icon-user"></i> Package Details
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1">Package_name</label>
                                                                <input type="text" id="projectinput1" onkeyup="charonly(this)" class="form-control" value="<?php echo $rowAdmin['Package_name']; ?>" name="Package_name" required="">
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
                                                                <label for="projectinput2">Package_NumberOfImages</label>
                                                                <input type="text" id="projectinput2" onkeyup="numberonly(this)" class="form-control" value="<?php echo $rowAdmin['Package_NumberOfImages']; ?>" name="Package_NumberOfImages" required>
                                                            </div>
                                                            <script>
                                                                function numberonly(input) {
                                                                    var num = /[^0-9]/gi;
                                                                    input.value = input.value.replace(num, "");

                                                                }
                                                            </script>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput3">Package_MinsOfVideos </label>
                                                                <input type="text" id="projectinput3" class="form-control" value="<?php echo $rowAdmin['Package_MinsOfVideos']; ?>" name="Package_MinsOfVideos" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">Number_Of_Frame </label>
                                                                <input type="text" id="projectinput4" onkeyup="numberonly(this)" class="form-control" value="<?php echo $rowAdmin['Number_Of_Frame']; ?>" name="Number_Of_Frame" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput3">Live_Reception </label>
                                                                <!-- <input type="text" id="projectinput3" class="form-control" value="<?php echo $rowAdmin['Live_Reception']; ?>" name="Live_Reception" required> -->
                                                                <select class="form-control" name="Live_Reception">
                                                                    <option value="0">No</option>
                                                                    <option value="1">Yes</option>
                                                                </select>

                                                            </div>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">Drone_Shoot </label>
                                                                <!-- <input type="text" id="projectinput4"
                                                                    class="form-control"
                                                                    value="<?php echo $rowAdmin['Drone_Shoot']; ?>"
                                                                    name="Drone_Shoot" required> -->
                                                                    <select class="form-control" name="Drone_Shoot">
                                                                    <option value="0">No</option>
                                                                    <option value="1">Yes</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">Package_Price </label>
                                                            <input type="text" id="projectinput3" onkeyup="numberonly(this)" class="form-control" value="<?php echo $rowAdmin['User_Email']; ?>" name="Package_Price" required>
                                                        </div>
                                                    </div>



                                                </div>

                                                <center>
                                                    <div class="form-actions">
                                                        <input type="submit" name="submit" class="btn btn-success">
                                                        <!-- <button type="button" name="submit" class="btn btn-success">
                  <i class="icon-note"></i> Save
                </button>
                <button type="button" name="reset" class="btn btn-danger mr-1">
                  <i class="icon-trash"></i> Cancel
                </button> -->
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
            <p class="clearfix text-muted text-center px-2"><span>Copyright &copy; 2018 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>

    </div>
</div>