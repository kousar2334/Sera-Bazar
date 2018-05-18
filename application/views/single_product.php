<div class="products">	 
	<div class="container">  


		<?php 

		foreach ($product_info as $product) {
			?>
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li>

									<div class="thumb-image detail_images"> <img src="<?php echo $product->product_image;?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $product->product_name;?>"> </div>
									
								</li>

							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name"><?php echo $product->product_name;?></h3>
						<p>Processing Time: Item will be shipped out within 2-3 working days. </p>
					
						<div class="single-price">
							<ul>
								<li>&#2547;<?php echo $product->product_price;?></li>  
								<li class="rating"><p style="color:Tomato;">
									
									<?php if($product->product_quentity>0){
                                     echo "Available";
									}else{
										echo"Out of stock";
									}
									?>
								</p></li>
								
								
							</ul>	
						</div> 
						<p class="single-price-text"> <?php echo $product->product_description;?></p>
						<a href="javascript:void(0)" class="w3ls-cart" data-id="<?=$product->product_id?>" data-name="<?=$product->product_name?>" data-price="<?=$product->product_price?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>
					</div>
					<div class="clearfix"> </div>  
				</div>
				<div class="single-page-icons social-icons"> 
					<ul>
						<li><h4>Share on</h4></li>
						<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
						
					</ul>
				</div>
			</div> 

			<?php }?>
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="w3ls-title">Our Recommendations </h3> 
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({

						  autoPlay: 3000, //Set AutoPlay to 3 seconds

						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true

						});
						
					}); 
				</script>
				<div id="owl-demo5" class="owl-carousel">
					<?php foreach ($all_men_collection as $men_collection) {

						?>
						<div class="item">
							<div class="glry-w3agile-grids agileits"> 
								<a href="<?php echo base_url();?>product/<?php echo $men_collection->product_id;?>"><img src="<?php echo $men_collection->product_image ;?>" height="220" width="150" alt="img"></a>
								<div class="view-caption agileits-w3layouts">           
									<h4><a href="<?php echo base_url();?>product/<?php echo $men_collection->product_id;?>"><?php echo $men_collection->product_name;?></a></h4>

									<h5>&#2547;<?php echo $men_collection->product_price;?></h5> 

									<a href="javascript:void(0)" class="w3ls-cart" data-id="<?=$men_collection->product_id?>" data-name="<?=$men_collection->product_name?>" data-price="<?=$men_collection->product_price?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>

								</div>   
							</div>   
						</div>

						<?php }?>
					</div>    
				</div>
				<!-- //recommendations --> 

				<!-- offers-cards --> 
				<div class="w3single-offers offer-bottom"> 
					<div class="col-md-6 offer-bottom-grids">
						<div class="offer-bottom-grids-info2">
							<h4>Special Gift Cards</h4> 
							<h6>More brands, more ways to shop. <br> Check out these ideal gifts!</h6>
						</div>
					</div>
					<div class="col-md-6 offer-bottom-grids">
						<div class="offer-bottom-grids-info">
							<h4>Flat $10 Discount</h4> 
							<h6>The best Shopping Offer <br> On Fashion Store</h6>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- //offers-cards -->
			</div>
		</div>
		<!--//products-->  
		<script src="js/jquery-1.11.1.min.js"></script> 
		<!--flex slider-->
		<script defer src="js/jquery.flexslider.js"></script>
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
<script src="js/imagezoom.js"></script>

<script type="text/javascript">
	$('.w3ls-cart').click(function()
	{
		var id=$(this).data('id');
		var name=$(this).data('name');
		var price=$(this).data('price');
		$.ajax({
			url:"<?php echo base_url();?>add-product-cart",
			type:"POST",
			data:{'id':id,'name':name,'price':price},

			success:function(data){
				alert(name+' added to cart');
			},

		});

	});
</script>