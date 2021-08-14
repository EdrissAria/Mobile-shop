<?php
$id = $_GET['id'];
foreach($product->getData() as $item){ 
    if($item['item_id'] == $id){
        if(isset($_POST['delete_submit'])){
            $product->delete($id);
        }

?>
<!-- product -->
<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="grid-item">
            <img src="upload/<?php echo $item['item_image'];?>" alt="product" class="img-fluid">
            </div>
                <div class="form-row pt-4 font-size-16 font-calibri">
                    <div class="col">
                        <form method="POST">
                            <button type="submit" class="btn btn-danger form-control" name="delete_submit">Delete</button>      
                        </form>
                    </div>
                    <div class="col">
                        <a href="editproduct.php?id=<?php echo $item['item_id'];?>"type="submit" class="btn btn-success form-control">Edit</a>      
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-5">
                <div class="danger">
                    <h5 class="text-dark lato-bold"><?php echo $item['item_name'];?></h5>
                    <p class="text-dark lato-bold">By &nbsp;<?php echo $item['item_brand'];?></p>
                    <hr>
                    M.R.P: <strike><?php echo $item['item_price'];?> $</strike>
                    <p> Deal price:	<?php echo $item['reg_price'];?> $</p>
                    <p> Stock: &nbsp;<?php echo $item['quantity'];?></p>
                    <p> Sales: 0</p>
                    <p> Catagory: &nbsp;<?php echo $item['item_cat'];?></p>
                    <hr>
                    <h6 class="font-narrow">Product Description</h6>
                    <p class="font-calibri font-size-14"><?php echo $item['description'];?></p>
                </div>                
        </div>
    </section>
<!-- !product -->
<?php
    }
}
?>
 