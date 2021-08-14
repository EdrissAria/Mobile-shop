<?php
// count of product of cart
isset($_SESSION['login']) ? $count = count($product->getDataUser($_SESSION['login'])): null;
// inserting the quantity of product 
$con = mysqli_connect("localhost", "root", "", "shopee") or die("can not connect to the database");

if(isset($_POST['qty'])){
    $update_qty = mysqli_query($con, "UPDATE cart SET qty = {$_POST['qty']} WHERE item_id = {$_POST['item_id']};");
    if($update_qty){
        echo "success";
    }else{
        echo "something went wrong";
    }
}
 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['cart_delete_submit'])){
        $cart->delete_cart($_POST['item_id']);
    }
    // for save later button 
    if(isset($_POST['save_later'])){
        $cart->SaveForLater($_POST['item_id']);
    }
}

?>

<!-- shopping cart -->
<section id="cart" class="mb-5">
    <div class="container-fluid w-75 py-3">
        <h5 class="font-narrow font-size-20">Shopping Cart</h5>
        <div class="row">
            <div class="col-sm-9">
                <!--- cart item -->
                <?php
                if(isset($_SESSION['login'])){
                    foreach($product->getDataUser($_SESSION['login']) as $item){
                        $qty = $item['qty'];
                    $price = $product->getitemid($item['item_id']);
                    $subtotal[] = array_map(function($item) use($qty){
                        $item_name = $item['item_name'];
                ?>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="./admin/upload/<?php echo $item['item_image'];?>" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-calibri font-size-20"><?php echo $item_name;?></h5>
                        <small>by <?php echo $item['item_brand'];?></small>
                        <!--product rating-->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="ion-ios-star"></i></span>
                                <span><i class="ion-ios-star"></i></span>
                                <span><i class="ion-ios-star"></i></span>
                                <span><i class="ion-ios-star"></i></span>
                                <span><i class="ion-ios-star-outline"></i></span>
                            </div>
                            <a href="#" class="text-secondary px-2 font-size-14">20.534 ratings</a>
                        </div>
                        <!--!product rating-->

                        <!--product qty-->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-calibri w5">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'];?>">&uparrow;</button>
                                <input type="text"  data-id="<?php echo $item['item_id'];?>" 
                                class="qty_input border px-2 w-100 bg-light" disabled value="<?php echo $qty;?>">
                                <button type="button" class="qty-down border bg-light" data-id="<?php echo $item['item_id'];?>">&downarrow;</button>
                            </div>
                            <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                            <button class="btn border-right text-danger px-4 font-calibri" name="cart_delete_submit">Delete</button>
                            </form>
                            <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                             </form>

                        </div>
                        <!--!product qty-->

                    </div>
                    <div class="col-sm-2 text-right"> 
                        <div class="font-size-20 font-calibri text-danger">$
                            <span class="product_price" data-id="<?php echo $item['item_id'];?>">
                            <?php echo $item['item_price'] * $qty;?>
                            </span>
                        </div>
                    </div>
                </div>
                <!--- !cart item -->
                <?php 
                return $item['item_price'] * $qty;
                }, $price);
                }
            }
                
            ?>
                
            </div>

            <!-- subtotal price -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-narrow text-success py-3">
                        <i class="ion-checkmark"></i>Your Order eligible for FREE Delivery
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-calibri font-size-20">
                            Subtotal(<?php echo (isset($subtotal))?count($subtotal):0;?> items)&nbsp;<span class="text-danger">
                            $
                            <span class="text-danger" id="deal_price">
                            <?php echo (isset($subtotal) && count($subtotal) > 0) ?  $cart->getSum($subtotal) : 0;?>
                            </span>
                            </span>

                            <a href="submit_order.php" class="btn btn-warning font-size-16 font-calibri mt-3">Proceed to buy</a>
                        </h5>
                    </div>
                </div>
            </div>
            <!-- !subtotal price -->
        </div>
    </div>
</section>
<!-- !shopping cart -->
 