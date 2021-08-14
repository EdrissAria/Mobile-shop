<?php
$id = $_GET['id'];
// insert product into database 
if(isset($_POST['update_submit'])){
    if($_POST['brand'] &&
    !empty($_POST['name']) &&
    !empty($_POST['price']) &&
    !empty($_POST['reg_price']) &&
    !empty($_POST['stock']) &&
    !empty($_POST['catagory']) &&
    !empty($_FILES['image']['name']) &&
    !empty($_POST['description']) &&
    !empty($datetime)
    ){

    $product->updateproduct(
        $id,
        $_POST['brand'],
        $_POST['name'],
        $_POST['price'],
        $_POST['reg_price'],
        $_POST['stock'],
        $_POST['catagory'],
        $_FILES['image']['name'],
        $_POST['description'],
        $datetime
    );
    $target= "upload/".$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);
}
}

// select data from database 
foreach($product->getData() as $item){ 
    if($item['item_id'] == $id){        
?>

<!-- Dashboard graph area -->
 <div class="addpro_form">
        <div class="container">
            <div class="row mt-4">
                <div class="col lg-5">
                    <div class="user_name">
                        <h2>Edit your <strong>Product</strong></h2>
                    </div>
                </div>
                <div class="col lg-3 offset-lg-4">
                    <div class="add_link">
                        <a href="dashboard.php" class="btn btn-secondary btn-block">Back to Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="form-addp">
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">Name</label>
                                <input type="text" value="<?php echo $item['item_name'];?>" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">Brand</label>
                                <input type="text" value="<?php echo $item['item_brand'];?>" name="brand" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="my-2">Choose an image for product</label>
                                <input type="file" value="<?php echo $item['item_image'];?>" name="image" class="form-control bg-dark">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="my-1">selected image</label>
                            <div class="bg-light p-2">
                                <img src="upload/<?php echo $item['item_image'];?>" style="width: 40px">                            
                            </div>
                        </div>
                         
                        <div class="col-lg-12 info">
                          
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Price</label>
                                <input type="text" value="<?php echo $item['item_price'];?>" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Regular Price</label>
                                <input type="text" value="<?php echo $item['reg_price'];?>" name="reg_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Stock</label>
                                <input type="text" value="<?php echo $item['quantity'];?>" name="stock" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Catagory</label>
                                <select name="catagory" id="" class="form-control">
                                    <option selected><?php echo $item['item_cat'];?></option>
                                    <option>On Sale</option>
                                    <option>Special Price</option>
                                    <option>Top Sale</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="my-2">Description</label>
                                <textarea name="description" id="editor" cols="30" rows="10" class="form-control">
                                <?php echo $item['description'];?>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="update_submit" value="Update Product" class="btn btn-dark my-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Dashboard graph area -->
<?php
    }
}
?>