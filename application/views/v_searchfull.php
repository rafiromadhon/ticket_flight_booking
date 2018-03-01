<!DOCTYPE html>
<html>
<head>
	<title>Flight Ticket Booking a Flat Responsive Widget Template :: w3layouts</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
	<h1>Flight Ticket Booking</h1>
	<div class="main-agileinfo">
		<div class="sap_tabs">			
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item"><span>Pencarian Penerbangan</span></li>		
				</ul>	
				<div class="clearfix"> </div>
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content roundtrip">
						<div class="mantap" style="color: #ffffff;">
							<div class="flight-wrapper">
								<div class="search-flight-title">
									<h4>
										Perjalanan dari
										<b><?php echo $_GET['from'] ?></b> ke
										<b><?php echo $_GET['to'] ?></b>
									</h4>


									<p>
										<b>
											<?php 

											$date = strtotime($_GET['depart_date']);
											echo date("D d M Y", $date);

											?>
										</b>
									</p>

									<p>
										<b>
											<span><?php echo $_GET['passengers'] ?> Penumpang, </span>
											<span>Kelas <?php echo $_GET['flight_class'] ?></span>
										</b>
									</p>
								</div>
							</div>

							<div class="search-flight">
								<div class="search-header">
									<div class="col-lg-3">
										<h4>Airline</h4>
									</div>
									<div class="col-lg-2">
										<h4>Depart</h4>
									</div>
									<div class="col-lg-2">
										<h4>Arrive</h4>
									</div>
									<div class="col-lg-2">
										<h4>Duration</h4>
									</div>
									<div class="col-lg-3">
										<h4>Price per Person</h4>
									</div>
								</div>
							</div>

							<!-- foreeach data as value -->
							<?php //var_dump($data) ?>
							<?php foreach ($data as $value) { ?>

							<div class="flight-rute row">

								<form class="row form-flight" action="<?php echo base_url('prebooking'); ?>" method="GET">
									<input type="hidden" name="passengers" value="<?php echo $_GET['passengers'] ?>">
									<input type="hidden" name="from" value="<?php echo $_GET['from'] ?>">
									<input type="hidden" name="to" value="<?php echo $_GET['to'] ?>">
									<input type="hidden" name="depart_date" value="<?php 
									//convert date to month day using php function
									$date = strtotime($_GET['depart_date']);
									echo date("D d M Y", $date);  
									?>">

									<input type="hidden" name="flight_class" value="<?php echo $_GET['flight_class'] ?>">
									<input type="hidden" name="id" value="<?php echo $value['ruteid']; ?>">

									<div class="col-lg-3">
										<p><?php echo $value['code']; ?></p>
										<p>Kelas <?php echo $value['class']; ?></p>
									</div>
									<div class="col-lg-2">
										<p>
											<?php 
											echo date('G:i:s', strtotime($value['depart_on']))
											?>
										</p>
										<p class="flight-rute-date">
											<?php 
											echo date('D d M Y', strtotime($value['depart_on']))
											?>
										</p>
										<p><?php echo $value['rute_from']; ?></p>
									</div>
									<div class="col-lg-2">
										<p>
											<?php 
											echo date('G:i:s', strtotime($value['arrive']))
											?>
										</p>
										<p class="flight-rute-date">
											<?php 
											echo date('D d M Y', strtotime($value['arrive']))
											?>
										</p>
										<p><?php echo $value['rute_to']; ?></p>
									</div>
									<div class="col-lg-2">
										<p>
											<?php 
												$datetime1 = new DateTime($value['depart_on']); //convert to datetime
												$datetime2 = new DateTime($value['arrive']); //convert to datetime
												$interval = $datetime1->diff($datetime2); //get interval from 2 datetime
												echo $interval->format('%d d %H h %i m'); //convert interval to harijammenit
												?>
											</p>
										</div>
										<div class="col-lg-3">
											<p class="flight-price">
												<!-- convert number to idr format -->
												<?php 
												echo "Rp." . strrev(implode('.', str_split(strrev(strval($value['price'])), 3)));
												?>
											</p>
										</div>
										<div class="col-lg-12 text-center">
											<input type="submit" name="submit" class="btn btn-primary" value="Pilih">
										</div>

										<?php } ?>
									</form>		
								</div>			
							</div>
						</div>
					</div>
					<div class="footer-w3l">
						<p class="agileinfo" style="color: #ffffff;"> &copy; 2018 Flight Ticket Booking . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
					</div>
					<!--script for portfolio-->
					<script src="<?php echo base_url() ?>assets/js/jquery.min.js"> </script>
					<script src="<?php echo base_url() ?>assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
						});		
					</script>
					<!--//script for portfolio-->
					<!-- Calendar -->
					<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css" />
					<script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
					<script>
						$(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						});
					</script>
					<!-- //Calendar -->
					<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
					</script>
					<!--//quantity-->
					<!--load more-->
					<script>
						$(document).ready(function () {
							size_li = $("#myList li").size();
							x=1;
							$('#myList li:lt('+x+')').show();
							$('#loadMore').click(function () {
								x= (x+1 <= size_li) ? x+1 : size_li;
								$('#myList li:lt('+x+')').show();
							});
							$('#showLess').click(function () {
								x=(x-1<0) ? 1 : x-1;
								$('#myList li').not(':lt('+x+')').hide();
							});
						});
					</script>
					<!-- //load-more -->
					<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


				</body>
				</html>