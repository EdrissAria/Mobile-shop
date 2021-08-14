<?php 
class Product{

    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)){
            return null;
        }else{
            $this->db = $db;
        }
    }

    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_assoc($result)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    // get data by specific id
    public function getitemid($item_id = null, $table = 'product', $id = 'item_id'){
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE {$id} = {$item_id} ");

            $resultArray = array();

            while($item = mysqli_fetch_assoc($result)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    // delete product by specific id 
    
    public function delete($id, $table = 'product', $item_id = 'item_id', $to='products.php'){
        if($id != null){
            $query = "DELETE FROM {$table} WHERE {$item_id} = {$id}";
            $result = $this->db->con->query($query);

            if($result){
                header("location: {$to}?SUCCESS=1");
            }else{
                echo "something went wrong";
            }
        }
    }

    // get product from cart table for specific user 
    
    public function getDataUser($user_id = null, $table = 'cart'){
        if($user_id !=null){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id = {$user_id};");

            $resultArray = array();

            while($id = mysqli_fetch_assoc($result)){
                $resultArray[] = $id;
            }

            return $resultArray;
        }
    }
    // for user login 
    public function loginUser($email, $password, $table = "users"){
        if(isset($email) && isset($password)){
            $result = $this->db->con->query("INSERT INTO '$table' (email, password) VALUES ('$email','$password')");

            if($result){
                header("location:".$_SERVER['PHP_SELF']."?LOGIN=SUCCESS");
            }else{
                echo "something went wrong";
            }
        }
    }
    // for adding product in database
    public function addproduct(
        $item_brand,
        $item_name,
        $item_price,
        $req_price,
        $quantity,
        $item_cat,
        $item_image,
        $description,
        $date
    ){
        if(
        $item_brand &&
        $item_name &&
        $item_price &&
        $req_price &&
        $quantity && 
        $item_cat &&
        $item_image &&
     
        $description &&
        $date
        ){
            $query = "INSERT INTO product (item_brand, item_name, item_price, reg_price, quantity, item_cat,item_image, description, item_register)
            VALUES ('$item_brand','$item_name', $item_price, $req_price, $quantity, '$item_cat','$item_image', '$description', '$date');";

            $result = $this->db->con->query($query);

            if($result){
                header("location:".$_SERVER['PHP_SELF']."?product=SUCCESS");
            }else{
                echo "something went wrong";
            }
        }else{
            echo 'all fields must fill in';
        }
    }

    // for updating product in database
    public function updateproduct(
        $id,
        $item_brand,
        $item_name,
        $item_price,
        $reg_price,
        $quantity,
        $item_cat,
        $item_image,
        $description,
        $date
    ){
        if(
        $item_brand &&
        $item_name &&
        $item_price &&
        $reg_price &&
        $quantity && 
        $item_cat &&
        $item_image &&
        $description &&
        $date
        ){
            $query = "UPDATE product set item_brand = '$item_brand', item_name = '$item_name', item_price = {$item_price}, reg_price = {$reg_price}, quantity = {$quantity}, item_cat = '$item_cat',item_image = '$item_image', description = '$description', item_register = '$date' WHERE item_id = $id";

            $result = $this->db->con->query($query);

            if($result){
                header("location: products.php?product=SUCCESS");
            }else{
                echo "something went wrong";
            }
        }else{
            echo 'all fields must fill in';
        }
    }
   
   // getting product data and product info 

   public function getInfo($table1 = 'product'){
        
   }
}