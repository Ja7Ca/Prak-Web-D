<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');


    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "select * from user where username='$username' and password='$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

        if($row['username']!=""){
            //berhasil login
            $_SESSION['username']=$row['username'];
            $_SESSION['status']=$row['status'];
            ?>
            <script>
                alert('Anda Login Sebagai <?php echo $row['username']; ?> ');
                document.location='hasillogin.php';
            </script>
            <?php
        } else {
            //gagal login
            ?>
            <script>
                alert('Gagal Login');
                document.location='login.php';
            </script>
            <?php
        }
    }
?>
<form method="post" action="login.php">
    <p align="center">
        Username : <input type="text" name="username"><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </p>
</form>