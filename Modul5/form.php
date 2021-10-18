<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');
?>
<body>
    <center>
        <h3>Masukkan Data Mahasiswa :</h3>
        <table border="0" width="30%">
            <form method="POST" action="form.php">
                <tr>
                    <td width="25%">NIM</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nim" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Nama</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="nama" size="10"></td>
                </tr>
                <tr>
                    <td width="25%">Kelas</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="radio" name="kelas" value="A" checked>A
                    <input type="radio" name="kelas" value="B" checked>B
                    <input type="radio" name="kelas" value="C" checked>C</td>
                </tr>
                <tr>
                    <td width="25%">Alamat</td>
                    <td width="5%">:</td>
                    <td width="65%"><input type="text" name="alamat" size="40"></td>
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
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $alamat = $_POST['alamat'];
                $input = "INSERT INTO mahasiswa (nim, nama, kelas, alamat) values ('$nim', '$nama', '$kelas', '$alamat')";

                if($nim==''){
                    echo "</br>NIM tidak boleh kosong, harus diisi dulu";
                } elseif($nama==''){
                    echo "</br>Nama tidak boleh kosong, harus diisi dulu";
                } elseif($alamat==''){
                    echo "</br>Alamat tidak boleh kosong, harus diisi dulu";
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
                <th align="center" width="20%">NIM</th>
                <th align="center" width="20%">Nama</th>
                <th align="center" width="20%">Kelas</th>
                <th align="center" width="20%">Alamat</th>
                <th align="center" width="20%">Keterangan</th>
            </tr>
            <?php
                $cari = "select * from mahasiswa order by nim";
                $hasil = mysqli_query($conn, $cari);
                while($data=mysqli_fetch_row($hasil)){
                    echo "<tr>
                            <td width='20%'>$data[0]</td>
                            <td width='20%'>$data[1]</td>
                            <td width='20%'>$data[2]</td>
                            <td width='20%'>$data[3]</td>
                            <td width='20%' align='center'><a href='edit.php?nim=$data[0]&nama=$data[1]&alamat=$data[3]'>Ubah</a> | <a href='delete.php?nim=$data[0]'>Hapus</a></td>
                        </tr>";
                }
            ?>
        </table>
    </center>
</body>
</html>