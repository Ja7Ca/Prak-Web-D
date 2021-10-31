<!DOCTYPE html>
<html>
<head>
    <title>Data Jenis Buku</title>
    <?php
        require('koneksi.php');
    ?>
</head>
<body>
    <form action="data_jenis.php" method="POST">
        <table align="center">
            <tr>
                <td width="100px">Kode Jenis</td>
                <td> : </td>
                <td><input type="text" name="kode_jenis" required></td>
            </tr>
            <tr>
                <td width="100px">Nama Jenis</td>
                <td> : </td>
                <td><input type="text" name="nama_jenis" required></td>
            </tr>
            <tr>
                <td width="100px">Keterangan</td>
                <td> : </td>
                <td><textarea rows="5" cols="20" name="keterangan" placeholder="500 karakter" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah Jenis Buku"></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $kode = $_POST['kode_jenis'];
            $nama = $_POST['nama_jenis'];
            $keterangan = $_POST['keterangan'];
            $query_insert = "INSERT INTO jenis_buku (kode_jenis, nama_jenis, keterangan_jenis) values ('$kode', '$nama', '$keterangan')";
            $hasil_insert = mysqli_query($conn, $query_insert);

            if($hasil_insert){
                echo "Data Berhasil Masuk";
                header('Location: data_jenis.php');
            } else {
                var_dump(mysqli_error($conn));
                echo "Something error";
            }
        }
    ?>
    <br>
    <hr>
    <br>
    <a href="data.php">Kembali Ke Data Buku</a>
    <br>
    <br>
    <table align="center" border="1">
        <tr>
            <th>Kode Jenis</th>
            <th>Nama Jenis</th>
            <th>Pengertian</th>
            <th>Keterangan</th>
        </tr>
        <?php
            $query_view = "select * from jenis_buku";
            $hasil_view = mysqli_query($conn, $query_view);
            if($hasil_view){
                while($data_view=mysqli_fetch_row($hasil_view)){
                    echo "<tr>
                        <td width='25%'>$data_view[0]</td>
                        <td width='25%'>$data_view[1]</td>
                        <td width='25%'>$data_view[2]</td>
                        <td width='25%' align='center'><a href='edit_jenis.php?kode=$data_view[0]' style='text-decoration:none;'>Edit</a> | <a href='delete.php?kode=$data_view[0]&tabel=jenis_buku' style='color: red; text-decoration:none'>Hapus</a></td>
                    </tr>";
                }
            }
        ?>
    </table>
</body>
</html>