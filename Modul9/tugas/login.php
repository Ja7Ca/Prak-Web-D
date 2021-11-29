<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php
        require("function.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $row = cekUser($username, $password); 
            if($row){
                session_start();
                $_SESSION['user'] = $row['username'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['nama'] = $row['nama'];
                header("Location:index.php");
            } else {
                ?>
                <script>
                    alert("Username atau password salah!")
                </script>
                <?php
            }
        }
    ?>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>: <input type="text" name="username" placeholder="Masukkan username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>: <input type="password" name="password" placeholder="Masukkan password"></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" name="submit" value="Login"> </td>
            </tr>
        </table>
    </form>
</body>
</html>