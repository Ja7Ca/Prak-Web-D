<!DOCTYPE html>
<html>
<head>
    <title>Edit Jenis Buku</title>
    <?php
        require('koneksi.php');

        $cari = "select * from jenis_buku where kode_jenis='".$_GET['kode']."'";
        $hasil = mysqli_query($conn, $cari);
        $data=mysqli_fetch_row($hasil);
    ?>
</head>
<body>
    <form action="edit_jenis.php?kode=<?= $_GET['kode'] ?>" method="POST">
        <table align="center">
            <tr>
                <td width="100px">Kode Jenis</td>
                <td> : </td>
                <td><input type="text" name="kode_jenis" value="<?= $data[0] ?>" required></td>
            </tr>
            <tr>
                <td width="100px">Nama Jenis</td>
                <td> : </td>
                <td><input type="text" name="nama_jenis" value="<?= $data[1] ?>" required></td>
            </tr>
            <tr>
                <td width="100px">Pengertian</td>
                <td> : </td>
                <td><textarea rows="5" cols="20" name="keterangan_jenis" placeholder="500 karakter" required><?= $data[2] ?></textarea></td>
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
            $kode_jenis = $_POST['kode_jenis'];
            $nama_jenis = $_POST['nama_jenis'];
            $keterangan_jenis = $_POST['keterangan_jenis'];
            $query_edit = "update jenis_buku set kode_jenis='$kode_jenis', nama_jenis='$nama_jenis', keterangan_jenis='$keterangan_jenis' where kode_jenis='".$_GET['kode']."'";
            $hasil_edit = mysqli_query($conn, $query_edit);
            if($hasil_edit){
                echo "Data berhasil diedit";
                header('Location: data_jenis.php');
            } else {
                echo "Query Error, $kode_jenis";
            }
        }
    ?>
</body>
</html>