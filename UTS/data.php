<!DOCTYPE html>
<html>
    <head>
        <title>Rumah Sakit</title>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'rumah_sakit');
        ?>
    </head>
    <body>
        <center>
            <form method="POST" action="">
            <table border="1" cellspacing="0">
                <tr>
                    <th colspan="2">Pendaftaran Pasien</th>
                </tr>
                <tr>
                    <td>ID Pasien</td>
                    <td><input type="text" name="id_pasien" maxlength="5" required></td>
                </tr>
                <tr>
                    <td>No KTP</td>
                    <td><input type="text" name="no_ktp" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="nama" maxlength="50" required></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="radio" name="jk" value="Laki-Laki">Laki-Laki
                    <input type="radio" name="jk" value="Perempuan">Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="tglLahir" value="dd/mm/yy" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" maxlength="100" required></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td><input type="text" name="nohp" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>
                        <select name="agama">
                            <option value="Islam" selected>Islam</option>
                            <option value="Kriten">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>
                        <textarea name="keluhan" maxlength="100"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Dokter Yang Menangani</td>
                    <td>
                        <select name="dokter">
                        <?php
                            $sql = "Select * from dokter";
                            $retval = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($retval)){
                                echo "<option value='$row[id_dokter]'>$row[nama_dokter]</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="SUBMIT"></td>
                </tr>
            </table>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $id_pasien = $_POST['id_pasien'];
                    $no_ktp = $_POST['no_ktp'];
                    $nama = $_POST['nama'];
                    $jk = $_POST['jk'];
                    $tglLahir = $_POST['tglLahir'];
                    $alamat = $_POST['alamat'];
                    $nohp = $_POST['nohp'];
                    $agama = $_POST['agama'];
                    $keluhan = $_POST['keluhan'];
                    $dokter = $_POST['dokter'];

                    $query_insert = "INSERT INTO pasien values('$id_pasien', '$no_ktp', '$nama', '$jk', '$tglLahir', '$alamat', '$nohp', '$agama', '$keluhan', '$dokter')";

                    if(mysqli_query($conn, $query_insert)){
                        echo "<script>
                                alert('Data berhasil ditambahkan');
                                </script>";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            ?>
            <br>
            <br>
            <h1>Data Pasien</h1>
            <br>
            <table border="1" cellspacing="0">
                <tr>
                    <th>NO</th>
                    <th>ID Pasien</th>
                    <th>No KTP</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Hp</th>
                    <th>Agama</th>
                    <th>Keluhan</th>
                    <th>Dokter Yang Menangani</th>
                </tr>
                <tr>
                    <?php
                    $i=1;
                    $cari = "select * from pasien";
                    $hasil = mysqli_query($conn, $cari);
                    while($data=mysqli_fetch_row($hasil)){
                        echo "<tr>
                                <td>".$i++."</td>
                                <td>$data[0]</td>
                                <td>$data[1]</td>
                                <td>$data[2]</td>
                                <td>$data[3]</td>
                                <td>$data[4]</td>
                                <td>$data[5]</td>
                                <td>$data[6]</td>
                                <td>$data[7]</td>
                                <td>$data[8]</td>
                                <td>$data[9]</td>
                            </tr>";
                    }
                    ?>
                </tr>
            </table>
        </center>
    </body>
</html>