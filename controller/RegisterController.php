<!-- <h2>vl dau cat moi</h2> -->
<?php
// header('location: ../views/dashboard.php'); 0
session_start(); 

require_once '../Config/Database.php';
$connect = new Database(); 

// print_r($connect); 
// print_r($_POST); die;
$submit = $_POST; 
$name = $_POST['username']; 
$email = $_POST['email']; 
$password = md5($_POST['password']); 
$level = $_POST['level']; 
// print_r($_POST);die;
if(isset($submit) && isset($name) && isset($email) && isset($password) && isset($level)){
    // echo '18 cu'; 
    $sql = "SELECT email FROM users_pj WHERE email = '${email}'"; 
    // echo $sql;  
    $query = mysqli_query($connect->connect(), $sql); 
    // print_r($query); die; 
    if(mysqli_num_rows($query)==0){
        // echo "bh moi cat cac thang value"; 
        $data_key = array_keys($_POST); 
        $data_values = array_values($_POST); 
        // unset($data_values[3], $data_values[5], $data_values[6]);

        // print_r($data_values); die;
        // neu confirm ma bang thang password thi tiep
        if($data_values[2] === $data_values[3]){
            unset($data_key[3], $data_key[5], $data_key[6]);
            $data_values = [$name, $email, $password, $level];
            
            // print_r($data_key);die;
            // print_r($data_values); die;
            $data_key = implode(', ', $data_key); 
            // values 
            $data_values2 = $data_values; 
            // print_r($data_values);die();
    
            $values = array_map(function ($data_values)
            {
                return "'".$data_values."'";
            },$data_values2);
            $values = implode(', ', $values); 
            // print_r($values); die; 
            $sql = "INSERT INTO users_pj(${data_key}) VALUES (${values})"; 
            // print_r($sql); die; 
            mysqli_query($connect->connect(), $sql); 
            //set session + cookie
            $_SESSION['email'] = $email; 

            // Thiết lập Cookie "Ghi nhớ đăng nhập" trong 15' ~ 3600s
            setcookie('is_logged', true, time()+ 3600, '/');
            setcookie("email", $email, time()+3600, "/", "", 0); 

            header('location: ../views/dashboard.php'); 
        }
        else
        {
            echo 'dda to tai'; 
            header ('location: ../views/register.php'); 
        }
    }
}
