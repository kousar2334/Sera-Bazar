<div id="page-wrapper">
	<div class="main-page">
		<a href="<?php echo base_url();?>print-order/<?php echo $order_info->order_id;?>" style="float: right;" class="btn btn-lg"><span class="glyphicon glyphicon-print"></span></a>
		<h1 style="margin-left: 40%">Sera Bazar</h1>
		<p style="margin-left: 42%">Mirpur,Dhaka-1216</p>
		<p style="margin-left: 37%">Email:kousar.cse2334@gmail.com</p>
		<p style="margin-left: 37%">Mobile :01772240092,01679867181</p>
		<p style="margin-left: 42%">www.sera-bazar.com</p>
		<p> <b>Transection Id: </b>SABSXZY-<?php echo $order_info->order_id ;?></p>
		<p> <b>Name :</b><?php echo $order_info->user_name ;?></p>
		<p><b>Email :</b><?php echo $order_info->user_email ;?></p>
		<p><b>Phone :</b>0<?php echo $order_info->user_phone ;?></p>
		<p><b>Address :</b><?php echo $order_info->user_address ;?></p>
		
		<h4><b>Order Information</b></h4>
		<table class="table">
			<thead>
				<tr>
					
					<th scope="col">Products Name</th>
					<th scope="col">Products Price</th>
					<th scope="col">Products Qty</th>
					<th scope="col">Subtotal</th>
				</tr>
			</thead>
			<tbody>

				<tr>

					<td><?php 
					$name=$order_info->product_name;
					$pro_name=explode(',',$name);
					foreach ($pro_name as $key => $value) {
						echo $value."<br>";
					}

					?></td>
					<td><?php 
					$name=$order_info->product_price;
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
					<td><?php 
					$name=$order_info->product_subtotal;
					$pro_name=explode(',',$name);
					foreach ($pro_name as $key => $value) {
						echo $value."<br>";
					}

					?></td>
				</tr>
				<tr>
					<td colspan="2"> </td>
					<td class="right"><strong>Total</strong></td>
					<td>&#2547;<?php echo $order_info->grand_total;?></td>
				</tr>
				<tr>
					<td colspan="2"> </td>
					<td class="right"><strong>Shipping Cost</strong></td>
					<td>&#2547;50</td>
				</tr>
				<tr>
					<td colspan="2"> </td>
					<td class="right"><strong>Grand Total</strong></td>
					<td >&#2547;<?php echo $order_info->grand_total;?></td>
				</tr>
				<tr>
					<td colspan="2"> </td>
					<td class="right"><strong>paid</strong></td>
					<td >&#2547;0</td>
				</tr>
				<tr>
					<td colspan="2"> </td>
					<td class="right"><strong>Total Due</strong></td>
					<td>&#2547;<?php echo $order_info->grand_total;?></td>
				</tr>
				

			</tbody>
		</table>
	</div>
</div>
