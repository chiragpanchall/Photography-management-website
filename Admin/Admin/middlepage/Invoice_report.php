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

 <!-- <div id="print-area-2" class="print-area">
    <div align="left">
            <a class="no-print btn btn-warning" style="margin: 20px" href="javascript:printDiv('print-area-2');">Print</a>
    <div> -->
<!-- align="center" -->
<!-- Drop Down -->
<!-- <div class="dropdown show" align="right">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown link
  </a> -->

  <table>
      <tr>
          <!-- Select the order type -->
       <td>
       <select class="btn btn-info" aria-labelledby="dropdownMenuLink" onchange="if (this.value) window.location.href=this.value">
  <option selected>Select Order Type</option>
  <option value="index.php?page=invoice_report&oid=1">Event Order</option>
  <option value="index.php?page=invoice_report&oid=2">Printing Order </option>
  </select>
       </td>

<!-- Select date -->
       <td>
       <select class="btn btn-info" aria-labelledby="dropdownMenuLink" onchange="if (this.value) window.location.href=this.value">
  <option selected>Select Date</option>
      <?php 
    if(!empty($_GET['oid'])){  //Event Order date
      //echo "<script>alert('Event order selected".$_GET['oid']."')</script>";
        if($_GET['oid'] == 1){
             $get = "SELECT * FROM `event_order` WHERE `Status` = 3 or `Status` = 4";
             //alertme($get);
            $res = mysqli_query($con,$get);
            $n = mysqli_num_rows($res);
            $uri = 'index.php?page=invoice_report&oid=1&did=';
           // alertme($uri);
            if($n != 0){       echo "Event order data fetched";
                while($row = mysqli_fetch_array($res)){
                    echo '<option value="'.$uri.$row['idEvent_Order'].'">'.$row['Event_Order_Date'].'</option>';              
                } 
            }
            else{ echo "Event order data empty";
                echo '<option><a class="dropdown-item" href="#">No Product</a></option>';
                } 

        }
        else {

             $get = "SELECT * FROM `printing_order` WHERE `Status` = 3 or `Status` = 4";
           //  alertme($get);
            $res = mysqli_query($con,$get);
            $n = mysqli_num_rows($res); 
            $uri = 'index.php?page=invoice_report&oid=2&did=';
           // alertme($uri);
            if($n != 0){  echo "printing order data fetched";
                 while($row = mysqli_fetch_array($res)){
                    echo '<option value="'.$uri.$row['idPrinting_Order'].'">'.$row['Printing_Order_Date'].'</option>';              
                    } 
            }
            else{ echo "Printing order data empty";
                echo '<option><a class="dropdown-item" href="#">No Product</a></option>';
            }
         }
    }
    else {echo "oid not fetched";}
      ?>
  </select>
       </td> 
      <!-- Select User -->
       <td>
       <select class="btn btn-info" aria-labelledby="dropdownMenuLink" onchange="if (this.value) window.location.href=this.value">
  <option selected>Select User</option>
  <?php 
      if(!empty($_GET['did'])){ //User
        if($_GET['oid'] == 1){
            $did = $_GET['did'];
            echo $get = "SELECT * FROM `event_order`LEFT JOIN user on event_order.User_ID_idUser = user.idUser WHERE Status = 3   AND `idEvent_Order` = '$did'";
            alertme($get); 
            $res = mysqli_query($con,$get);
            $n = mysqli_num_rows($res);
            $uri = 'index.php?page=invoice_report&oid='.$_GET['oid'].'&did='.$_GET['did'].'&uid=';
            if($n != 0){     echo "user selected"; 
                while($row = mysqli_fetch_array($res)){
                    echo '<option value="'.$uri.$row['idUser'].'">'.$row['User_Fname']." ".$row['User_Lname']." [ ".$row['User_Email']." ]".'</option>';              
                } 
            }
            else{ echo "user empty";
                echo '<option><a class="dropdown-item" href="#">No Product</a></option>';
                }
       }
        else { echo "printing order selected";
          $did = $_GET['did'];
          echo  $get = "SELECT * FROM `printing_order` LEFT JOIN user on `printing_order`.`User_idUser` = user.idUser WHERE Status = 3   AND `idPrinting_Order` =  '$did' ";
          $res = mysqli_query($con,$get);
            $n = mysqli_num_rows($res); 
            $uri = 'index.php?page=invoice_report&oid='.$_GET['oid'].'&did='.$_GET['did'].'&uid=';
            if($n != 0){
              echo "data printing order fetched";
                   while($row = mysqli_fetch_array($res)){
                      echo '<option value="'.$uri.$row['idUser'].'">'.$row['User_Fname']." ".$row['User_Lname'].'</option>';              
                    } 
            }
            else{ echo "prinitng order data empty";
                echo '<option><a class="dropdown-item" href="#">No User found</a></option>';
          }
        }
    }
    else { echo "Not gotten";}
      ?>
  </select>
       </td>   
      </tr>
  </table>
  


            <div class="card">
                <div class="card-header">
                    <!--  -->
    <div id="print-area-2" class="print-area">
    <div align="left">
            <a class="no-print btn btn-warning" style="margin: 20px" href="javascript:printDiv('print-area-2');">Print</a>
    <div>
    <!--  -->
    <?php 
     if( (!empty($_GET['oid'])) && (!empty($_GET['did'])) && (!empty($_GET['uid'])) )
     {    
         $did =  $_GET['did'];
         $uid = $_GET['uid'];
         if($_GET['oid'] == 2){
           $getq = "SELECT `printing_order`.*, `printing_order_details`.*, `print_type`.*, `product`.*, `offer`.`Offer_Details`, `user`.*
            FROM `printing_order` 
                LEFT JOIN `printing_order_details` ON `printing_order_details`.`Printing_Order_idPrinting_Order_Details` = `printing_order`.`idPrinting_Order` 
                LEFT JOIN `print_type` ON `printing_order_details`.`Print_Type_idPrint_Type` = `print_type`.`idPrint_Type` 
                LEFT JOIN `product` ON `print_type`.`Product_idProduct_Id` = `product`.`idProduct` 
                LEFT JOIN `offer` ON `printing_order`.`Offer_idOffer` = `offer`.`idOffer` 
                LEFT JOIN `user` ON `printing_order`.`User_idUser` = `user`.`idUser` where  Status = 3 and user.idUser = '$uid' and printing_order.idPrinting_Order  = '$did'";
            $result = mysqli_query($con,$getq);
            $data = mysqli_fetch_array($result);
            $Type_of_order = "Event Order";
            $Fullname = $data['User_Fname']." ".$data['User_Lname'];
            $total_amount = $data['Total_Amount'];
            $order_name=$data['Product_Name'];
            $order_type=$data['Print_Size'];
            $order_date = $data['Printing_Order_Date'];
            $today_date = "";
         }
         else {
          $getq = "SELECT `event_order`.*, `user`.*, `additional_package`.*, `package`.*, `event_category`.*, `area`.*
            FROM `event_order` 
              LEFT JOIN `user` ON `event_order`.`User_ID_idUser` = `user`.`idUser` 
              LEFT JOIN `additional_package` ON `event_order`.`Additional_Package_idAdditional_Package` = `additional_package`.`idAdditional_Package` 
              LEFT JOIN `package` ON `event_order`.`Package_idPackage` = `package`.`idPackage` 
              LEFT JOIN `event_category` ON `event_order`.`Event_Category_idEvent_Category` = `event_category`.`idEvent_Category` 
              LEFT JOIN `area` ON `event_order`.`Area_idArea` = `area`.`idArea` where Status = 4 or Status = 3 and user.idUser = '$uid' and event_order.idEvent_Order = '$did'";
            $result = mysqli_query($con,$getq);
            $data = mysqli_fetch_array($result);
           $Type_of_order = "Event Order";
           $Fullname = $data['User_Fname']." ".$data['User_Lname'];
           $total_amount = $data[12];
            $order_name=$data['Event_Type'];
             $order_type=$data['Package_name'];
              $order_date =  date("jS D ,Y", strtotime($data['Event_Order_Date']));
             $today_date = date("jS D ,Y");
         }
     ?>
    
                    <h4 class="card-title" align="center"><u>SP Photography Order Invoice</u></h4>
                        <div class="card-title-wrap bar-success">
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
               <!-- Invoice order data -->
               <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light dark" />
    <meta name="supported-color-schemes" content="light dark" />
    <title></title>
 
    <style type="text/css" rel="stylesheet" media="all">
    @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
    body {
      width: 100% !important;
      height: 100%;
      margin: 0;
      -webkit-text-size-adjust: none;
    }
    
    a {
      color: #3869D4;
    }
    
    a img {
      border: none;
    }
    
    td {
      word-break: break-word;
    }
    
    .preheader {
      display: none !important;
      visibility: hidden;
      mso-hide: all;
      font-size: 1px;
      line-height: 1px;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;
    }
 
    
    body,
    td,
    th {
      font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
    }
    
    h1 {
      margin-top: 0;
      color: #333333;
      font-size: 22px;
      font-weight: bold;
      text-align: left;
    }
    
    h2 {
      margin-top: 0;
      color: #333333;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }
    
    h3 {
      margin-top: 0;
      color: #333333;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
    }
    
    td,
    th {
      font-size: 16px;
    }
    
    p,
    ul,
    ol,
    blockquote {
      margin: .4em 0 1.1875em;
      font-size: 16px;
      line-height: 1.625;
    }
    
    p.sub {
      font-size: 13px;
    }
    /* Utilities ------------------------------ */
    
    .align-right {
      text-align: right;
    }
    
    .align-left {
      text-align: left;
    }
    
    .align-center {
      text-align: center;
    }
       
    .button {
      background-color: #3869D4;
      border-top: 10px solid #3869D4;
      border-right: 18px solid #3869D4;
      border-bottom: 10px solid #3869D4;
      border-left: 18px solid #3869D4;
      display: inline-block;
      color: #FFF;
      text-decoration: none;
      border-radius: 3px;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
      -webkit-text-size-adjust: none;
      box-sizing: border-box;
    }
    
    .button--green {
      background-color: #22BC66;
      border-top: 10px solid #22BC66;
      border-right: 18px solid #22BC66;
      border-bottom: 10px solid #22BC66;
      border-left: 18px solid #22BC66;
    }
    
    .button--red {
      background-color: #FF6136;
      border-top: 10px solid #FF6136;
      border-right: 18px solid #FF6136;
      border-bottom: 10px solid #FF6136;
      border-left: 18px solid #FF6136;
    }
    
    @media only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
        text-align: center !important;
      }
    }
    
    
    .attributes {
      margin: 0 0 21px;
    }
    
    .attributes_content {
      background-color: #F4F4F7;
      padding: 16px;
    }
    
    .attributes_item {
      padding: 0;
    }
    
    
    .related {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }
    
    .related_item {
      padding: 10px 0;
      color: #CBCCCF;
      font-size: 15px;
      line-height: 18px;
    }
    
    .related_item-title {
      display: block;
      margin: .5em 0 0;
    }
    
    .related_item-thumb {
      display: block;
      padding-bottom: 10px;
    }
    
    .related_heading {
      border-top: 1px solid #CBCCCF;
      text-align: center;
      padding: 25px 0 10px;
    }
    
    .discount {
      width: 100%;
      margin: 0;
      padding: 24px;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;
      border: 2px dashed #CBCCCF;
    }
    
    .discount_heading {
      text-align: center;
    }
    
    .discount_body {
      text-align: center;
      font-size: 15px;
    }
    
    .social {
      width: auto;
    }
    
    .social td {
      padding: 0;
      width: auto;
    }
    
    .social_icon {
      height: 20px;
      margin: 0 8px 10px 8px;
      padding: 0;
    }
    
    .purchase {
      width: 100%;
      margin: 0;
      padding: 35px 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }
    
    .purchase_content {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }
    
    .purchase_item {
      padding: 10px 0;
      color: #51545E;
      font-size: 15px;
      line-height: 18px;
    }
    
    .purchase_heading {
      padding-bottom: 8px;
      border-bottom: 1px solid #EAEAEC;
    }
    
    .purchase_heading p {
      margin: 0;
      color: #85878E;
      font-size: 12px;
    }
    
    .purchase_footer {
      padding-top: 15px;
      border-top: 1px solid #EAEAEC;
    }
    
    .purchase_total {
      margin: 0;
      text-align: right;
      font-weight: bold;
      color: #333333;
    }
    
    .purchase_total--label {
      padding: 0 15px 0 0;
    }
    
    body {
      background-color: #F4F4F7;
      color: #51545E;
    }
    
    p {
      color: #51545E;
    }
    
    p.sub {
      color: #6B6E76;
    }
    
    .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;
    }
    
    .email-content {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }
    /* Masthead ----------------------- */
    
    .email-masthead {
      padding: 25px 0;
      text-align: center;
    }
    
    .email-masthead_logo {
      width: 94px;
    }
    
    .email-masthead_name {
      font-size: 16px;
      font-weight: bold;
      color: #A8AAAF;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
    }
    /* Body ------------------------------ */
    
    .email-body {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
    }
    
    .email-body_inner {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
    }
    
    .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
    }
    
    .email-footer p {
      color: #6B6E76;
    }
    
    .body-action {
      width: 100%;
      margin: 30px auto;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
    }
    
    .body-sub {
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #EAEAEC;
    }
    
    .content-cell {
      padding: 35px;
    }
    /*Media Queries ------------------------------ */
    
    @media only screen and (max-width: 600px) {
      .email-body_inner,
      .email-footer {
        width: 100% !important;
      }
    }
    
    @media (prefers-color-scheme: dark) {
      body,
      .email-body,
      .email-body_inner,
      .email-content,
      .email-wrapper,
      .email-masthead,
      .email-footer {
        background-color: #333333 !important;
        color: #FFF !important;
      }
      p,
      ul,
      ol,
      blockquote,
      h1,
      h2,
      h3,
      span,
      .purchase_item {
        color: #FFF !important;
      }
      .attributes_content,
      .discount {
        background-color: #222 !important;
      }
      .email-masthead_name {
        text-shadow: none !important;
      }
    }
    
    :root {
      color-scheme: light dark;
      supported-color-schemes: light dark;
    }
    </style>
    <!--[if mso]>
    <style type="text/css">
      .f-fallback  {
        font-family: Arial, sans-serif;
      }
    </style>
  <![endif]-->
  </head>
  <body>
    <span class="preheader">This is an invoice for your purchase on {{ purchase_date }}. Please submit payment by {{ due_date }}</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
      <tr>
        <td align="center">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
              <td class="email-masthead">
                <a href="https://example.com" class="f-fallback email-masthead_name">
                <u><?php echo $Type_of_order;?></u>

              </a>
              </td>
            </tr>
            <!-- Email Body -->
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                  <!-- Body content -->
                  <tr>
                    <td class="content-cell">
                      <div class="f-fallback">
                        <h1>Hi, <?php echo $Fullname ;?>,</h1>
                        <p>Thanks for ordering. This is an invoice for your recent purchase.</p>
                        <table class="attributes" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td class="attributes_content">
                              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                  <td class="attributes_item">
                                    <span class="f-fallback">
              <strong>Date:</strong> <?php echo $today_date ;?>
            </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="attributes_item">
                                    <span class="f-fallback">
              <strong>Total Amount:</strong> ₹<?php echo $total_amount ;?>
            </span>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <!-- Action -->
                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td align="center">
                              <!-- Border based button
           https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                              <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                <tr>
                                  <td align="center">
                                    <a href="{{action_url}}" class="f-fallback button button--green" target="_blank">Pay Invoice</a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table> -->
                        <table class="purchase" width="100%" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>
                              <h3>Ordered on</h3>
                            </td>
                            <td>
                              <h3 class="align-right"><?php echo $order_date ;?></h3>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                  <th class="purchase_heading" align="left">
                                    <p class="f-fallback">Description</p>
                                  </th>
                                  <th class="purchase_heading" align="right">
                                    <p class="f-fallback">Amount</p>
                                  </th>
                                </tr>
                                <!-- {{#each invoice_details}} -->
                                <tr>
                                    <td><?php echo $order_name ;?></td>
                                     <td></td>   
                                </tr>
                                <tr>
                                  <td width="80%" class="purchase_item"><span class="f-fallback">Type : <?php echo $order_type ;?></span></td>
                                  <td class="align-right" width="20%" class="purchase_item"><span class="f-fallback">₹<?php echo $total_amount ;?></span></td>
                                </tr>
                                <!-- {{/each}} -->
                                <tr>
                                  <td width="80%" class="purchase_footer" valign="middle">
                                    <p class="f-fallback purchase_total purchase_total--label">Total</p>
                                  </td>
                                  <td width="20%" class="purchase_footer" valign="middle">
                                    <p class="f-fallback purchase_total">₹<?php echo $total_amount ;?></p>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <p>If you have any questions about this invoice, simply call to this <a href="#">9898000012 </a> for help.</p>
                        <p>Cheers,
                          <br>SP Photography Team</p>
                        <!-- Sub copy -->
                        <!-- <table class="body-sub" role="presentation">
                          <tr>
                            <td>
                              <p class="f-fallback sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                              <p class="f-fallback sub">{{action_url}}</p>
                            </td>
                          </tr>
                        </table> -->
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                  <tr>
                    <td class="content-cell" align="center">
                      <p class="f-fallback sub align-center">&copy; 2021 [SP Photography]. All rights reserved.</p>
                      <p class="f-fallback sub align-center">
                        SP Photography, LLC
                        <br>1234 Street Rd. Narol
                        <br> Ahmedabad
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
  <?php }
     else {
        echo '<h1 class="container">Please select data and generate the report</h1>';
     }
    ?>
               <!-- Invoice order data -->
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
            </div>
          </div>
        </div>
      </div>
    </div>