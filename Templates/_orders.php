 
<section id="chechout_form">
    <div class="container">
        <h3 class="font-narrow mt-3 font-size-20">Checkout Details</h3>
        <div class="row">
            <div class="col col-lg-8">
            <hr>
            <h3 class="text-dark font-size-20 text-calibri py-3">BILLING DETAILS</h3>
                <!-- checkout -->
                <form metdod="POST">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">First name<span class="text-danger">*</span></label>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Last name<span class="text-danger">*</span></label>
                                <input type="text" name="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Town/City<span class="text-danger">*</span></label>
                                <input type="text" name="town/city" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Street address<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Apartment ...</label>
                                <input type="text" name="add_details" class="form-control" placeholder="Apartment, suit, unit, etc [optional]">
                            </div>
                        </div>
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Postcode<span class="text-danger">*</span></label>
                                <input type="text" name="postcode" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label class="font-dark font-size-16 font-calibri">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-12">
                            <div class="form-group">
                                 <input type="submit" value="Registration" name="order_submit" class="btn btn-danger font-size-16 font-calibri">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- !checout -->
            </div>
            <div class="col col-lg-4">
                <!-- record order -->
                <div class="border py-2 px-3 mt-3">
                <h3 class="font-size-20 text-calibri py-2 text-danger">YOUR ORDER</h3>
                <table class="table">
                    <tr class="border-bottom">
                        <th class="font-calibri font-size-16 text-dark">PRODUCT</th>
                        <th class="font-calibri font-size-16 text-dark text-right">SUBTOTAL</th>
                    </tr>
                    <?php
                    if(isset($_SESSION['login'])){
                        foreach($product->getDataUser($_SESSION['login']) as $item){
                        $qty = $item['qty'];
                        $price = $product->getitemid($item['item_id']);
                        $subtotal[] = array_map(function($item) use($qty){
                            $item_name = $item['item_name'];
                    ?>

                    <tr class="border-bottom">
                        <td class="font-calibri font-size-16 text-dark"><?php echo $item['item_name']." &nbsp; * &nbsp;".$qty;?></td>
                        <td class="font-calibri font-size-16 text-dark text-right">
                        <span class="text-danger"><?php echo $item['item_price'] * $qty;?>&nbsp;$</span></td>
                    </tr>

                    <?php 
                        return $item['item_price'] * $qty;
                        }, $price);
                        }
                    }
                    ?>
                    <tr class="border-bottom">
                        <td class="font-calibri font-size-16 text-dark">Subtotal</td>
                        <td class="font-calibri font-size-16 text-dark text-right">
                        <span class="text-danger">
                        <?php echo (isset($subtotal) && count($subtotal) > 0) ?  $cart->getSum($subtotal) : 0;?>&nbsp;$
                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-calibri font-size-16 text-dark">Total</td>
                        <td class="font-calibri font-size-16 text-dark text-right">
                        <span class="text-danger">
                        <?php echo (isset($subtotal) && count($subtotal) > 0) ?  $cart->getSum($subtotal) : 0;?>&nbsp;$
                        </span>
                        </td>
                    </tr>

                </table>
                </div>
                <!-- !record order -->
            </div>
        </div>
        
    </div>
</section>