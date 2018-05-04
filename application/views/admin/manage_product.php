<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
<table class="table">
	<thead>
		<tr>
			<th scope="col">Sl. No</th>
			<th scope="col">Product Name</th>
			<th scope="col">Product Price</th>
			<th scope="col">Product Image</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>

		<?php

		foreach ($all_product_info as $product_info) {


			?>
			<tr>
				<th scope="col">
					<?php
					$i=1;
					for($i=1;$i<=count($product_info);$i++){
						echo $i;
					}

					?>
				</th>
				<td><?php echo $product_info->product_name ;?></td>
				<td><?php echo $product_info->product_price ;?></td>
				<td><img src="<?php echo $product_info->product_image ;?>" alt="" height="50" width="60" >  </td>
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