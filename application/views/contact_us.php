<!-- contact-page -->
	<div class="contact">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Contact Us</h3>  
			<div class="map-info">
				<div class="col-md-12 map-grids">
					<h4>Our Sera Bazar Store</h4>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.073569871101!2d90.36405251452565!3d23.815982784557047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c128b15cc4df%3A0x37adf8155b1773d0!2sMirpur+11!5e0!3m2!1sen!2sbd!4v1524645041518"  frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				
				<div class="clearfix"> </div>
			</div>  
			<div class="contact-form-row">
		<p> <?php
        $message=$this->session->userdata('message');
        if($message){
          echo $message;
          $this->session->unset_userdata('message');
        }

        ?></p>
				<h3 class="w3ls-title w3ls-title1">Drop Us a Message</h3>  
				<div class="col-md-7 contact-left">
					<form action="<?php echo base_url();?>viewer-message" method="post">
						<input type="text" name="viewer_name" placeholder="Name" required="">
						<input class="email" type="text" name="viewer_email" placeholder="Email" required="">
						<input type="hidden" name="sending_date" value="<?php echo date('Y-m-d H:i:s')?>">
						<textarea placeholder="Message" name="viewer_message" required=""></textarea>
						<input type="submit" value="SUBMIT">
					</form>
				</div> 
				<div class="col-md-4 contact-right">
					<div class="cnt-w3agile-row">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-truck" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>Manage Your Orders <br>Easily Track Orders & Returns </p> 
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="cnt-w3agile-row cnt-w3agile-row-mdl">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-bell" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>Notifications <br>Get Relevant Alerts & Recommendations</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="cnt-w3agile-row">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-heart" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>Requirements<br> With Wishlists, Reviews, Ratings</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
				</div> 
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>