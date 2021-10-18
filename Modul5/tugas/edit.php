<!DOCTYPE html>
<html>
<head>
    <title>Edit Gudang</title>
    <?php
        require('koneksi.php');
    ?>
</head>
<body>
    <form action="edit.php?kode=<?= $_GET['kode'] ?>" method="POST">
        <table align="center">
            <tr>
                <td width="100px">Kode Gudang</td>
                <td> : </td>
                <td><input type="text" name="kode_gudang" placeholder="<?= $_GET['kode'] ?>" required></td>
            </tr>
            <tr>
                <td width="100px">Nama Gudang</td>
                <td> : </td>
                <td><input type="text" name="nama_gudang" placeholder="<?= $_GET['nama'] ?>" required></td>
            </tr>
            <tr>
                <td width="100px">Lokasi</td>
                <td> : </td>
                <td><input type="text" name="lokasi" placeholder="<?= $_GET['lok'] ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Edit"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $kode_gudang = $_POST['kode_gudang'];
            $nama_gudang = $_POST['nama_gudang'];
            $lokasi = $_POST['lokasi'];
            $query_edit = "update gudang set kode_gudang='$kode_gudang', nama_gudang='$nama_gudang', lokasi='$lokasi' where kode_gudang='".$_GET['kode']."'";
            $hasil_edit = mysqli_query($conn, $query_edit);
            if($hasil_edit){
                echo "Data berhasil diedit";
                header('Location: data.php');
            } else {
                echo "Query Error, $kode_gudang";
            }
        }
    ?>
</body>
</html>