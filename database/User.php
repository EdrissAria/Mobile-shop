<?php 

class User{

    public $db = null;
    
    public function __construct(DBController $db)
    {
        if(!isset($db->con)){
            return null;
        }else{
            $this->db = $db;
        }
    }

    // sign up users into database 
    public function signinUser($email = null, $password = null){
        if($email != null && $password != null){
            $query = "INSERT INTO users (email, password) VALUES ('$email','$password');";
            $result = $this->db->con->query($query);
            if($result){
                header("location:".$_SERVER["PHP_SELF"]."?signin=success");
            }
            return $result;
        }
    }
    // select user 
    public function getUser($email = null, $password = null, $table = "users"){
        $command = "SELECT * FROM $table WHERE email = '$email' AND password = '$password';";
        $result = $this->db->con->query($command);
        $row = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $_SESSION['login'] = $row['user_id'];
            header("location:".$_SERVER["PHP_SELF"].'?login=success');
        }else{
            header("location:".$_SERVER["PHP_SELF"].'?login=failed');
        }
    }

}