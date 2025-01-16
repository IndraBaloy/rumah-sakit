<?php  
    include 'koneksi.php'; 
    
    $username = $_POST['username']; 
    $password = md5($_POST['password']); 
    
    $login = mysqli_query($koneksi,query: "SELECT * FROM tb_user WHERE username='$username' AND 
    password='$password'"); 
    $cek = mysqli_num_rows($login); 
    
    if($cek > 0){ 
    session_start(); 
    $_SESSION['username'] = $username; 
    $_SESSION['status'] = "login"; 
    header("location:home.php"); 
    }else{ 
    header("location:index.php");  
    } 
    
?>