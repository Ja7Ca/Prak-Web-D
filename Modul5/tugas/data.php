<!DOCTYPE html>
<html>
<head>
    <title>Data Gudang</title>
    <?php
        require('koneksi.php');
    ?>
</head>
<body>
    <form action="data.php" method="POST">
        <table align="center">
            <tr>
                <td width="100px">Kode Gudang</td>
                <td> : </td>
                <td><input type="text" name="kode_gudang" required></td>
            </tr>
            <tr>
                <td width="100px">Nama Gudang</td>
                <td> : </td>
                <td><input type="text" name="nama_gudang" required></td>
            </tr>
            <tr>
                <td width="100px">Lokasi</td>
                <td> : </td>
                <td><input type="text" name="lokasi" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah Gudang"></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $kode = $_POST['kode_gudang'];
            $nama = $_POST['nama_gudang'];
            $lokasi = $_POST['lokasi'];
            $query_insert = "INSERT INTO gudang (kode_gudang, nama_gudang, lokasi) values ('$kode', '$nama', '$lokasi')";
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
            <th>Kode Gudang</th>
            <th>Nama Gudang</th>
            <th>Lokasi Gudang</th>
            <th>Keterangan</th>
        </tr>
        <?php
            $query_view = "select * from gudang";
            $hasil_view = mysqli_query($conn, $query_view);
            if($hasil_view){
                while($data_view=mysqli_fetch_row($hasil_view)){
                    echo "<tr>
                        <td width='25%'>$data_view[0]</td>
                        <td width='25%'>$data_view[1]</td>
                        <td width='25%'>$data_view[2]</td>
                        <td width='25%' align='center'><a href='edit.php?kode=$data_view[0]&nama=$data_view[1]&lok=$data_view[2]' style='text-decoration:none;'>Edit</a> | <a href='delete.php?kode=$data_view[0]' style='color: red; text-decoration:none'>Hapus</a></td>
                    </tr>";
                }
            }
        ?>
    </table>
</body>
</html>