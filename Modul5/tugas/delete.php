<?php
    require('koneksi.php');

    $kode = $_GET['kode'];
    $query_delete = "DELETE FROM gudang where kode_gudang='$kode'";
    $hasil = mysqli_query($conn, $query_delete);

    if($hasil){
        echo "Sukses menghapus data";
        header('Location: data.php');
    } else {
        echo "Terjadi Kesalahan, $kode";
    }
?>