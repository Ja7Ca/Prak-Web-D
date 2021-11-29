<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <?php
        session_start();
        require("function.php");
    ?>
</head>
<body>
    <center>
        <h1>Selamat Datang, <span><?= $_SESSION['nama']  ?></span></h1>


        <?php if($_SESSION['status'] == 'Administrator'): ?>
        Data User
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>User</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $sql = "Select username from user where status='Member'";
                $retval = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($retval)){
                    echo "<tr>
                            <td>$row[username]</td>
                            <td><a href='#'>Hapus User</a></td>
                    </tr>";
                }
            ?>
        </table>
        <?php else: ?>
            <h2>Ini Halaman User</h2>
        <?php endif; ?>
        <br>
        <br>
        <a href="logout.php">Log Out</a>
    </center>
</body>
</html>