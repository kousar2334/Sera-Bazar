<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Create your account</h3>  
			<div class="login-body">
				<form action="<?php echo base_url();?>user-registration" method="post">
					<input type="text" class="user" name="user_name" placeholder="Enter your Name" required="">
					<input type="text" class="user" name="user_email" placeholder="Enter your email" required="">
					<input type="password" name="user_password" class="lock" placeholder="Password" required="">
					<input type="submit" value="Sign Up ">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6>Already have an account? <a href="<?php echo base_url();?>log-in">Login Now »</a> </h6>  
		</div>
	</div>