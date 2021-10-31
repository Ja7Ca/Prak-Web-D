<?php
    require('koneksi.php');

    $kode = $_GET['kode'];
    $tabel = $_GET['tabel'];
    if($tabel == 'buku'){
        $query_delete = "DELETE FROM $tabel where kode_buku='$kode'";
        $loc = 'data.php';
    } else {
        $query_delete = "DELETE FROM $tabel where kode_jenis='$kode'";
        $loc = 'data_jenis.php';
    }
    
    $hasil = mysqli_query($conn, $query_delete);

    if($hasil){
        echo "Sukses menghapus data";
        header("Location: $loc");
    } else {
        echo "Terjadi Kesalahan, $kode";
    }
?>