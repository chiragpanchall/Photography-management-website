<?php 
include_once("config.php");

$POD = "select count(*) from printing_order";
$P1 = mysqli_query($conn,$POD);
$P2 = mysqli_fetch_array($P1);
echo $P3  = $P2[0];
$EOD = "select count(*) from event_order";
$E1 = mysqli_query($conn,$EOD);
$E2 = mysqli_fetch_array($E1);
echo $E3  = $E2[0];
$USR = "select count(*) from user";
$U1 = mysqli_query($conn,$USR);
$U2 = mysqli_fetch_array($U1);
echo $U3  = $U2[0];

?> 
 
 
 
 <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!--Statistics cards Starts-->
<div class="row">
	<div class="col-xl-4 col-lg-6 col-md-6 col-12">
		<div class="card bg-white">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h4 class="font-medium-5 card-title mb-0">
							
							<?php echo $U3;?>
							</h4>
							<span class="grey darken-1"><b>Total Customer</b></span>
						</div>
						<div class="media-right text-right">
							<i class="icon-cup font-large-1 primary"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart" class="height-150 lineChartWidget WidgetlineChart mb-2">
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-12">
		<div class="card bg-white">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h4 class="font-medium-5 card-title mb-0">
							<?php echo $P3;?>
							</h4>
							<span class="grey darken-1"><b>Total Printing Order</b></span>
						</div>
						<div class="media-right text-right">
							<i class="icon-wallet font-large-1 warning"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart1" class="height-150 lineChartWidget WidgetlineChart1 mb-2">
				</div>

			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-12">
		<div class="card bg-white">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h4 class="font-medium-5 card-title mb-0">
							<?php echo $E3;?>
							</h4>
							<span class="grey darken-1"><b>Total Event Order</b></span>
						</div>
						<div class="media-right text-right">
							<i class="icon-basket-loaded font-large-1 success"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-150 lineChartWidget WidgetlineChart2 mb-2">
				</div>
			</div>
		</div>
	</div>
</div>
<!--Statistics cards Ends-->


            </div>
          </div>
        </div>

         <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; 2021 <a href="#" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">SP Photography </a>, All rights reserved. </span></p>
        </footer>

       

      </div>