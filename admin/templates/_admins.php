<?php

if(isset($_POST['submit_admin'])){
    if($_POST['password'] === $_POST['confirm']){
    $hash = sha1($_POST['password']);
    $admin->addAdmin(
        $_POST['name'],
        $_POST['lastname'],
        $_POST['username'],
        $_POST['email'],
        $hash,
        $_FILES['image']['name'],
        $_POST['position'],
        $datetime
    );
    $target= "upload/".$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    }else{
        header('location:'.$_SERVER['PHP_SELF'].'?match=failed');
    }
}
if(isset($_POST['delete_submit'])){
    $product->delete($_POST['id'], 'admins', 'admin_id', 'admins.php');
}


?>
<!-- Dashboard graph area -->
<div class="addpro_form">
        <div class="container">
            <div class="row mt-4">
                <div class="col lg-5">
                    <div class="user_name">
                        <h2>Add New <strong>Admin</strong></h2>
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
                                <label class="my-2">First name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">Last name</label>
                                <input type="text" name="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">User name</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="my-2">Confirm</label>
                                <input type="password" name="confirm" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="my-2">Choose a photo</label>
                                <input type="file" name="image" class="form-control bg-dark">
                            </div>
                        </div>   
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="my-2">Position</label>
                                <select name="position" id="" class="form-control">
                                    <option>Admin</option>
                                    <option>Editor</option>
                                    <option>Author</option>
                                    <option>Subscriber</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" name="submit_admin" value="Add Admin" class="btn btn-dark my-3">
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-addp">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Created At</th>
                            <th>Delete</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                            foreach($product->getData('admins') as $item){
                                $id = $item['admin_id'];
                        ?>
                            <tr>
                                <td><?php echo $item['username'];?></td>
                                <td><img src="upload/<?php echo $item['photo'];?>"
                                class="img-fluid table-img"/></td>
                                <td><?php echo $item['email'];?></td>
                                <td><?php echo $item['position'];?></td>
                                <td><?php echo $item['created_at'];?></td>
                                <td><form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <button type="submit" class="btn btn-danger" name="delete_submit">Delete</button>      
                                </form></td>
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