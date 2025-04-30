<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sing Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    form{
        width: 400px;
        padding: 30px;
        border-radius: 5px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: auto;
        margin-top: 50px;
    }
</style>
<body>
    <form action="{{ route('signupSubmit') }}" method="post">
        @csrf
        <h3 class="text-center">Sign Up</h3>
        <div class="form-group">
            <label for="name" class="form-label">Username</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group d-flex flex-column mt-2">
            <a class="text-center" href="{{ route('login') }}">Already have account?</a>
            <button type="submit" class="btn btn-primary mt-3">SignUp</button>
        </div>
    </form>
</body>
</html>
