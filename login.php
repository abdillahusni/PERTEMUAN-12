<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "koneksi.php";
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $cek = $result->num_rows;
    if($cek > 0){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $row['nama_lengkap'];
        header('location:dashboard.php');
    }else{
        session_start();
        $_SESSION['pesan'] = "username atau password anda salah!!!";
        header('location:index.php');
    }
    }else{
        header('location:index.php');
    }     
    ?>