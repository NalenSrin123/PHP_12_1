<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <form action="" method="post" class="container w-25">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="login">Login</button>
        </form>
    </div>
</body>
</html>
<?php
    session_start();
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        if($username=="Bona" && $email =="admin@gmail.com" && $password=="admin@123"){
            $_SESSION['username']=$username;
            header("location: index.php");
        }
    }
?>