<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');
?>
<body>
    <center>
        <h3>Edit Data Mahasiswa :</h3>
                <table border="0" width="30%">
                    <form method="POST" action="edit.php?nim=<?= $_GET['nim'] ?>">
                        <tr>
                            <td width="25%">NIM</td>
                            <td width="%">:</td>
                            <td width="65%"><input type="text" name="nim" size="10" placeholder="<?= $_GET['nim'] ?>"></td>
                        </tr>
                        <tr>
                            <td width="25%">Nama</td>
                            <td width="%">:</td>
                            <td width="65%"><input type="text" name="nama" size="10" placeholder="<?= $_GET['nama'] ?>"></td>
                        </tr>
                        <tr>
                            <td width="25%">Kelas</td>
                            <td width="%">:</td>
                            <td width="65%"><input type="radio" name="kelas" value="A" checked>A
                            <input type="radio" name="kelas" value="B" checked>B
                            <input type="radio" name="kelas" value="C" checked>C</td>
                        </tr>
                        <tr>
                            <td width="25%">Alamat</td>
                            <td width="%">:</td>
                            <td width="65%"><input type="text" name="alamat" size="40" placeholder="<?= $_GET['alamat'] ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="submit" value="Edit"></td>
                        </tr>
                    </form>
                </table>
    </center>
    <?php
            error_reporting(E_ALL ^ E_NOTICE);
            if(isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $alamat = $_POST['alamat'];
                $input = "update mahasiswa set nim='$nim', nama='$nama', kelas='$kelas', alamat='$alamat' where nim='".$_GET['nim']."'";
                if($nim==''){
                    echo "</br>NIM tidak boleh kosong, harus diisi dulu";
                } elseif($nama==''){
                    echo "</br>Nama tidak boleh kosong, harus diisi dulu";
                } elseif($alamat==''){
                    echo "</br>Alamat tidak boleh kosong, harus diisi dulu";
                } else{
                    mysqli_query($conn, $input);
                    echo '</br>Data berhasil dimasukkan';
                    header('Location: form.php');
                } 
            }
        ?>
</body>
</html>