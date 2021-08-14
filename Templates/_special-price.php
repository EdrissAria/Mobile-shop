<?php 

    $brand = array_map(function($pro){
        return $pro["item_brand"];
    },$products);

    $unique = array_unique($brand);
    sort($unique);
    shuffle($products);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_SESSION['login'])){
                if(isset($_POST['special_price_submit'])){
                    $cart->addtoCart($_POST['user_id'], $_POST['item_id']);
                    echo $_POST['user_id'];
                }
        }else{
                if(isset($_POST['signup_submit'])){
                    // hassing password 
                    $password = $_POST["password"];
                    $hashpassword = md5($password);
    
                    $user->insertUser(
                        $_POST['firstname'],
                        $_POST['lastname'],
                        $_POST['username'],
                        $_POST['email'],
                        $hashpassword,
                        $_POST['phone'],
                        $_POST['address'],
                        $datetime
                    );
                }
                if(isset($_POST['login_submit'])){
                    // hassing password 
                    $password = $_POST["password"];
                    $hashpassword = md5($password);
    
                    $user->getUser($_POST['email'], $hashpassword);
                      
                }
            }  
        } 

    $in_cart = isset($_SESSION['login'])? $cart->getId($product->getDataUser($_SESSION['login'])): [];

?>
<!-- special price -->
<section id="special-price" class="bg-light py-5">
        <div class="container">
            <h4 class="font-size-20 font-narrow">
                Special Price
            </h4>
            <div id="filter" class="button-group text-right font-calibri">
                <button class="btn is-cheched" data-filter="*">All Brands</button>
                <?php
                array_map(function($brand){
                    printf("<button class='btn' data-filter='.%s'>%s</button>", $brand, $brand);
                }, $unique);?>
            </div>
            <div class="grid">
                <?php array_map(function($item) use($in_cart){?>
                <div class="grid-item border <?php echo $item['item_brand']??'brand';?>">
                    <div class="item py-2" style="width: 200px";>
                        <div class="product font-calibri">
                            <a href="product.php?item_id=<?php echo $item['item_id'];?>"><img src="./admin/upload/<?php echo $item['item_image']??'./admin/upload/1.png';?>" alt="product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name']??'unknown';?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="ion-ios-star"></i></span>
                                    <span><i class="ion-ios-star"></i></span>
                                    <span><i class="ion-ios-star"></i></span>
                                    <span><i class="ion-ios-star"></i></span>
                                    <span><i class="ion-ios-star-outline"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span>$<?php echo $item['item_price']??'0';?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                                    <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}else{echo 0;}?>">

                                    <?php 
                                        if(in_array($item['item_id'], $in_cart)){
                                            echo '<button type="submit" class="btn btn-success font-size-12 pointer" disabled>In the cart</button>';
                                        }else{
                                        if(!isset($_SESSION['login'])){
                                            echo '<button type="button" class="btn btn-warning font-size-12" name="special_price_submit" data-toggle="modal" data-target="#modelId">Add to Cart</button>';
                                        }else{
                                            echo '<button type="submit" class="btn btn-warning font-size-12" name="special_price_submit">Add to Cart</button>';    
                                        }            
                                    }?>
                                </form>
                            </div>
                        </div>                        
                    </div>
                </div>
                <?php }, $products);?>
            </div>
        </div>
</section>
            <!-- !special price -->