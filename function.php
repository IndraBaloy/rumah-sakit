<!--tambah data-->
<?php
    include "koneksi.php";
    if (isset($_POST['submit'])){
        $id_rm          = $_POST['id_rm'];
        $id_pasien      = $_POST['id_pasien'];
        $keluhan        = $_POST['keluhan'];
        $id_dokter      = $_POST['id_dokter'];
        $diagnosa       = $_POST['diagnosa'];
        $id_poli        = $_POST['id_poli'];
        $tgl_periksa    = $_POST['tgl_periksa'];

        $sql_rm = "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) VALUES ('$id_rm', '$id_pasien', '$keluhan', '$id_dokter', '$diagnosa', '$id_poli', '$tgl_periksa')";
        
        if ($koneksi->query($sql_rm) === TRUE) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan');
                    window.location.href = 'rekam_view.php';
            </script>";
        }else {
            echo "Gagal Tersimpan";
        }
    }
    ?>

<!--Select data-->
<div class="col-sm-10">
    <select class="form-select" name="id_pasien" id="id_pasien" aria-label="Default select example">
        <?php
            $sql_pasien = "SELECT * FROM tb_pasien";
            $result = mysqli_query($koneksi, $sql_pasien);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value=" . $row['id_pasien'] . " > " . $row['id_pasien'] . " - " . $row['nama_pasien'] . " </option>";
            }
            ?>
    </select>
</div>

<!--Edit Data-->
<?php
include "koneksi.php";

$id_dokter = $_GET['id_dokter'];
$sql_dokter = "SELECT * FROM tb_dokter WHERE id_dokter='$id_dokter'";
$result = mysqli_query($koneksi, $sql_dokter);

$row = mysqli_fetch_array($result);

?>

<!--form-->
<div class="mb-3 row">
    <label for="id_dokter" class="col-sm-2 col-form-label">ID Dokter</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="id_dokter" value='<?php echo $row['id_dokter']; ?>' readonly>
    </div>
</div>

<!--tambah edit-->
<?php
include "koneksi.php";
    if (isset($_POST['submit'])) {
        $id_dokter = $_POST['id_dokter'];
        $nama_dokter = $_POST['nama_dokter'];
        $spesialis = $_POST['spesialis'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];

        $sql_dokter = "UPDATE tb_dokter SET id_dokter = '$id_dokter', nama_dokter = '$nama_dokter', spesialis = '$spesialis', alamat = '$alamat', no_telp = '$no_telp' WHERE id_dokter = '$id_dokter'";

        if ($koneksi->query($sql_dokter) === TRUE) {
            echo "<script>
                    alert('Data Berhasil Diubah');
                    window.location.href = 'dokter_view.php';
            </script>";
        } else {
            echo "Gagal Tersimpan";
        }
    }
?>

<!--Hapus-->
<?php 
    include "koneksi.php"; 
    $id_dokter      = $_GET['id_dokter']; 
    $sql_dokter     = "DELETE From tb_dokter WHERE id_dokter='$id_dokter'"; 
    $result         = mysqli_query($koneksi, $sql_dokter); 
    
    if ($result) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        window.location.href = 'dokter_view.php';
    </script>
    ";
    } else {
        echo "
        <script>
            alert('Gagal menghapus data!');
            window.history.back();
        </script>
        ";
    } 
?>

<!--view-->
<tbody>
    <?php
        include "koneksi.php";
        $sql = "SELECT * FROM tb_dokter";
        $result = mysqli_query($koneksi,$sql);

        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>{$no}</td>
                <td>$row[id_dokter]</td>
                <td>$row[nama_dokter]</td>
                <td>$row[spesialis]</td>
                <td>$row[alamat]</td>
                <td>$row[no_telp]</td>
                <td class='text-center'>
                    <a href='dokter_edit.php?id_dokter=$row[id_dokter]' class='btn btn-sm btn-success'>Edit</a>
                    <a href='dokter_hapus.php?id_dokter=$row[id_dokter]' class='btn btn-sm btn-danger'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
    ?>
</tbody>

<!--Login-->
<?php  
    include 'koneksi.php'; 
    
    $username = $_POST['username']; 
    $password = md5($_POST['password']); 
    
    $login = mysqli_query($koneksi,query: "SELECT * FROM tb_user WHERE username='$username' AND 
    password='$password'"); 
    $cek = mysqli_num_rows($login); 
    
    if($cek > 0){ 
    session_start(); 
    $_SESSION['username'] = $username; 
    $_SESSION['status'] = "login"; 
    header("location:home.php"); 
    }else{ 
    header("location:index.php");  
    } 
    
?>

<!--Home-->
<?php 
include 'koneksi.php'; 

session_start(); 

if($_SESSION['status'] !="login"){ 
header("location:index.php"); 
} 
?>

<!--Logout-->
<?php  
session_start(); 
session_destroy(); 
header("location:index.php"); 
?>