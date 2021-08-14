<?php 
 
class Admin {

    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)){
            return null; 
        }else{
            $this->db = $db;
        }
    }

    public function addAdmin($name, $lname, $username, $email, $password, $photo, $position, $date){
        if($name && $lname && $username && $email && $password && $photo && $position && $date){
            $query = "INSERT INTO admins (firstname, lastname, username, email, password, photo, position, created_at) 
            VALUES ('$name','$lname', '$username', '$email','$password','$photo','$position', '$date')";
            $result = $this->db->con->query($query);
            if($result){
                header("location:".$_SERVER['PHP_SELF']."?add=SUCCESS");
            }else{
                header("location:".$_SERVER['PHP_SELF']."?add=FAILD"); 
            }
        }else{
            echo 'something is wrong';
        }

    }

    public function login($username, $password){
        if($username && $password){
            $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
            $result = $this->db->con->query($query);
            $row = mysqli_num_rows($result); 
            if($row == 1){
                $_SESSION['login'] = $username;
                header('location: dashboard.php');
            }else{
                header("location: login.php?login=failed");
            }
        }else{
            header("location: login.php?error=1");
        }
    }

    // for saved session 
    public function getSessionData($username, $table = 'admins'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE username = '$username'");
        $arr = [];
        if($result){
            while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
            }
            return $arr;
        }else{
            header("location: dashboard.php?error=1");
        }
    }
}