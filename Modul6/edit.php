<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'toko');

    $cari = "select * from barang where kode_barang='".$_GET['kode_barang']."'";
    $hasil = mysqli_query($conn, $cari);
    $data=mysqli_fetch_row($hasil);
?>
<body>
    <center>
        <h3>Edit Data barang : </h3>
                <table border="0" width="30%">
                    <form method="POST" action="edit.php?kode_barang=<?= $_GET['kode_barang'] ?>">
                        <tr>
                            <td width="25%">Kode Barang</td>
                            <td width="%">:</td>
                            <td width="65%"><input type="text" name="kode_barang" size="10" value="<?= $data[0] ?>"></td>
                        </tr>
                        <tr>
                            <td width="25%">Nama Barang</td>
                            <td width="%">:</td>
                            <td width="65%"><input type="text" name="nama_barang" size="10" value="<?= $data[1] ?>"></td>
                        </tr>
                        <tr>
                            <td width="25%">Kode Gudang</td>
                            <td width="%">:</td>
                            <td width="65%"><select name="kode_gudang">
                                <?php
                                    $sql = "Select * from gudang";
                                    $retval = mysqli_query($conn, $sql);
                                    $selected = '';
                                    while($row = mysqli_fetch_array($retval)){
                                        if($row['kode_gudang'] == $data[2]){
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                        echo "<option value='$row[kode_gudang]' $selected>$row[nama_gudang]</option>";
                                    }
                                ?></select></td>
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
                $kode_barang = $_POST['kode_barang'];
                $nama_barang = $_POST['nama_barang'];
                $kode_gudang = $_POST['kode_gudang'];
                $input = "update barang set kode_barang='$kode_barang', nama_barang='$nama_barang', kode_gudang='$kode_gudang' where kode_barang='".$_GET['kode_barang']."'";
                if($kode_barang==''){
                    echo "</br>Kode Barang tidak boleh kosong, harus diisi dulu";
                } elseif($nama_barang==''){
                    echo "</br>Nama Barang tidak boleh kosong, harus diisi dulu";
                } elseif($kode_gudang==''){
                    echo "</br>Kode Gudang tidak boleh kosong, harus diisi dulu";
                } else{
                    mysqli_query($conn, $input);
                    echo '</br>Data berhasil dimasukkan';
                    header('Location: form.php');
                } 
            }
        ?>
</body>
</html>