<!-- <h2>dau cat moi </h2> -->
<?php
// header('location: ../views/dashboard.php'); 0
session_start(); 

require_once '../Config/Database.php';
$connect = new Database(); 

// print_r($connect); 
// print_r($_POST); die;
$submit = $_POST; 
$email = $_POST['email']; 
$password = md5($_POST['password']); 
print_r($_POST);die;
if(isset($submit) && isset($email) && isset($password)){
    // echo '18 cu'; 
    $sql = "SELECT email, password, level FROM users_pj WHERE email = '${email}'"; 
    // print_r($sql);  die;
    $query = mysqli_query($connect->connect(), $sql); //truy van
    // print_r($query); die; 
    $getValues = mysqli_fetch_assoc($query); // lay mang gia tri
    // print_r($getValues); die; 

    if(mysqli_num_rows($query)==0){
        echo 'acc khong ton tai'; 
        header ('location: ../views/login.php'); 
    }
    else
    {
        // echo "dau cat moi";
        //dang nhap voi tu cach gi? 
        $level = $getValues['level'];
        $password_query = $getValues['password'];
        if($level == 0)
        {
            //user thuong
            if($password === $password_query){
                $_SESSION['email'] = $getValues['email'];
                // neu nguoi ta chon luu pass, thi dung 
                if($_POST['remember_me'] == 1)
                {
                    setcookie('log-time', true, time()+3600, "/");
                    setcookie("email", $getValues['email'], time()+3600, "/", "", 0);

                }
                header('location: ../views/dashboard.php');
            }
            else
            {
                $quote = 'Sai mat khau!';
                header('location: ../views/login.php', $quote);
            }
        }
    }
}