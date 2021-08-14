<!-- Dashboard graph area -->
<div class="addpro_form">
        <div class="container">
            <div class="row mt-4">
                <div class="col lg-5">
                    <div class="user_name">
                        <h2>Modify Your <strong>Product</strong></h2>
                    </div>
                </div>
                <div class="col lg-3 offset-lg-4">
                    <div class="add_link">
                        <a href="dashboard.php" class="btn btn-secondary btn-block">Back to Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="form-addp">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Catagory</th>
                            <th>Stock</th>
                            <th>Image</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                            foreach($product->getData() as $item){
                        ?>
                            <tr>
                                <td><?php echo $item['item_name'];?></td>
                                <td><?php echo $item['item_brand'];?></td>
                                <td><?php echo $item['item_price'];?></td>
                                <td><?php echo $item['item_cat'];?></td>
                                <td><?php echo $item['quantity'];?></td>
                                <td><a href="viewproduct.php?id=<?php echo $item['item_id'];?>">
                                <img src="upload/<?php echo $item['item_image'];?>"
                                class="img-fluid table-img"/></a></td>
                            </tr>
                            
                        <?php 
                            }
                        ?>
                    <tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Dashboard graph area -->