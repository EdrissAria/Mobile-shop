<?php 
    $products = $product->getData();
    $item_id = $_GET['item_id'];

    foreach($products as $item){
    if($item['item_id'] == $item_id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_SESSION['login'])){
                    if(isset($_POST['product_submit'])){
                        $cart->addtoCart($_POST['user_id'], $_POST['item_id']);
                        echo $_POST['user_id'];
                    }
            }elseif(isset($_POST['login_submit'])){    
                $password = $_POST["password"];
                $hashpassword = md5($password);
                $user->getUser($_POST['email'], $hashpassword);
                   
            }elseif(isset($_POST['signin_submit'])){

                $password = $_POST["password"];
                $hashpassword = md5($password);
                $user->signIn($_POST['email'], $hashpassword);
            }
            } 
            $in_cart = isset($_SESSION['login'])? $cart->getId($product->getDataUser($_SESSION['login'])): [];
?>
<!-- product -->
<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="./admin/upload/<?php echo $item['item_image'];?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-calibri">
                    <div class="col">
                        <button class="btn btn-danger form-control text-dark">Proceed to buy</button>
                    </div>
                    <div class="col">
                    <form method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                        <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}else{echo 0;}?>">
                        <?php if(in_array($item['item_id'], $in_cart)){
                            echo '<button type="submit" class="btn btn-success form-control" disabled>In the cart</button>';
                        }else{
                            if(!isset($_SESSION['login'])){
                                echo '<button type="button" class="btn btn-warning form-control" name="product_submit" data-toggle="modal" data-target="#modelId2">Add to Cart</button>';
                             }else{
                                 echo '<button type="submit" class="btn btn-warning form-control" name="product_submit">Add to Cart</button>';    
                             }                        
                        }?>                    
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-5">
                <h5 class="font-calibri font-size-20"><?php echo $item['item_name'];?></h5>
                <small>by <?php echo $item['item_brand'];?></small>
                <div class="d-flex">
                    <a href="#" class="text-secondary px-2 font-size-14">20.534 ratings|1000 + answered questions</a>
                </div>
                <hr class="m-0">
                <!-- product price -->
                <table class="my-3">
                    <tr class="font-calibri font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>$162,00</strike></td>
                    </tr>
                    <tr class="font-calibri font-size-14">
                        <td>Deal price:</td>
                        <td class="font-size-20 text-danger">$<span><?php echo $item["item_price"];?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-calibri font-size-14">
                        <td>You save:</td>
                        <td><span class="font-size-16 text-danger">152,00</span></td>
                    </tr>
                </table>
                <!-- !product price -->

                <!-- policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color second">
                                <span class="border px-2 py-2 rounded-pill">
                                    <img src='assets/image/time.png' />
                                </span>
                            </div>
                            <a href="#" class="font-narrow font-size-12">10 Days<br>Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color second">
                                <span class="border px-2 py-2 rounded-pill">
                                    <img src='assets/image/truck.png' />
                                </span>
                            </div>
                            <a href="#" class="font-narrow font-size-12">Daily tuition<br>Delivered</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color second">
                                <span class="border px-2 py-2 rounded-pill">
                                    <img src='assets/image/guaranty.png' />
                                </span>
                            </div>
                            <a href="#" class="font-narrow font-size-12">1 Year<br>Waranty</a>
                        </div>
                    </div>
                </div>
                <!-- !policy -->
                <hr>
                <!-- order-ditails -->
                <div id="order-datail" class="font-narrow d-flex flex-column text-dark">
                    <small>Delivery by: Mar 29 -Apr1</small>
                    <small>Sold by<a href="#">Daily electronics</a>(4.5 out of 5|18,198 ratings)</small>
                    <small><i class="ion-android-map color-primary">&nbsp;&nbsp;Delivery to customer -42420</i></small>
                </div>
                <!-- !order-ditails -->
                <div class="row my-5">
                    <div class="col-6">
                        <div class="qty d-flex">
                            <h6 class="font-calibri">Qty</h6>
                            <div class="px-4 d-flex font-narrow">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'];?>">&uparrow;</button>
                                <input type="text"  data-id="<?php echo $item['item_id'];?>" 
                                class="qty_input border px-2 w-100 bg-light" disabled value="1">
                                <button type="button" class="qty-down border bg-light" data-id="<?php echo $item['item_id'];?>">&downarrow;</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 my-5">
                    <h6 class="font-narrow">Product Description</h6>
                    <hr>
                     <p class="font-calibri font-size-14"><?php echo $item['description'];?></p>
                </div>
            </div>
        </div>
    </section>
<!-- !product -->
<?php }};?>