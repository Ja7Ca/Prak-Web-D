<?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');

    $nim = $_GET['nim'];
    $query = "DELETE FROM mahasiswa where nim='$nim'";
    $hasil = mysqli_query($conn, $query);

    if($hasil){
        echo "Sukses menghapus data";
        header('Location: form.php');
    } else {
        echo "Terjadi Kesalahan, $nim";
    }

?>