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
           

<!-- Printi paper -->
     <!-- Print size -->
             <!--  -->
    
             <textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script>
    function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
    </script>

 <div id="print-area-2" class="print-area">
    <div align="left">
         <!-- <div class="btn btn-warning" style="text-align:center; padding: 10px" align="center"> -->
            <a class="no-print btn btn-warning" style="margin: 20px" href="javascript:printDiv('print-area-2');">Print</a>
        <!-- </div> -->
    <div>
<!-- align="center" -->
<!-- Drop Down -->
<!-- <div class="dropdown show" align="right">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown link
  </a> -->

  <select class="btn btn-info" aria-labelledby="dropdownMenuLink" onchange="if (this.value) window.location.href=this.value">
  <option selected>Select Package</option>
      <?php 
      $get = "select * from package";
      $res = mysqli_query($con,$get);
      $n = mysqli_num_rows($res);
      if($n != 0){
          while($row = mysqli_fetch_array($res)){
            echo '<option value="index.php?page=Package_wise_report&id='.$row['idPackage'].'">'.$row['Package_name'].'</option>';              
          } 
      }
      else{
        echo '<option><a class="dropdown-item" href="#">No Package</a></option>';
      }
      ?>
  </select>
<!-- </div> -->
<!-- -/// -->


<!-- \\\\ -->

            <div class="card">
                <div class="card-header">
               
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title" align="center">Package-wise Report</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <!-- <th>Sr no. </th> -->
                                    <th>Order Date</th>
                                    <!-- <th>Event Date</th> -->
                                    <th>Event Address</th>
                                    <th>Event Date</th>
                                    <th>Album Address </th>
                                    <th>User Name </th>
                                    <th>Email </th>
                                    <th>Event type  </th>
                                    <th>Package</th>
                                    <th>Area  </th>
                                    <th>Price  </th>
                                </tr></thead><tbody>
                                 <?php 
                                    if(!empty($_GET['id'])){
                                        $n = $_GET['id'];   
                                $i = 1;
                                $selectProduct = "SELECT `event_order`.*, `user`.*, `additional_package`.*, `package`.*, `event_category`.*, `area`.*
                                FROM `event_order` 
                                  LEFT JOIN `user` ON `event_order`.`User_ID_idUser` = `user`.`idUser` 
                                  LEFT JOIN `additional_package` ON `event_order`.`Additional_Package_idAdditional_Package` = `additional_package`.`idAdditional_Package` 
                                  LEFT JOIN `package` ON `event_order`.`Package_idPackage` = `package`.`idPackage` 
                                  LEFT JOIN `event_category` ON `event_order`.`Event_Category_idEvent_Category` = `event_category`.`idEvent_Category` 
                                  LEFT JOIN `area` ON `event_order`.`Area_idArea` = `area`.`idArea` where Status = 4 or Status = 3 and `package`.`idPackage` = '$n'";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                while($rowProduct = mysqli_fetch_array($qryProduct))
                                {
                                ?><tr>
                                    <!-- <td><?php echo $i; ?></td> -->
                                    <td><?php echo $rowProduct['Event_Order_Date']; ?></td>
                                    <td><?php echo $rowProduct['Event_Address']; ?></td>
                                    <td><?php echo $rowProduct['Event_Date']; ?></td>
                                    <!-- <td><?php //echo $rowProduct['Last_Date_Event']?></td> -->
                                    <td><?php echo $rowProduct['Album_Delivery_Address']?></td>
                                    <td><?php echo $rowProduct['User_Fname']?></td>
                                    <td><?php echo $rowProduct['User_Email']?></td>
                                    <!-- <td><?php //echo $rowProduct['Additional_Package_idAdditional_Package']?></td> -->
                                    <td><?php echo $rowProduct['Event_Type']?></td>
                                    <td><?php echo $rowProduct['Package_name']?></td>
                                    <td><?php echo $rowProduct['Area_Name']?></td>
                                    <td>₹<?php echo $rowProduct[12]?></td>
                                </tr>
                                <?php $i++; }} ?>
 
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