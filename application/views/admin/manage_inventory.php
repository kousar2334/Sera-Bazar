<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
<table class="table">
	<thead>
		<tr>
			<th scope="col">Sl. No</th>
			<th scope="col">Product Name</th>
			<th scope="col">Product Image</th>
			<th scope="col">Product Price</th>
			<th scope="col">Product Quentity</th>
			<th scope="col">Added Date</th>
            <th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>

		<?php

		foreach ($all_inventory_info as $inventory_info) {


			?>
			<tr>
				<th scope="col">
					<?php
					
					
					 echo $inventory_info->inventory_id;
					?>
				</th>
				<td><?php echo $inventory_info->product_name ;?></td>
				<td><img src="<?php echo $inventory_info->product_image ;?>" alt="" height="50" width="60" >  </td>
				<td>&#2547;<?php echo $inventory_info->product_price ;?></td>
				<td><?php echo $inventory_info->product_quentity;?></td>
				<td><?php echo $inventory_info->added_date;?></td>
				
				<td>
					<a class="fa fa-edit" href=""></a>
					<a class="fa fa-remove" href=""></a>
				</td>
			</tr>
            <?php } ?>
		</tbody>
	</table>
</div>
</div>
</div>