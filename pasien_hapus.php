<?php 
    include "koneksi.php"; 
    $id_pasien      = $_GET['id_pasien']; 
    $sql_pasien     = "DELETE From tb_pasien WHERE id_pasien = '$id_pasien'"; 
    $result         = mysqli_query($koneksi, $sql_pasien); 
    
    if ($result) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        window.location.href = 'pasien_view.php';
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