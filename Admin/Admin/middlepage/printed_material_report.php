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


            <div class="card">
                <div class="card-header">
                  <!--   <div class="mb-3 pull-right">
              <a href="index.php?page=employee" class="btn gradient-blue-grey-blue white"><i class="fa fa-pencil-square-o"></i>&nbsp;Event Order</a>
              
              </div> -->
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title" align="center">Printing Material Selling report</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr no. </th>
                                    <th>Order Date</th>
                                    <!-- <th>Order Image</th> -->
                                    <th>Address</th>
                                    <th>User Name </th>
                                    <th>User Email </th>
                                    <th>Offer Details</th>
                                    <th>Print type </th>
                                    <th>Product Category  </th>
                                    <th> Quantity  </th>
                                    <th>Price  </th>
                                    <!-- <th>Status </th> -->
                                    <!-- <th> Operation </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                $i = 1;
                                $selectProduct = "SELECT `printing_order`.*, `printing_order_details`.*, `print_type`.*, `product`.*, `offer`.`Offer_Details`, `user`.*
                                FROM `printing_order` 
                                    LEFT JOIN `printing_order_details` ON `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order` 
                                    LEFT JOIN `print_type` ON `printing_order_details`.`Print_Type_idPrint_Type` = `print_type`.`idPrint_Type` 
                                    LEFT JOIN `product` ON `print_type`.`Product_idProduct_Id` = `product`.`idProduct` 
                                    LEFT JOIN `offer` ON `printing_order`.`Offer_idOffer` = `offer`.`idOffer` 
                                    LEFT JOIN `user` ON `printing_order`.`User_idUser` = `user`.`idUser` where  Status = 3";
                                $qryProduct = mysqli_query($con,$selectProduct);
                                while($rowProduct = mysqli_fetch_array($qryProduct))
                                {
                                ?>
                               
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowProduct['Printing_Order_Date']; ?></td>
                                    <!-- <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php echo "/Final_Project/Data/Order_Image/PrintedOrderImg/".$rowProduct['Printing_Order_Image']; ?>">
                                    </td> -->
                                    <td><?php echo $rowProduct['Delivery_Address']; ?></td>
                                    <td><?php echo $rowProduct['User_Fname']?></td>
                                    <td><?php echo $rowProduct['User_Email']?></td>
                                    <td><?php echo $rowProduct['Offer_Details']?></td>
                                    <td><?php echo $rowProduct['Print_Size']?></td>
                                    <td><?php echo $rowProduct['Product_Name']?></td>
                                    <td><?php echo $rowProduct['Printing_Order_Quantity']?></td>
                                    <td>₹<?php echo $rowProduct['Total_Amount']?></td>
                                    <!-- <td><?php //echo $rowProduct['Area_Name']?></td> -->
                                    <!-- <td><?php echo $rowProduct['Status']?></td> -->
                                    <!-- <td> -->
                                        <!--  -->
<?php
 $p1 = "/Final_Project/Admin/Admin/middlepage/printing_order_action.php?action=1&id=".$rowProduct['idPrinting_Order'];
 $p2 = "/Final_Project/Admin/Admin/middlepage/printing_order_action.php?action=1&id=".$rowProduct['idPrinting_Order'];
 $p3 = "/Final_Project/Admin/Admin/middlepage/printing_order_action.php?action=2&id=".$rowProduct['idPrinting_Order'];
?>
<!-- <select class="form-control" name="idProduct" onchange="location = this.value;"> -->
<!-- <option value="" selected>Action</option> -->
<!-- <option value="<?php //echo $p1;?>">Pending</option> -->
<!-- <option value="<?php echo $p2;?>" >Proccessing</option> -->
<!-- <option value="<?php echo $p3;?>" >Done</option> -->
  <!-- </select> -->
  <!-- <br/> -->
  <?php 
  if($rowProduct['Status'] == 0)
         echo "Waiting";
    else if($rowProduct['Status'] == 1)
         echo "Processing";
    else if($rowProduct['Status'] == 2)
         echo "Done";
  
    else {}     
  
  ?>
  <?php //echo ($rowProduct['Status'] == 0) ? "" : (($rowProduct['Status'] == 1) ? "Pending" : "Processing"); ?>
  <?php //echo ($rowProduct['Status'] == 0) ? "Pending"  :  "Processing" ; ?>
<?php //echo $rowProduct['Status'];?>
                                        <!--  -->
                                    <!-- </td> -->

                                   <!--  <td>
                                        <img style="height: 50px; width: 50px; border-radius: 100px;" src="<?php //echo "upload/product/".$rowProduct['product_img']; ?>">
                                    </td> -->
                                    <!-- <td><?php //echo $rowProduct['Product_Price']; ?></td>
                                    <?php //echo $rowProduct['Product_quantity']; ?>
                                    <td> -->
                                        <!-- <a class="btn btn-outline-success mr-1"><i class="fa fa-pencil"></i></a> -->
                                      <!-- <a href="index.php?page=product_action&action=delete&idProduct=<?php //echo $rowProduct['idEvent_Order']; ?>" class="btn btn-outline-danger mr-1" onclick="Pressme()"><i class="fa fa-trash"></i></a> -->
<!--  -->

<!--  -->
                                    </td>
                                </tr>
                                <?php $i++; } ?>

                            </tbody>
                          <script>
                          function Pressme(){
                              if(confirm('Are you sure want to delete Event order ?'))
                              {

                              }
                              else{

                              }
                          }
                          </script>
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