<!DOCTYPE html>
<html>
<head>
    <title>Penjumlahan</title>
</head>
<body>
    <form method="POST" action="jumlah.php">
        <p>Nilai A adalah <input type="text" name="angkaA" size="3"></p>
        <p>Nilai B adalah <input type="text" name="angkaB" size="3"></p>
        <input type="submit" name="submit" value="Jumlahkan">
    </form>

    <?php
        error_reporting(E_ALL^E_NOTICE);
        $angkaA = $_POST['angkaA'];
        $angkaB = $_POST['angkaB'];
        $submit = $_POST['submit'];

        if($submit){
            if(empty($angkaA) or empty($angkaB)){
                $hasil = "Masukkan kosong";
            } elseif($angkaA + $angkaB){
                $hasil = $angkaA + $angkaB;
            } else {
                $hasil = "Nilai yang dimasukkan salah";
            }
            echo "<p> Nilai A adalah $angkaA</p><br>";
            echo "<p> Niali B adakah $angkaB</p><br>";
            echo "<p>Jadi Nilai A ditambah Nilai B adalah $hasil</p>";
        }
    ?>
</body>
</html>