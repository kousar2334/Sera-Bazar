<div id="page-wrapper">
	<div class="main-page">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Sl. No</th>
					<th scope="col">Customer's Name</th>
					<th scope="col">Customer's Address</th>
					<th scope="col">Customer's Phone</th>
					<th scope="col">Product's Name</th>
					<th scope="col">Products Qty</th>
					<th scope="col">Total Price</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $i=1;
				 foreach ($all_order_information as $order_info) {
					# code...
				?>

				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $order_info->user_name ;?></td>
					<td><?php echo $order_info->user_address ;?></td>
					<td><?php echo $order_info->user_phone ;?></td>
					<td><?php 
					$name=$order_info->product_name;
					$pro_name=explode(',',$name);
					foreach ($pro_name as $key => $value) {
						echo $value.",<br>";
					}

					?></td>
					<td><?php 
					$name=$order_info->product_qty;
					$pro_name=explode(',',$name);
					foreach ($pro_name as $key => $value) {
						echo $value."<br>";
					}

					?></td>
					<td><?php echo $order_info->grand_total ;?></td>

					<td>
						<?php

                    if($order_info->delivery_status=='0'){ ?>
                    	<a class="btn btn-warning" href="<?php echo base_url();?>deliver-order/<?php echo $order_info->order_id;?>">Pending</a>	
                    <?php }else{
                    	?><button class="btn btn-success">Deliverd</button> <?php
                    }


						?>
					</td>
				</tr>
              <?php } ?>
			</tbody>
		</table>
	</div>
</div>
