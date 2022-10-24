<?php 
@$admin_id = $_REQUEST['idUser'];
$selectAdmin = "SELECT * FROM `User` WHERE `idUser` = '".$admin_id."' ";
$qryAdmin = mysqli_query($con,$selectAdmin);
$rowAdmin = mysqli_fetch_assoc($qryAdmin);
if (@$_REQUEST['idUser']!="") 
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
                                            <h4 class="card-title" id="basic-layout-form">Admin Form</h4>
                                        </div>
                                        <!-- Here is -->
                                    </div>
                                    <div class="card-body">
                                        <div class="px-3">
                                            <form class="form" action="index.php?page=admin_action" method="post"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>">
                                                <input type="hidden" name="idUser"
                                                    value="<?php echo $rowAdmin['idUser']; ?>">
                                                <div class="form-body">
                                                    <h4 class="form-section">
                                                        <i class="icon-user"></i> Admin Details
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1">First Name</label>
                                                                <input type="text" id="firstname"
                                                                    onkeyup="charonly(this)" class="form-control"
                                                                    value="<?php echo $rowAdmin['User_Fname']; ?>"
                                                                    name="fname" required>
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
                                                                <label for="projectinput2">Last Name</label>
                                                                <input type="text" id="lastname"
                                                                    onkeyup="charonly(this)" class="form-control"
                                                                    value="<?php echo $rowAdmin['User_Lname']; ?>"
                                                                    name="lname" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput3">E-mail</label> <b><span
                                                                        class="required" id="availablity">*</span></b>
                                                                <input type="text" id="mail"
                                                                    class="form-control nput-text required-entry validate-email"
                                                                    title="Email Address"
                                                                    value="<?php echo $rowAdmin['User_Email']; ?>"
                                                                    name="email" required>
                                                            </div>
                                                            
                                                            
                                                            <!-- <script>
                                                            var atpos = mail.indexOf("@");
                                                            var dotpos = mail.indexOf(".");
                                                            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= mail
                                                                .length) {
                                                                //alert("Please Enter Valid E-mail Address!!!");
                                                                seterror("email", " * Invalid Email");
                                                                rvalue = false;
                                                            }
                                                            </script> -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">Password</label>
                                                                <input type="password" id="password" pattern=".{8,}"
                                                                    class="form-control input-text required-entry validate-password"
                                                                    value="<?php echo $rowAdmin['User_Password']; ?>"
                                                                    name="password" required>
                                                            </div>
                                                        </div>
                                                        <script>
                                                        var pass = document.getElementById("password").value;
                                                        if (pass.length < 8) {
                                                            seterror("pass", " * minimum length is 8");
                                                            rvalue = false;
                                                        }
                                                        </script>
                                                    </div>
                                                    

                                                    <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput4">Mobile No</label>
                                                                <input type="text" id="User_Mobile" pattern=".{10,}" maxlength="10" class="form-control input-text required-entry validate-password" onkeyup="numberonly(this)" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter Numeric value only" 
                                                                    value="<?php echo $rowAdmin['User_Mobile']; ?>"
                                                                    name="User_Mobile" required>
                                                            </div>
                                                            <script>
                                                                function numberonly(input)
                                                            {
                                                                var num = /[^0-9]/gi;
                                                                input.value = input.value.replace(num,"");
                                                                
                                                            }
                                                            </script>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Profile</label>
                                                                <div class="input-group md-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Upload</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            name="profile" id="inputGroupFile01" accept="image/png, image/gif, image/jpeg"  required>
                                                                        <label class="custom-file-label"
                                                                            for="inputGroupFile01" >Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <!-- <img style="height: 50px; width: 50px; border-radius: 100px;"
                                                                    src="<?php echo "upload/admin/".$rowAdmin['User_Photo_Path']; ?>">
                                                            -->  
                                                        </div>
                                                        </div>

                                                        <!-- <div class="col-md-6">
                                                            <div class="form-group">


                                                                <label class="col-md-3 label-control">Gender </label>

                                                                <div class="input-group col-md-4">
                                                                    <div
                                                                        class="custom-control custom-radio display-inline-block">
                                                                        <input type="radio" id="customRadioInline1"
                                                                            name="gender" class="custom-control-input"
                                                                            value="male"
                                                                            <?php if(isset($rowAdmin['gender']) && $rowAdmin['gender']=="male") { echo "checked=checked"; } ?>>
                                                                        <label class="custom-control-label"
                                                                            for="customRadioInline1">Male</label>
                                                                    </div>
                                                                    &nbsp;
                                                                    <div
                                                                        class="custom-control custom-radio display-inline-block">
                                                                        <input type="radio" id="customRadioInline2"
                                                                            name="gender" class="custom-control-input"
                                                                            value="female"
                                                                            <?php if(isset($rowAdmin['gender']) && $rowAdmin['gender']=="female") { echo "checked=checked"; } ?>>
                                                                        <label class="custom-control-label"
                                                                            for="customRadioInline2">Female</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>

                                                <center>
                                                    <div class="form-actions">
                                                        <input type="submit" name="submit" class="btn btn-success" onClick='return ValidateMe()'required >

                                                        <script>
                                                         function  ValidateMe() {
                                                            var mail = document.getElementById("mail").value;
                                                            var atpos = mail.indexOf("@");
                                                            var dotpos = mail.indexOf(".");
                                                            if(atpos<1 || dotpos<atpos+2 ||	 dotpos+2>=mail.length)
                                                            {
                                                               alert("Please Enter Valid EMail");
                                                                 return false;
                                                            }  
                                                         }

                                                        </script>

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
            <p class="clearfix text-muted text-center px-2"><span>Copyright &copy; 2018 <a
                        href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank"
                        class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>

    </div>
</div>
