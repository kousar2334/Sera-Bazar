<div id="page-wrapper">
	<div class="main-page">

		<h3><?php echo $message_info->viewer_name; ?></h3>
		<p>Date :<?php echo $message_info->sending_date; ?></p>
		<p><?php echo $message_info->viewer_message; ?></p>
		<h5>From: <span><?php echo $message_info->viewer_email; ?></span></h5><br>
		
		<form action="<?php echo base_url();?>reply-message" method="post">
			
			<textarea name="message" cols="150" rows="5" placeholder="Write reply here" ></textarea>
			<button class="btn btn-primary " type="">Reply</button>
		</form>
	</div>
</div>