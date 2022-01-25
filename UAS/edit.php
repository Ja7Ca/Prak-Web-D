<?php
    require "function.php";
    session_start();

    if($_SESSION['username'] != 'admin'){
        echo "<script>alert('Silahkan login sebagai admin')</script>";
        header("Location:login.php");
    }

    if(!isset($_GET['id'])){
        header("Location:login.php");
    } else {
        $id = $_GET['id'];
    }

    if(isset($_POST['edit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $adress = $_POST['adress'];
        $message = $_POST['message'];
        
        $query_edit = "update guestbook set name='$name', email='$email', adress='$adress', message='$message' where id='$id'";
        if(!mysqli_query($conn, $query_edit)){
            echo mysqli_error($conn);
        } else {
            echo "<script>alert('Berhasil Diedit')</script>";
            header("Location:admin.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Book Sign</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg bg-secondary bg-opacity-10" style="width: 100vw; min-height: 100vh;">
    <h1 class="fw-light text-secondary text-center py-3">Guest Book Edit</h1>
    <div class="container">
        <div class="form-sign bg-white rounded border border-1">
            <?php
                $data_edit = query("select * from guestbook where id='$id'");
                if(count($data_edit)==0){
                    header("Location:login.php");
                }
            ?>
            <form action="" method="post" class="bg-primary bg-opacity-10 my-2 py-4 mx-5 px-5" style="border-radius: 20px;">
                <p>Nama Lengkap <span class="text-danger">*</span> </p>
                <input type="text" name="name" maxlength="255" required value="<?= $data_edit[0]['name'] ?>" style="width: 100%;">
                <p>Email</p>
                <input type="email" name="email" maxlength="255" required value="<?= $data_edit[0]['email'] ?>" style="width: 100%;">
                <p>Alamat</p>
                <input type="text" name="adress" maxlength="255" required value="<?= $data_edit[0]['adress'] ?>" style="width: 100%;">
                <p>Pesan <span class="text-danger">*</span></p>
                <textarea name="message" required style="width: 100%; height: 100px;"><?= $data_edit[0]['message'] ?></textarea>
                <div class="button text-center my-2">
                    <input type="submit" name="edit" value="Edit" class="border-0 rounded rounded-3 bg-primary text-white py-1 px-3">
                </div>
            </form>
        </div>
    </div>
</body>
</html>