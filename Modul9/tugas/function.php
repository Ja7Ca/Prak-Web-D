<?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');

    function cekUser($username, $password){
        global $conn;
        $query_view = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
        if($query_view){
            $row = mysqli_fetch_array($query_view);
            return $row;
        } else {
            return false;
        }
    }
?>