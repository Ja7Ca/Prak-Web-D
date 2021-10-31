<?php
    $conn = mysqli_connect('localhost', 'root', '', 'toko');

    $kode_barang = $_GET['kode_barang'];
    $query = "DELETE FROM barang where kode_barang='$kode_barang'";
    $hasil = mysqli_query($conn, $query);

    if($hasil){
        echo "Sukses menghapus data";
        header('Location: form.php');
    } else {
        echo "Terjadi Kesalahan, $kode_barang";
    }

?>