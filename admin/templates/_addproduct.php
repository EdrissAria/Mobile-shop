<?php
 
if(isset($_POST['submit_product'])){

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

    $product->addproduct(
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

?>

<!-- Dashboard graph area -->
 <div class="addpro_form">
        <div class="container">
            <div class="row mt-4">
                <div class="col lg-5">
                    <div class="user_name">
                        <h2>Add New <strong>Product</strong></h2>
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
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">Brand</label>
                                <input type="text" name="brand" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="my-2">Choose an image for product</label>
                                <input type="file" name="image" class="form-control bg-dark">
                            </div>
                        </div>   
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Regular Price</label>
                                <input type="text" name="reg_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Stock</label>
                                <input type="text" name="stock" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="my-2">Catagory</label>
                                <select name="catagory" id="" class="form-control">
                                    <option>On Sale</option>
                                    <option>Special Price</option>
                                    <option>Top Sale</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="my-2">Description</label>
                                <textarea name="description" id="editor" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="submit_product" value="Add Product" class="btn btn-dark my-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Dashboard graph area -->