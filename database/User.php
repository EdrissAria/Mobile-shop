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
    public function insertUser(
                $firstname = null,
                $lastname = null,
                $username = null, 
                $email = null, 
                $password = null,
                $phone = null, 
                $address = null, 
                $date = null)
                {
                    
        if($firstname != null && $lastname != null && $username != null && $email != null && $password != null && $phone != null && $address != null && $date != null){
            $query = "INSERT INTO users (firstname, lastname, username, email, password, phone, address, register_date)
            VALUES ('$firstname','$lastname','$username','$email','$password','$phone','$address','$date');";

            $result = $this->db->con->query($query);
            if($result){
                $User_id = $this->db->con->query("SELECT user_id FROM users order by user_id desc limit 1;");
                $row = mysqli_fetch_assoc($User_id);
                $_SESSION['login'] = $row['user_id'];
                header("location:".$_SERVER["PHP_SELF"]);
            }
            return $result;
        }
    }
    
    // select user 

    public function getUser($email = null, $password = null, $table = "users"){
        $command = "SELECT * FROM $table WHERE email = '$email' AND password = '$password';";
        $result = $this->db->con->query($command);
        $row = mysqli_fetch_array($result);
       
        if($row){
            $_SESSION['login'] = $row['user_id'];
            header("location:".$_SERVER["PHP_SELF"]);
        }else{
            header("location:".$_SERVER["PHP_SELF"].'?login=failed');
        }
    }

    // sign in user 

    public function signIn($email, $password, $table = 'users'){
        $command = "INSERT INTO {$table} (email, password) VALUES ('$email', '$password')";
        $result = $this->db->con->query($command);
        if($result){
            $_SESSION['login'] = $row['user_id'];
            header("location:".$_SERVER["PHP_SELF"].'?signin=success');
        }else{
            header("location:".$_SERVER["PHP_SELF"].'?login=failed');
        }
    }
}