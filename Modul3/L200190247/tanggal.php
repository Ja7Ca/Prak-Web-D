<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <?php
        date_default_timezone_set('Asia/Jakarta');
        $jam=date("H:i:s A");
        $waktu=date("d-m-y");
        $hari=date("l");
        $tanggal=date("d");
        $bulan=date("F");
        $tahun=date("Y");
        echo "Sekarang jam $jam<br>";
        echo "Sekarang tanggal $waktu<br>";
        echo "Lebih detailnya hari $hari Tanggal $tanggal Bulan $bulan Tahun $tahun";
    ?>
</body>
</html>