<?php 
    shuffle($products);
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_SESSION['login'])){
            if(isset($_POST['top_sale_submit'])){
                $cart->addtoCart($_POST['user_id'], $_POST['item_id']);
                echo $_POST['user_id'];
            }
    }else{
            if(isset($_POST['signup_submit'])){
                // hassing password 
                $password = $_POST["password"];
                $hashpassword = md5($password);
                $user->signinUser(
                   $_POST["email"],
                   $_POST["password"]
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
<!-- top sale -->
<section id="top-sale">
    <div class="container py-5"> 
        <h4 class="font-narrow font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
            <div class="owl-carousel owl-theme">
            <?php foreach($products as $item){?>
            <div class="item py-2">
                <div class="product font-calibri">
                    <a href="product.php?item_id=<?php echo $item['item_id'];?>"><img src="./admin/upload/<?php echo $item['item_image']??"./assets/1.png";?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6 class="font-lato"><?php echo $item['item_name']??"unknown";?></h6>
                        <div class="rating text-warning font-size-12">
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price']??"0";?></span>
                        </div>
                        <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                        <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['login'])){ echo $_SESSION['login'];}else{echo 0;}?>">
                        <?php
                            if(in_array($item['item_id'], $in_cart)){
                                echo '<button type="submit" class="btn btn-success font-size-12 pointer" disabled>In the cart</button>';
                            }else{
                            if(!isset($_SESSION['login'])){
                               echo '<button type="button" class="btn btn-warning font-size-12" name="top_sale_submit" data-toggle="modal" data-target="#modelId">Add to Cart</button>';
                            }else{
                                echo '<button type="submit" class="btn btn-warning font-size-12" name="top_sale_submit">Add to Cart</button>';    
                            }
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !top sale -->