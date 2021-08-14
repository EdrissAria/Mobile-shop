<!-- shopping cart -->
<section id="cart" class="mb-5">
    <div class="container-fluid w-75 py-3">
        <h5 class="font-narrow font-size-20">Shopping Cart</h5>
        <div class="row">
            <div class="col-sm-9">
                <!--- cart item -->
                 <div class="row">
                    <div class="col sm-12 py-5 mt-3 border-top">
                        <img src="../../assets/empty_cart.png" alt="empty" class="img-fluid" style="height: 200px">
                        <p class="font-size-20 font-calibri">Empty Cart</p>
                    </div>
                 </div>
                <!--- !cart item -->
            </div>

            <!-- subtotal price -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-narrow text-success py-3">
                        <i class="ion-checkmark"></i>Your Order eligible for FREE Delivery
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-calibri font-size-20">
                            Subtotal(<?php echo (isset($subtotal))?count($subtotal):0;?> items)&nbsp;<span class="text-danger">$ <span class="text-danger" id="deal-price">
                            </span><?php echo (isset($subtotal) && count($subtotal) > 0) ?  $cart->getSum($subtotal) : 0;?></span>
                            <form method="post">
                            <button class="btn btn-warning mt-3">Proceed to buy</button>
                            </form>
                        </h5>
                    </div>
                </div>
            </div>
            <!-- !subtotal price -->
        </div>
    </div>
</section>
            <!-- !shopping cart -->