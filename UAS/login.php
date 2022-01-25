<?php
    require "function.php";
    session_start();

    if(isset($_SESSION['username'])){
        if($_SESSION['username']== 'admin'){
            header("Location:admin.php");
        } elseif($_SESSION['username']== 'user'){
            header("Location:user.php");
        }
    }
    

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $password = $_POST['password'];

        cekAkun($user, $password);
    }

    if(isset($_POST['daftar'])){
        $user = $_POST['username'];
        $password = $_POST['password'];
        $confPass = $_POST['confpass'];

        daftar($user, $password, $confPass);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login / Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg bg-secondary bg-opacity-10 d-flex align-items-center" style="width: 100vw; min-height: 100vh;">
    <div class="container">
        <h1 class="text-secondary fw-bold text-center my-5">Guestbook - Jarot Setiawan - L200190247</h1>
        <div class="row">
            <div class="col login bg-white rounded rounded-2 border border-end">
                <h3 class="text-center text-primary fw-bold mt-5 mb-3">Login</h3>
                <form action="" method="post" class="text-center mb-5">
                    <p>Username</p>
                    <input type="text" name="username" style="width: 50%;" required>
                    <p>Password</p>
                    <input type="password" name="password" style="width: 50%;" required>
                    <br>
                    <input type="submit" name="login" value="Login" class="bg-primary border-0 rounded rounded-3 text-white px-3 py-1 my-3">
                </form>
            </div>
            <div class="col register bg-white rounded rounded-2 border border-start">
                <h3 class="text-center text-primary fw-bold mt-5 mb-3">Register</h3>
                <form action="" method="post" class="text-center mb-5">
                    <p>Username</p>
                    <input type="text" name="username" style="width: 50%;" required>
                    <p>Password</p>
                    <input type="password" name="password" style="width: 50%;" required>
                    <p>Konfirmasi Password</p>
                    <input type="password" name="confpass" style="width: 50%;" required>
                    <br>
                    <input type="submit" name="daftar" value="Daftar" class="bg-primary border-0 rounded rounded-3 text-white px-3 py-1 my-3">
                </form>
            </div>
        </div>
    </div>
</body>
</html>