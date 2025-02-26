
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    form{
        width: 380px;
        padding: 30px;
        border-radius: 5px;
        margin: auto;
        margin-top: 50px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>
<body>
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Register</h2>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="profile" class="form-label">Profile:</label>
                <input type="file" name="profile" id="profile" class="form-control">
            </div>
            <div class="form-group d-flex flex-column align-items-center mt-2">
                <a href="login.php">Already have account?</a>
            <button type="submit" class="btn btn-primary w-100 mt-3" name="signup">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php include "function.php";
    registerAccount();
 ?>