<!DOCTYPE html>
<html>
<head>
    <title>Cek Ganjil Genap</title>
</head>
<body>
    <form method="POST" action="cekBilangan.php">
        <p>Masukkan Angka : <input type="text" name="angka" size="3"></p>
        <input type="submit" name="submit" value="Cek Ganjil Genap">
    </form>
    <?php
            error_reporting(E_ALL^E_NOTICE);
            $angka = $_POST['angka'];
            $submit = $_POST['submit'];

            if($submit){
                if(empty($angka)){
                    $hasil = "Masukkan Kosong";
                } elseif($angka%2==0){
                    $hasil = "Genap";
                } elseif($angka%2==1){
                    $hasil = "Ganjil";
                } else {
                    $hasil = "Masukkan salah";
                }
                echo "Angka : $angka<br>";
                echo "Merupakan bilangan $hasil<br>";
            }
    ?>
</body>
</html>