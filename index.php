<!doctype html>
<html lang="en-US">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="group infinity">
<title>
	HOME
</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/subscribe.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css?t=<?php echo time();?>">

<script type="text/javascript" src = "js/home.js?t=<?php echo time();?>"></script>

<style>
html, body{
	position: relative; margin: 0px; padding: 0px; display: block; width: 100%; height: 100%; overflow: hidden; border: none;
}
main{
	position: relative; width: inherit; height: inherit; overflow: hidden; overflow-y: auto; display: flex; flex-direction: column;
}
#navigationBar, .navDiv, #topNav{
	position: relative; top: 0px; width: 100%!important; margin: 0px!important; padding: 0px!important; height: auto;
}
#topNav{
	height: auto; min-height: 60px;
}
ul{
	position: relative; margin: 0px; padding: 10px; width: inherit; height: inherit; display: flex; align-items: center; list-style-type: none;
	background: none; justify-content: space-around; flex-wrap: wrap;
}
.sbtns{
	position: relative; margin: 0px; padding: 0px; width: 75px; height: 30px; border: none; color: white;
}
#topNav ul li a{
	position: relative; color: #284848; text-decoration: none; font-weight: bold; padding-right: 5px; border-right: 1px solid #ff0000
}
#landing-page-banner{
	display: flex; align-items: center; justify-content: center; position: relative; width: 100%; height: 450px; background: url(assets/img/banner-bg.jpg);
	background-size: cover; background-repeat: no-repeat; background-position: center center; color: #ffffff; font-weight: bold; font-size: 36px; 
	font-family: cursive; text-transform: capitalize;
}
.moveBtns{
	width: 50px; height: 50px; position: absolute; top: 45%; border: none; background: #2a2121; color: #ffffff; padding: 0px; margin: 0px;
}
#moveLeft{
	left: 0px;
}
#moveRight{
	right: 0px;
}

.newsletterSec{
	width: 100%; padding: 0px!important; margin: 0px!important;
}
#footer{
	position: relative; margin: 0px; padding: 0px; width: 100%; height: auto; min-height: 200px; background: #000000 ; color: #ffffff;
	display: flex; justify-content: space-around;
}
#footer ul{
	position: absolute; margin: 0px; padding: 0px; top: 0px;
}
#footer ul li ol{
	position: relative; margin: 0px; padding: 0px; width: auto; list-style-type: square;
}
#footer ul li ol li:hover{
	color: gold;
}
</style>
</head>
<body>

	<main>

		<section id="navigationBar">
			<div class="navDiv" style="background: #1bdd21!important;">
				<nav id="topNav">
					<ul>
						<li>
							<a href="#"> Home</a>
						</li>
						<li>
							<a href="#" id="menuItems"> Menu</a>
						</li>				
						<li>
							<a href="#" id="aboutPage"> About us</a>
						</li>
						<li>
							<a href="#reservation"> Contact Us</a>
						</li>
						<li>
							<a href="#" id="adminLogin"> Admin</a>
						</li>						
						<li>
							<button id="signIn" class="sbtns" style="background: #2727a7">
								Sign In
							</button>
						</li>
						<li>
							<button id="signUp" class="sbtns" style="background: #605e1a;">
								Sign Up
							</button>
						</li>
					</ul>
				</nav>		
			</div>			
		</section>
		
		<section>
			<div id="landing-page-banner">
				Welcome to our restaurant
				
				<button id="moveLeft" class="moveBtns">
					<?php echo htmlspecialchars("<<");?>
				</button>
				<button id="moveRight" class="moveBtns">
					<?php echo htmlspecialchars(">>");?>
				</button>
			</div>		
		</section>
		
		<section class="services" id="services">
			<div class="container">
				<div class="row">
					<div class="service-item">
						<a href="#services" id="svicesHyper">
							<h4>Our Meals</h4>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="service-item">
							<a href="menu.html">
							<img src="assets/img/cook_breakfast.png" alt="Breakfast">
							<h4>Breakfast</h4>
							</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="service-item">
							<a href="menu.html">
							<img src="assets/img/cook_lunch.png" alt="Lunch">
							<h4>Lunch</h4>
							</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="service-item">
							<a href="menu.html">
							<img src="assets/img/cook_dinner.png" alt="Dinner">
							<h4>Dinner</h4>
							</a>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="service-item">
							<a href="menu.html">
							<img src="assets/img/cook_dessert.png" alt="Desserts">
							<h4>Desserts</h4>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="section" id="reservation">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 align-self-center">
						<div class="left-text-content">
							<div class="section-heading">
								<h6>Contact Us</h6>
								<h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
							</div>
							<p>At restaurant infinity, we work to provide you with the diverse meals and maintaining the good taste. Book a reservation or make an order with us today to feel the experience.</p>
							<div class="row">
								<div class="col-lg-6">
									<div class="phone">
										<i class="fa fa-phone"></i>
										<h4>Phone Numbers</h4>
										<span><a href="#">+2547 13 243546</a><br><a href="#">+2547 31 426475</a></span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="message">
										<i class="fa fa-envelope"></i>
										<h4>Emails</h4>
										<span><a href="#">restaurantinf@gmail.com</a><br><a href="#">infinityfoods@gmail.com</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="contact-form">
							<form id="contact" action="server/reservation/" method="post">
							  <div class="row">
								<div class="col-lg-12">
									<h4>Table Reservation</h4>
								</div>
								<div class="col-lg-6 col-sm-12">
								  <fieldset>
									<input name="name" type="text" id="name" placeholder="Your Name*" required="">
								  </fieldset>
								</div>
								<div class="col-lg-6 col-sm-12">
								  <fieldset>
								  <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
								</fieldset>
								</div>
								<div class="col-lg-6 col-sm-12">
								  <fieldset>
									<input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
								  </fieldset>
								</div>
								<div class="col-md-6 col-sm-12">
								  <fieldset>
									<select value="number-guests" name="number-guests" id="number-guests">
										<option value="number-guests">Number Of Guests</option>
										<option name="1" id="1">1</option>
										<option name="2" id="2">2</option>
										<option name="3" id="3">3</option>
										<option name="4" id="4">4</option>
										<option name="5" id="5">5</option>
										<option name="6" id="6">6</option>
										<option name="7" id="7">7</option>
										<option name="8" id="8">8</option>
										<option name="9" id="9">9</option>
										<option name="10" id="10">10</option>
										<option name="11" id="11">11</option>
										<option name="12" id="12">12</option>
									</select>
								  </fieldset>
								</div>
								<div class="col-lg-6">
									<div id="filterDate2">    
									  <div class="input-group date" data-date-format="dd/mm/yyyy">
										<input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
										<div class="input-group-addon" >
										  <span class="glyphicon glyphicon-th"></span>
										</div>
									  </div>
									</div>   
								</div>
								<div class="col-md-6 col-sm-12">
								  <fieldset>
									<select value="time" name="time" id="time">
										<option value="time">Time</option>
										<option name="Breakfast" id="Breakfast">Breakfast</option>
										<option name="Lunch" id="Lunch">Lunch</option>
										<option name="Dinner" id="Dinner">Dinner</option>
									</select>
								  </fieldset>
								</div>
								<div class="col-lg-12">
								  <fieldset>
									<textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
								  </fieldset>
								</div>
								<div class="col-lg-12">
								  <fieldset>
									<button type="submit" name="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
								  </fieldset>
								</div>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		
		<section class="sign-up">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="heading">
							<h2>Signup for our newsletters</h2>
						</div>
					</div>
				</div>
				<form id="contact-form" action="server/newsletters/" method="post">
					<div class="row">
						<div class="col-md-4 col-md-offset-3">
							<fieldset>
								<input name="email" type="text" class="form-control" id="email" placeholder="Enter your email here..." required>
							</fieldset>
						</div>
						<div class="col-md-2">
							<fieldset>
								<button type="submit" id="form-submit" name = "submit" class="btn">Send Message</button>
							</fieldset>
						</div>
					</div>
				</form>
			</div>
		</section>
		
		<section>
			<div id="footer">
				<ul>
					<li>
						<div class="fTitles"> <h4>Our Meals</h4>
							<ol>
								<li>
									Breakfast
								</li>
								<li>
									Lunch
								</li>
								<li>
									Dinner
								</li>
							</ol>
						</div>
					</li>
					<li>
						<div class="fTitles"> <h4>Open days</h4>
							<ol>
								<li>
									Mon - Sat
								</li>
								<li>
									6:00 am  - 9:00 pm
								</li>
								<li>
									Delivery available
								</li>
							</ol>
						</div>
					</li>
					<li>
						<div class="fTitles"> <h4>Location</h4>
							<ol>
								<li>
									Africa, Kenya
								</li>
								<li>
									Nairobi, Kenya
								</li>
								<li>
									Opposite Equity Bank
								</li>
							</ol>
						</div>
					</li>
				</ul>
			</div>
			
			<div style="background: #000000; color: #ffffff; border-top: 1px solid #ffffff;"><marquee>reserved copyrights @<?php date_default_timezone_set("Africa/Nairobi"); echo date("Y");?></marquee></div>
		</section>
		
	</main>

</body>
</html>