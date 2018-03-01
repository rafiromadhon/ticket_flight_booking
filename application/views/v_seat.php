<!DOCTYPE html>
<html>
<head>
	<title>Flight Ticket Booking a Flat Responsive Widget Template :: w3layouts</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/seat.css">
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
					<li class="resp-tab-item"><span>Round Trip</span></li>
					<li class="resp-tab-item"><span>One way</span></li>
					<li class="resp-tab-item"><span>Multi city</span></li>				
				</ul>	
				<div class="clearfix"> </div>	
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content roundtrip" style="background-color: #ffffff;">
						<div class="col-lg-7">
							<form action="<?php echo base_url('booking/proccess'); ?>" method="POST">
								<input type="hidden" name="key" value="<?php echo $_GET['key'] ?>">
								<table class="customer-table">
									
									<?php $i = 0; ?>
									<?php foreach ($data_form as $value) { ?>
									<?php $i++; ?>

									<tr>
										<td>
											<div onclick="pget(this.id)" id="p<?php echo $i ?>" class="customer-color id-p<?php echo $i ?>"></div>
										</td>
										<td>
											<span>
												<?php echo $value ?>
											</span>
										</td>
										<td>
											<input type="text" class="form-control" id="i<?php echo $i ?>" name="seat[]">
										</td>
									</tr>
									<?php } ?>
								</table>




							</div>

							<div class="seat">
								<?php for ($i=1; $i <= $seat['seat_total'] ; $i++) : ?>

								<?php if (count($seat['seat_booked_2']) != 0) : ?>
									<?php if (in_array($i, $seat['seat_booked_2'])) : ?>
								<div id="<?php echo $i ?>" class="seat-id seat-notavailable">
									<p><?php echo $i ?></p>
								</div>

									<?php else : ?>
								<div onclick="sget(this.id)" id="<?php echo $i ?>" class="seat-id">
									<p><?php echo $i ?></p>
								</div>
									<?php endif; ?>
								<?php else : ?>
								<div onclick="sget(this.id)" id="<?php echo $i ?>" class="seat-id">
									<p><?php echo $i ?></p>
								</div>
								<?php endif; ?>
								<?php endfor; ?>


							</div>

							<script>
								function pget(id){
									seat.p = id;
									$('.customer-color').removeClass('customer-selected');
									$('#' + id).addClass('customer-selected');
								}

								function sget(id){
									seat.selectSeat(id);
								}

								var seat = {
									p: '',
									pn: function(id){
										pn = id.replace('p', '');
										return pn;
									},
									selectSeat: function(id) {
										if ($('#' + id).attr('class') == 'seat-id') {

											if($('#i' + this.pn(this.p)).val() == '') {
												$('#' + id).addClass('seat-selected');
												console.log(this.pn(this.p));
												$('#' + this.pn(this.p)).val(id);
												$('#' + id).addClass('seat-for-' + this.p);
											}
										}
										else{
											cSeat = $('#' + id).attr('class');
											cSeatoc = cSeat.replace('seat-id seat-selected seat-for-p', '');
											$('#' + id).removeClass('seat-selected');
											$('#' + id).removeClass(cSeat.replace('seat-id', ''));
											$('#' + cSeatoc).val('');
										}
										console.log($('#' + id).attr('class'));
									}
								}
							</script>





							<div class="col-lg-5">
								<div class="flight-detail">
									<h4>
										<span></span> Detail Penerbangan
									</h4>
								</div>
								<div class="row">
									<table class="flight-table">
										<tr>
											<td>Airline</td>
											<td> : </td>
											<td>
												<?php echo $data_rute['code'] ?>
											</td>
										</tr>
										<tr>
											<td>Depart</td>
											<td> : </td>
											<td>
												<?php 
												echo date('G:i:s, D d M Y', strtotime($data_rute['depart_on']));
												?>
											</td>
										</tr>
										<tr>
											<td>Arrive</td>
											<td> : </td>
											<td>
												<?php 
												echo date('G:i:s, D d M Y', strtotime($data_rute['arrive']));
												?>
											</td>
										</tr>
										<tr>
											<td>Duration</td>
											<td> : </td>
											<td>
												<!-- duration -->
												<?php
                    $datetime1 = new DateTime($data_rute['depart_on']); //convert to datetime
                    $datetime2 = new DateTime($data_rute['arrive']); //convert to datetime
                    $interval = $datetime1->diff($datetime2); //get interval from two datetime
                    echo $interval->format('%d d %H h %i m'); //convert interval to  day hours and minute
                    //materikita.com
                    ?>

                </td>
            </tr>
            <tr>
            	<td>Class</td>
            	<td> : </td>
            	<td>
            		<?php echo $data_rute['class'] ?>
            	</td>
            </tr>
        </table>
    </div>

    <div class="flight-booking-2">
    	<div class="booking-title">
    		<h4>
    			<span class="glyphicon glyphicon-pencil"></span> Summary</h4>
    			<div class="booking-line"></div>
    		</div>
    		<table class="summary-table">
    			<tr>
    				<td>Ticket Price</td>
    				<td> : </td>
    				<td>
    					<?php 
    					echo "Rp." . strrev(implode('.', str_split(strrev(strval($data_rute['price'])), 3)));
    					?>
    				</td>
    			</tr>
    			<tr>
    				<td>Total Passengers</td>
    				<td> : </td>
    				<td>
    					<?php echo $data['passengers'] ?>
    				</td>
    			</tr>
    			<tr class="price-you-pay">
    				<td>Price you pay</td>
    				<td> : </td>
    				<td>
    					<?php 
    					echo "Rp." . strrev(implode('.', str_split(strrev(strval($data['passengers']*$data_rute['price'])), 3)));
    					?>
    				</td>
    			</tr>
    		</table>
    	</div>
    </div>
    <div class="row">
    	<button type="submit" name="submit" class="btn btn-primary">Lanjut</button>
    </div>
</form>

</div>
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

