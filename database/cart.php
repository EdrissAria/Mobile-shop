<?php 

class Cart{

    public $db = null;


    public function __construct(DBController $db){
        if(!isset($db->con)){
            return null;
        }else{
            $this->db = $db;
        }
    }
    // insert a product from all pruducts 
    public function insertIntoCart($params = null, $table = "cart"){
        if($this->db->con != null){
            if($params != null){
                $collumns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $collumns, $values);

                $result = $this->db->con->query($query_string);

                return $result;
            }
        }
    }

    public function addtoCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            $result = $this->insertIntoCart($params);
            if($result){
                header("location:".$_SERVER['PHP_SELF'].'?item_id='.$itemid);
            }
        }
    }
    // for getting subtotal price in cart 
    public function getSum($arr){
        $sum = 0; 
        if(isset($arr)){
            foreach($arr as $item){
                $sum += intval($item[0]);
            }
        } 
        
        return sprintf('%d',$sum);
    }

    public function delete_cart($item_id = null, $table = 'cart'){
        if(isset($item_id)){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
            if($result){
                header("location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    // get item id from cart 
    public function getId($arrayId = null, $key = "item_id"){
        if(isset($arrayId)){
            $cart_id = array_map(function($value) use($key) {
                return $value[$key];
            },$arrayId);
            return $cart_id;
        }
    }

    // save for later function 
    public function SaveForLater($item_id = null, $saveto = "wishlist", $fromtable = "cart"){
        if($item_id != null){
            $query = "INSERT INTO {$saveto} SELECT * FROM {$fromtable} WHERE item_id = {$item_id};";
            $query .= "DELETE FROM {$fromtable} WHERE item_id = {$item_id};";

            $result = $this->db->con->multi_query($query);

            if($result){
                header("location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}