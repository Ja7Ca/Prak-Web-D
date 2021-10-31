<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'toko');
?>
<body>
    <center>
        <h3>Masukkan Data Barang :</h3>
        <table border="0" width="30%">
            <form method="POST" action="form.php">
                <tr>
                    <td width="25%">Kode Barang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="kode_barang" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Nama Barang</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama_barang" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Gudang</td>
                    <td width="5%">:</td>
                    <td width="65%"><select name="kode_gudang">
                        <?php
                            $sql = "Select * from gudang";
                            $retval = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($retval)){
                                echo "<option value='$row[kode_gudang]'>$row[nama_gudang]</option>";
                            }
                        ?>
                        </select><a href=""></a></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="submit" value="Masukkan"></td>
                </tr>
            </form>
        </table>
        <?php
            error_reporting(E_ALL ^ E_NOTICE);
            if(isset($_POST['submit'])){
                $kode_barang = $_POST['kode_barang'];
                $nama_barang = $_POST['nama_barang'];
                $kode_gudang = $_POST['kode_gudang'];
                $input = "INSERT INTO barang (kode_barang, nama_barang,kode_gudang) values ('$kode_barang', '$nama_barang','$kode_gudang')";

                if($kode_gudang==''){
                    echo "</br>Kode Gudang tidak boleh kosong, harus diisi dulu";
                } elseif($nama_barang==''){
                    echo "</br>Nama Barang tidak boleh kosong, harus diisi dulu";
                } elseif($kode_gudang==''){
                    echo "</br>Kode Gudang tidak boleh kosong, harus diisi dulu";
                } else{
                    mysqli_query($conn, $input);
                    echo '</br>Data berhasil dimasukkan';
                } 
            }
        ?>
        <hr>
        <h3>Data Mahasiswa</h3>
        <table border="1" width="50%">
            <tr>
                <th align="center" width="20%">Kode Barang</th>
                <th align="center" width="20%">Nama Barang</th>
                <th align="center" width="20%">Alamat Gudang</th>
                <th align="center" width="20%">Keterangan</th>
            </tr>
            <?php
                $cari = "select barang.kode_barang, barang.nama_barang, gudang.lokasi from barang, gudang where barang.kode_gudang = gudang.kode_gudang";
                $hasil = mysqli_query($conn, $cari);
                while($data=mysqli_fetch_row($hasil)){
                    echo "<tr>
                            <td width='20%'>$data[0]</td>
                            <td width='20%'>$data[1]</td>
                            <td width='20%'>$data[2]</td>
                            <td width='20%' align='center'><a href='edit.php?kode_barang=$data[0]'>Ubah</a> | <a href='delete.php?kode_barang=$data[0]'>Hapus</a></td>
                        </tr>";
                }
            ?>
        </table>
    </center>
</body>
</html>