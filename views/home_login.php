<?php 
session_start(); 
// include 'login.php'; 
// include 'register.php'; 
if(isset($_SESSION['email']))
{
    header('location: views/dashboard.php') ; 
}
else
{
    header('location: views/login.php'); 
}

