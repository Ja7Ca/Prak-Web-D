<?php
    require "function.php";
    session_start();

    if($_SESSION['username'] != 'user'){
        echo "<script>alert('Silahkan login sebagai user')</script>";
        header("Location:login.php");
    }

    if(isset($_POST['kirim'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $adress = $_POST['adress'];
        $message = $_POST['message'];
        $date = date('Y-m-d');
        tambah($name, $email, $adress, $message, $date);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Guest Book Sign</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg bg-secondary bg-opacity-10" style="width: 100vw; min-height: 100vh;">
    <h1 class="fw-light text-secondary text-center py-3">Guest Book Sign</h1>
    <div class="container">
    <a href="logout.php" class="text-end bg-danger rounded text-decoration-none text-white px-3 py-1" style="position: absolute;">Log Out</a>
        <div class="form-sign bg-white rounded border border-1">
            <h3 class="text-center text-primary fw-bold mt-5 mb-3">Test's GuestBook</h3>
            <p class="text-center text-secondary">Please sign my Guestbook!</p>
            <form action="" method="post" class="bg-primary bg-opacity-10 my-2 py-4 mx-5 px-5" style="border-radius: 20px;">
                <p>Nama Lengkap <span class="text-danger">*</span> </p>
                <input type="text" name="name" maxlength="255" required style="width: 100%;">
                <p>Email</p>
                <input type="email" name="email" maxlength="255" style="width: 100%;">
                <p>Alamat</p>
                <input type="text" name="adress" maxlength="255" style="width: 100%;">
                <p>Pesan <span class="text-danger">*</span></p>
                <textarea name="message" required style="width: 100%; height: 100px;">

                </textarea>
                <div class="button text-center my-2">
                    <input type="submit" name="kirim" value="Kirim" class="border-0 rounded rounded-3 bg-primary text-white py-1 px-3">
                </div>
            </form>
            <hr>
            <div class="sign-guestbook">
                <?php
                    $data_sign = query("select * from guestbook");
                ?>
                <?php if(count($data_sign)>0): ?>
                <p class="text-center text-secondary">Total Entries : (<?= count($data_sign) ?>)</p>
                    <?php foreach($data_sign as $row): ?>
                <div class="bg-primary bg-opacity-10 my-2 py-4 mx-5 px-5" style="border-radius: 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-3">
                                    <p>Siapa Namamu? </p>
                                    <p>Darimana kamu berasal?</p>
                                    <p class="mb-0">Pesanmu</p>
                                </div>
                                <div class="col text-start">
                                    <p class="fw-bold"><?= $row['name'] ?></p>
                                    <p><?= $row['adress'] ?></p>
                                    <p class="mb-0"><?= $row['message'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 text-end">
                            <p class="my-0"><?= $row['date'] ?></p>
                        </div>
                    </div>
                </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>
</html>