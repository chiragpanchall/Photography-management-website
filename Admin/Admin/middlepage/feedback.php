<?php 
@$feedback_id = $_REQUEST['feedback_id'];
$selectFeedback = "SELECT * FROM `feedback` WHERE `idFeedback` = '".$feedback_id."' ";
$qryFeedback = mysqli_query($con,$selectFeedback);
$rowFeedback = mysqli_fetch_assoc($qryFeedback);
if (@$_REQUEST['feedback_id']!="") 
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
            <div class="container-fluid"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title-wrap bar-success">
            <h4 class="card-title" id="basic-layout-form">Feedback Form</h4>
          </div>
         
        </div>
        <div class="card-body">
          <div class="px-3">
             <form class="form" action="index.php?page=feedback_action" method="post">
              <input type="hidden" name="action" value="<?php echo $action; ?>" required>
              <input type="hidden" name="idFeedback" value="<?php echo $rowFeedback['idFeedback']; ?>" required>
             <div class="form-body">
                <h4 class="form-section">
                  <i class="icon-user"></i> Feedback Details</h4>
                <div class="row">
                  <div class="row">
                   <div class="card-body">
                    <div class="card-block">
                        <span class="dropdown mr-2">
                          <button class="btn btn-outline-primary dropdown-toggle" type="button" value="<?php echo $rowFeedback['idUser']; ?>" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User_id
                          </button>
                          <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">45</a>
                            <a class="dropdown-item" href="#">89</a>
                            <a class="dropdown-item" href="#">67</a>
                          </span>
                        </span>
                
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="projectinput2">Email</label>
                      <input type="text" id="projectinput2" class="form-control" value="<?php echo $rowFeedback['User_Email']; ?>" name="email" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="projectinput3">Feedback</label>
                      <input type="text" id="projectinput3" class="form-control" value="<?php echo $rowFeedback['Feedback_Content']; ?>" name="feedback" required>
                    </div>
                  </div>
              </div>
            </div>
                </div> 
              </div>

            <center>  <div class="form-actions">
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
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2018 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>

      </div>
    </div>
    