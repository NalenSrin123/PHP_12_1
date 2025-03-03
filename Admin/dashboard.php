<?php 
  session_start();
    if(empty($_SESSION['user'])){
        header('location: login.php');
    }
?>
<h1>Hello Admin</h1>
<a href="logout.php">Logout</a>