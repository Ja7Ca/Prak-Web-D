<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <?php
        require('koneksi.php');

        $cari = "select * from buku where kode_buku='".$_GET['kode']."'";
        $hasil = mysqli_query($conn, $cari);
        $data=mysqli_fetch_row($hasil);
    ?>
</head>
<body>
    <form action="edit.php?kode=<?= $_GET['kode'] ?>" method="POST">
        <table align="center">
            <tr>
                <td width="100px">Kode Buku</td>
                <td> : </td>
                <td><input type="text" name="kode_buku" value="<?= $data[0] ?>" required></td>
            </tr>
            <tr>
                <td width="100px">Nama Buku</td>
                <td> : </td>
                <td><input type="text" name="nama_buku" value="<?= $data[1] ?>" required></td>
            </tr>
            <tr>
                <td width="100px">Kode Jenis</td>
                <td> : </td>
                <td><select name="kode_jenis">
                    <?php
                        $sql = "Select * from jenis_buku";
                        $retval = mysqli_query($conn, $sql);
                        $selected = '';
                        while($row = mysqli_fetch_array($retval)){
                            if($row['kode_jenis'] == $data[2]){
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='$row[kode_jenis]' $selected>$row[nama_jenis]</option>";
                        }
                    ?></select></td>
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
            $kode_buku = $_POST['kode_buku'];
            $nama_buku = $_POST['nama_buku'];
            $kode_jenis = $_POST['kode_jenis'];
            $query_edit = "update buku set kode_buku='$kode_buku', nama_buku='$nama_buku', kode_jenis='$kode_jenis' where kode_buku='".$_GET['kode']."'";
            $hasil_edit = mysqli_query($conn, $query_edit);
            var_dump(($query_edit));
            if($hasil_edit){
                echo "Data berhasil diedit";
                header('Location: data.php');
            } else {
                var_dump((mysqli_error($conn)));
                echo "Query Error, $kode_buku";
            }
        }
    ?>
</body>
</html>