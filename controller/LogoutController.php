<!-- <h2>dau cat moi </h2> -->
<?php 
session_start(); 

unset($_SESSION['email']); 
header ('location: ../views/login.php');