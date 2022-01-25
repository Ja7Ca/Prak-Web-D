<?php
    $conn = mysqli_connect('localhost', 'root', '', 'guestbook');

    function query($query){
        global $conn;
        $data = mysqli_query($conn, $query);
        echo mysqli_error($conn);
        $rows = [];
        while ($row = mysqli_fetch_assoc($data)){ 
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($name, $email, $adress, $message, $date){
        global $conn;

        $query_insert = "insert into guestbook values (NULL, '$date', '$name', '$email', '$adress', '$message')";
        if(!mysqli_query($conn, $query_insert)){
            echo mysqli_error($conn);
        } else {
            echo "<script>alert('Berhasil Terkirim')</script>";
        }
    }

    function cekAkun($user, $pass){
        global $conn;
        $akun = query("select * from user where username='$user'");
        if (mysqli_affected_rows($conn)){
            if($akun[0]['username']==$user && $akun[0]['password']==$pass){
                if($user == 'admin'){
                    $_SESSION['username'] = 'admin';
                    header("Location:admin.php");
                } else {
                    $_SESSION['username'] = 'user';
                    header("Location:index.php");
                }
                return true;
            } else {
                return false;
            }
        }
        var_dump(mysqli_error($conn));
    }

    function daftar($user, $pass, $confPass){
        global $conn;

        if($pass != $confPass){
            echo "<script>alert('Password dan Konfirmasi Password harus sama!')</script>";
            return false;
        }
        $dataUser = query("select * from user where username='$user'");
        if(count($dataUser)>0){
            echo "<script>alert('Username sudah terpakai')</script>";
            return false;
        }
        $query_insert = "insert into user (id, username, password) values (NULL, '$user', '$pass')";
        if(!mysqli_query($conn, $query_insert)){
            echo mysqli_error($conn);
        } else {
            echo "<script>alert('Berhasil Terdaftar')</script>";
        }
    }

    function hapus($id, $tabel){
        global $conn;

        $query_delete = "delete from $tabel where id='$id'";
        if(!mysqli_query($conn, $query_delete)){
            echo mysqli_error($conn);
        } else {
            echo "<script>alert('Berhasil Terhapus')</script>";
        }
    }

    function edit($id){
        header("Location:edit.php?id=$id");
    }
?>