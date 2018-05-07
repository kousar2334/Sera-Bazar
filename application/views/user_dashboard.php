<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo isset($title) ? $title : 'Sera Bazar Online Shopping' ; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?php echo base_url()."assets/";?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url()."assets/";?>css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo base_url()."assets/";?>css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="<?php echo base_url()."assets/";?>css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="<?php echo base_url()."assets/";?>css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo base_url()."assets/";?>css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="<?php echo base_url()."assets/";?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="<?php echo base_url()."assets/";?>js/jquery-2.2.3.min.js"></script> 
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 
<script src="<?php echo base_url()."assets/";?>js/owl.carousel.js"></script>  
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({ 
	  autoPlay: 3000, //Set AutoPlay to 3 seconds 
	  items :4,
	  itemsDesktop : [640,5],
	  itemsDesktopSmall : [480,2],
	  navigation : true
	  
	}); 
	}); 
</script>
<script src="<?php echo base_url()."assets/";?>js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
        	var summary = $(summaries[i]);
        	var next = summaries[i + 1];

        	summary.scrollToFixed({
        		marginTop: $('.header-two').outerHeight(true) + 10, 
        		zIndex: 999
        	});
        });
    });
</script>
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="<?php echo base_url()."assets/";?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/";?>js/easing.js"></script>	
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
	$(document).ready(function() {
		
		var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<script src="<?php echo base_url()."assets/";?>js/bootstrap.js"></script>	
</head>
<body>
	
	<script>
		$('#myModal88').modal('show');
	</script> 
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<p><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 01773340092  (24*7)</a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
							<?php $user_name=$this->session->userdata('user_name');
							if($user_name){
								echo $user_name;?>
								<span class="caret"></span></a>
								<ul class="dropdown-menu">

									<li><a href="#">My Orders</a></li>  
									<li><a href="#">Wallet</a></li> 
									<li><a href="<?php echo base_url();?>user-log-out">Log Out</a></li> 
								</ul>

								<?php }else
								{?>
									My Account
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url();?>log-in">Login </a></li> 
										<li><a href="<?php echo base_url();?>sign-up">Sign Up</a></li> 
									</ul>


									<?php }?>

								</li> 
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-percent" aria-hidden="true"></i> Today's Deals<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Cash Back Offers</a></li> 
										<li><a href="#">Product Discounts</a></li>
										<li><a href="#">Special Offers</a></li> 
									</ul> 
								</li> 
								
								<li class="dropdown head-dpdn">
									<a href="<?php echo base_url();?>contact-us" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i> Store Finder</a>
								</li> 
								
								<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div> 
					</div>
					<div class="header-two"><!-- header-two -->
						<div class="container">
							<div class="header-logo">
								<h1><a href="<?php echo base_url(); ?>"><span>S</span>Sera <i>Bazar</i></a></h1>
								<h6>Your stores. Your place.</h6> 
							</div>	
							<div class="header-search">
								<form action="#" method="post">
									<input type="search" name="Search" placeholder="Search for a Product..." required="">
									<button type="submit" class="btn btn-default" aria-label="Left Align">
										<i class="fa fa-search" aria-hidden="true"> </i>
									</button>
								</form>
							</div>
							<div class="header-cart"> 
								<div class="my-account">
									<a href="<?php echo base_url();?>contact-us"><i class="fa fa-map-marker" aria-hidden="true"></i> CONTACT US</a>						
								</div>
								<div class="cart"> 
									<a href="<?php echo base_url();?>cart-view" class="btn btl-lg fa fa-cart-arrow-down">1</a>

								</div>
								<div class="clearfix"> </div> 
							</div> 

							<div class="clearfix"> </div>
						</div>		
						<h3 class="danger" style="margin-left: 40%">

							<?php
							$order_message=$this->session->userdata('order_message');
							if($order_message){
								echo $order_message;
								$this->session->unset_userdata('order_message');
							}

							?>
						</h3>
					</div><!-- //header-two -->


					<div class="header-three"><!-- header-three -->
						<div class="container">
							<div class="menu">
								<div class="cd-dropdown-wrapper">
									<a class="cd-dropdown-trigger" href="#0">Store Categories</a>
									<nav class="cd-dropdown"> 
										<a href="#0" class="cd-close">Close</a>
										<ul class="cd-dropdown-content"> 
											<li><a href="offers.html">Today's Offers</a></li>


											<?php
											foreach ($all_category_info as $category_info) {
												?>
												<li class="has-children">
													<a href="#" id="category"><?php echo $category_info->category_name; ?></a> 
													<ul class="cd-secondary-dropdown is-hidden">
														<li class="go-back"><a href="#">Menu</a></li>
														<li class="see-all"><a href="products.html">All Electronics</a></li>
														<li class="has-children">
															<a href="#" id="subcategory">Subcategory</a>  
															<ul class="is-hidden"> 
																<li class="go-back"><a href="#">All Electronics</a></li> 
																<li class="has-children">
																	<a href="#0">SmartPhones</a> 
																	<ul class="is-hidden"> 
																		<li class="go-back"><a href="#"> </a></li>
																		<li><a href="products.html">Android</a></li>
																		<li><a href="products.html">Windows</a></li>
																		<li><a href="products.html">Black berry</a></li>
																	</ul>
																</li>
																<li> <a href="products.html">IPhones</a> </li>
																<li><a href="products.html">Tablets</a></li>
																<li><a href="products.html">IPad</a></li>
																<li><a href="products.html">Feature Phones</a></li> 
															</ul>
														</li> 


													</ul> <!-- .cd-secondary-dropdown --> 
												</li> <!-- .has-children -->


												<?php } ?>


											</ul> <!-- .cd-dropdown-content -->
										</nav> <!-- .cd-dropdown -->
									</div> <!-- .cd-dropdown-wrapper -->	 
								</div>
								<div class="move-text">
									<div class="marquee"><a href="offers.html"> New collections are available here...... <span>Get extra 10% off on everything | no extra taxes </span> <span> Try shipping pass free for 15 days with unlimited</span></a></div>
									<script type="text/javascript" src="<?php echo base_url()."assets/";?>js/jquery.marquee.min.js"></script>
									<script>
										$('.marquee').marquee({ pauseOnHover: true });
					  //@ sourceURL=pen.js
					</script>
				</div>
			</div>
		</div>
	</div>
	<!-- //header -->	






	<?php echo $user_home_content;?>



	<!-- subscribe -->
	<div class="subscribe"> 
		<div class="container">
			<div class="col-md-6 social-icons w3-agile-icons">
				<h4>Keep in touch</h4>  
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
					<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
				</ul> 
				<ul class="apps"> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href="#" class="fa fa-apple"></a></li>
					<li><a href="#" class="fa fa-windows"></a></li>
					<li><a href="#" class="fa fa-android"></a></li>
				</ul> 
			</div> 
			<div class="col-md-6 subscribe-right">
				<h4>Sign up for email and get 25%off!</h4>  
				<form action="#" method="post"> 
					<input type="text" name="email" placeholder="Enter your Email..." required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="clearfix"> </div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //subscribe --> 
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
						<h2><a href="<?php echo base_url(); ?>"><span>S</span>Sera <i>Bazar</i></a></h2>
						<h6>Your stores. Your place.</h6>
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i> mirpur , Dhaka-1216</li>
						<li><i class="fa fa-mobile"></i> 01773340092 </li>
						<li><i class="fa fa-phone"></i> 01679867181 </li>
						<li><i class="fa fa-envelope-o"></i> <a href="#"> kousar.cse2334@gmail.com</a></li>
					</ul> 
				</div>
				<div class="col-md-8 address-right">
					<div class="col-md-4 footer-grids">
						<h3>Company</h3>
						<ul>
							<li><a href="about.html">About Us</a></li>
							<li><a href="marketplace.html">Marketplace</a></li>  
							<li><a href="values.html">Core Values</a></li>  
							<li><a href="privacy.html">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Services</h3>
						<ul>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="login.html">Returns</a></li> 
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="sitemap.html">Site Map</a></li>
							<li><a href="login.html">Order Status</a></li>
						</ul> 
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Payment Methods</h3>
						<ul>
							<li><i class="fa fa-laptop" aria-hidden="true"></i> Net Banking</li>
							<li><i class="fa fa-money" aria-hidden="true"></i> Cash On Delivery</li>
							<li><i class="fa fa-pie-chart" aria-hidden="true"></i>EMI Conversion</li>
							<li><i class="fa fa-gift" aria-hidden="true"></i> E-Gift Voucher</li>
							<li><i class="fa fa-credit-card" aria-hidden="true"></i> Debit/Credit Card</li>
						</ul>  
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>© 2018  sera bazar . All rights reserved | Developed by <a href="https://www.facebook.com/kousarrahman"> Kousar Rahman</a></p>
		</div>
	</div> 
	<!-- cart-js -->
	
	<script>
		w3ls.render();

		w3ls.cart.on('w3sb_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {
					items[i].set('shipping', 0);
					items[i].set('shipping2', 0);
				}
			}
		});
	</script>  
	<!-- //cart-js -->	
	<!-- countdown.js -->	
	<script src="<?php echo base_url()."assets/";?>js/jquery.knob.js"></script>
	<script src="<?php echo base_url()."assets/";?>js/jquery.throttle.js"></script>
	<script src="<?php echo base_url()."assets/";?>js/jquery.classycountdown.js"></script>
	<script>
		$(document).ready(function() {
			$('#countdown1').ClassyCountdown({
				end: '1388268325',
				now: '1387999995',
				labels: true,
				style: {
					element: "",
					textResponsive: .5,
					days: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#1abc9c",
							lineCap: 'round'
						},
						textCSS: 'font-weight:300; color:#fff;'
					},
					hours: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#05BEF6",
							lineCap: 'round'
						},
						textCSS: ' font-weight:300; color:#fff;'
					},
					minutes: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#8e44ad",
							lineCap: 'round'
						},
						textCSS: ' font-weight:300; color:#fff;'
					},
					seconds: {
						gauge: {
							thickness: .10,
							bgColor: "rgba(0,0,0,0)",
							fgColor: "#f39c12",
							lineCap: 'round'
						},
						textCSS: ' font-weight:300; color:#fff;'
					}

				},
				onEndCallback: function() {
					console.log("Time out!");
				}
			});
		});
	</script>
	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="<?php echo base_url()."assets/";?>js/jquery.menu-aim.js"> </script>
	<script src="<?php echo base_url()."assets/";?>js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster --> 

		
	</body>
	</html>