<div id="page-wrapper">
	<div class="main-page">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">User Name</th>
					<th scope="col">User Address</th>
					<th scope="col">User Phone</th>
					<th scope="col">Products Name</th>
					<th scope="col">Products Qty</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>

				<tr>
					<td><?php echo $order_info->user_name ;?></td>
					<td><?php echo $order_info->user_address ;?></td>
					<td><?php echo $order_info->user_phone ;?></td>
					<td><?php 
					$name=$order_info->product_name;
					$pro_name=explode(',',$name);
					foreach ($pro_name as $key => $value) {
						echo $value."<br>";
					}

					?></td>
					<td><?php 
					$name=$order_info->product_qty;
					$pro_name=explode(',',$name);
					foreach ($pro_name as $key => $value) {
						echo $value."<br>";
					}

					?></td>

					<td>
						<a class="btn btn-primary" href="<?php echo base_url();?>deliver-order/<?php echo $order_info->order_id;?>">Delever Order</a>	
					</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>
