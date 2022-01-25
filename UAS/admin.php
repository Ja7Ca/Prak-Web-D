<?php
    require "function.php";
    session_start();

    if($_SESSION['username'] != 'admin'){
        echo "<script>alert('Silahkan login sebagai admin')</script>";
        header("Location:login.php");
    }

    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        hapus($id, 'guestbook');
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        edit($id);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <!-- Link Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="width: 100vw; min-height: 100vh;" class="bg-secondary bg-opacity-10">
    <h1 class="text-center text-secondary fw-light py-3">Guestbook Post</h1>
    <div class="container">
    <a href="logout.php" class="text-end bg-danger rounded text-decoration-none text-white px-3 py-1">Log Out</a>
        <div class="post bg-white rounded border border-1">
            <div class="item p-3">
                <?php
                    $data_post = query("select * from guestbook");
                ?>
                <div class="row border-top border-bottom">
                    <div class="col-8 fw-bold text-secondary">
                        Author / Post
                    </div>
                    <div class="col-2 fw-bold text-center text-secondary">Tanggal</div>
                    <div class="col-2"></div>
                </div>
                <?php if(count($data_post)>0): ?>
                <?php foreach($data_post as $row): ?>
                <div class="row border-bottom">
                    <div class="col-8">
                        <div class="row">
                            <div class="col fw-bold">
                                <?= $row['name'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= $row['email'] ?>
                                <br>
                                <?= $row['message'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-flex align-items-center text-center justify-content-center">
                        <?= $row['date'] ?>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-around">
                        <form method="post">
                        <input type="submit" name="edit" value="Edit" class="bg-primary border-0 rounded rounded-3 text-white px-3 py-1">
                        <input type="submit" name="hapus" value="Hapus" class="bg-danger border-0 rounded rounded-3 text-white px-3 py-1">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        </form>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    
</body>
</html>