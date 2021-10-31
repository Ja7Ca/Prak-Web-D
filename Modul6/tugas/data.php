<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <?php
        require('koneksi.php');
    ?>
</head>
<body>
    <form action="data.php" method="POST">
        <table align="center">
            <tr>
                <td width="100px">Kode Buku</td>
                <td> : </td>
                <td><input type="text" name="kode_buku" required></td>
            </tr>
            <tr>
                <td width="100px">Nama Buku</td>
                <td> : </td>
                <td><input type="text" name="nama_buku" required></td>
            </tr>
            <tr>
                <td width="100px">Kode Jenis</td>
                <td> : </td>
                <td><select name="kode_jenis">
                        <?php
                            $sql = "Select * from jenis_buku";
                            $retval = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($retval)){
                                echo "<option value='$row[kode_jenis]'>$row[nama_jenis]</option>";
                            }
                        ?>
                        </select>
                        <a href='data_jenis.php' style='text-decoration:none; color: green'>Edit Jenis</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah Buku"></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $kode = $_POST['kode_buku'];
            $nama = $_POST['nama_buku'];
            $jenis = $_POST['kode_jenis'];
            $query_insert = "INSERT INTO buku (kode_buku, nama_buku, kode_jenis) values ('$kode', '$nama', '$jenis')";
            $hasil_insert = mysqli_query($conn, $query_insert);

            if($hasil_insert){
                echo "Data Berhasil Masuk";
                header('Location: data.php');
            } else {
                echo "Something error";
            }
        }
    ?>
    <br>
    <hr>
    <br>
    <table align="center" border="1">
        <tr>
            <th>Kode Buku</th>
            <th>Nama Buku</th>
            <th>Jenis Buku</th>
            <th>Keterangan</th>
        </tr>
        <?php
            $query_view = "select buku.kode_buku, buku.nama_buku, jenis_buku.nama_jenis from buku inner join jenis_buku on buku.kode_jenis=jenis_buku.kode_jenis";
            $hasil_view = mysqli_query($conn, $query_view);
            if($hasil_view){
                while($data_view=mysqli_fetch_row($hasil_view)){
                    echo "<tr>
                        <td width='25%'>$data_view[0]</td>
                        <td width='25%'>$data_view[1]</td>
                        <td width='25%'>$data_view[2]</td>
                        <td width='25%' align='center'><a href='edit.php?kode=$data_view[0]' style='text-decoration:none;'>Edit</a> | <a href='delete.php?kode=$data_view[0]&tabel=buku' style='color: red; text-decoration:none'>Hapus</a></td>
                    </tr>";
                }
            }
        ?>
    </table>
</body>
</html>