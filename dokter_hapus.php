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