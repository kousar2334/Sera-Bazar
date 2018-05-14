<div class="login-page">
    <div class="container"> 


        <div class="login-body pull-left">


        <form action="<?php echo base_url();?>place-order" method="post">
              <label for="exampleInputName" class="pull-left">Name</label>
                <input class="form-control" name="user_name" id="exampleInputName" type="text" aria-describedby="nameHelp">


                 <label for="exampleInputName" class="pull-left">Email</label>
                <input class="form-control" name="user_email" id="exampleInputName" type="email" aria-describedby="nameHelp">

                 <label for="exampleInputName" class="pull-left">Phone Number</label>
                <input class="form-control" name="user_phone" id="exampleInputName" type="text" aria-describedby="nameHelp">

                <label for="exampleInputName" class="pull-left">Address</label>
                <textarea class="form-control"  id="exampleInputName" name="user_address" rows="4" required=""></textarea>
            
        </div> 


        <div class="login-body pull-right">

        </div>  
       
        <table class="table">
             <tr class="danger">
                <th>Review Cart</th>
                <th colspan="4"></th>
                
            </tr>

            <tr>
                <th>QTY</th>
                <th style="text-align:left;">Item Description</th>
                <th>Action</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>

            <?php $i = 1;$shipping_cost=50; ?>

            <?php foreach ($cart_data as $items): ?>
                <input type="hidden" name="rowid" value="<?=$items['rowid']?>" class="rowid_<?=$i?>" >
                 <input type="hidden" name="product_name[]" value="<?=$items['name']?>">
                 <input type="hidden" name="product_id[]" value="<?=$items['id']?>">
                 <input type="hidden" name="product_price[]" value="<?php echo $this->cart->format_number($items['price']); ?>">
                 <input type="hidden" name="product_subtotal[]" value="<?php echo $this->cart->format_number($items['subtotal']); ?>">
                 <input type="hidden" name="grand_total" value="<?php echo $this->cart->format_number($this->cart->total()+$shipping_cost); ?>">



                <tr id="tr_id<?=$i?>">
                    <td><input type="text" name="product_qty[]" value="<?=$items['qty']?>"></td>
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
            <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Shipping Cost</strong></td>
                <td class="pull-right">&#2547;<?php echo $shipping_cost; ?></td>
            </tr>
            <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Grand Total</strong></td>
                <td class="pull-right">&#2547;<?php echo $this->cart->format_number($this->cart->total()+$shipping_cost); ?></td>
            </tr>

        </table>

        <div class="col-3 pull-right">
         <div class="span2">
             <button type="submit" class="btn btn-primary btn-block" > Place Order </button>
         </form>
           </div>
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
