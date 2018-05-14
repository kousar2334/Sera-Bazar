<div class="login-page">
        <div class="container"> 
                <div class="col-4">
                        <h4 class="pull-left"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart list</h4> 
                </div>

                <table class="table">

                        <tr class="info">
                                <th>QTY</th>
                                <th style="text-align:left;">Item Description</th>
                                <th>Action</th>
                                <th style="text-align:right">Item Price</th>
                                <th style="text-align:right">Sub-Total</th>
                        </tr>

                        <?php $i = 1; ?>

                        <?php foreach ($cart_data as $items): ?>
                                <input type="hidden" name="rowid" value="<?=$items['rowid']?>" class="rowid_<?=$i?>" >


                                <tr id="tr_id<?=$i?>">
                                        <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '1', 'size' => '1')); ?></td>
                                        <td style="text-align:left;"><?php echo $items['name']; ?></td>
                                        <td style="text-align:left;"><a class="fa fa-remove cancel" id="<?=$i?>" href="javascript:void(0)" ></a></td>
                                        <td style="text-align:right">&#2547;<?php echo $this->cart->format_number($items['price']); ?></td>
                                        <td style="text-align:right">&#2547;<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                </tr>

                                <?php $i++; ?>


                        <?php endforeach; ?>
                        <tr>
                                <td colspan="3"> </td>
                                <td class="right"><strong>Total</strong></td>
                                <td class="pull-right">&#2547;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                        </tr>

                </table>
                
                <div class="col-3 pull-right">
                 <div class="span2">
                         <a href="<?php echo base_url();?>check-out" class="btn btn-primary btn-block" > Proceed to Checkout  </a>
                 </div>
                 

         </div><br><br>

 </div>
</div>
<script type="text/javascript">

        $(".cancel").click(function()
        {
                var  id=$(this).attr('id');
                $("#tr_id"+id).hide();
                var rowid=$(".rowid_"+id).val();
                $.ajax({
                        url:"<?php echo base_url();?>delete-item-cart",
                        type:"POST",
                        data:{'rowid':rowid},

                        success:function(data){

                        },

                });

        });
</script>
