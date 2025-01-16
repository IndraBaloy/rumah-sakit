<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    body {
        overflow-x: hidden;
    }

    #sidebar {
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        width: 250px;
        background-color: #343a40;
        color: white;
        padding-top: 1rem;
        transition: all 0.3s;
    }

    #sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    #sidebar ul li {
        margin: 0.5rem 0;
    }

    #sidebar ul li .btn {
        width: 100%;
        text-align: left;
        color: white;
        background-color: transparent;
        border: none;
    }

    #sidebar ul li .btn:hover {
        background-color: #495057;
    }

    #content {
        margin-left: 250px;
        padding: 1rem;
    }

    @media (max-width: 768px) {
        #sidebar {
            left: -250px;
        }

        #sidebar.toggled {
            left: 0;
        }

        #content {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>
    <div id="sidebar" class="bg-dark">
        <h4 class="text-center">Rekam M</h4>
        <nav>
            <ul>
                <li><a class="btn" href="#"><i class="bi bi-house me-2"></i>Home</a></li>
                <li><a class="btn" href="#"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
                <li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-database me-2"></i>Data Master</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="dokter_view.php">Dokter</a></li>
                            <li><a class="dropdown-item" href="poli_view.php">PoliKlinik</a></li>
                            <li><a class="dropdown-item" href="pasien_view.php">Pasien</a></li>
                            <li><a class="dropdown-item" href="rekam_view.php">Rekam Medis</a></li>
                            <li><a class="dropdown-item" href="obat_view.php">Obat</a></li>
                        </ul>
                    </div>
                </li>
                <li><a class="btn" href="#"><i class="bi bi-box-arrow-in-left me-2"></i>Logout</a></li>
            </ul>
        </nav>
    </div>

    <div id="content">
        <h3>Tambah Data Rekam Medis</h3>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="id_rm" class="col-sm-2 col-form-label">ID Rekam Medis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_rm" name="id_rm"
                                placeholder="Masukkan Id Rekam Medis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_pasien" class="col-sm-2 col-form-label">ID Pasien</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="id_pasien" id="id_pasien"
                                aria-label="Default select example">
                                <?php
                                $sql_pasien = "SELECT * FROM tb_pasien";
                                $result = mysqli_query($koneksi, $sql_pasien);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['id_pasien'] . " > " . $row['id_pasien'] . " - " . $row['nama_pasien'] . " </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keluhan" name="keluhan"
                                placeholder="Masukkan Keluhan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_dokter" class="col-sm-2 col-form-label">ID Dokter</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="id_dokter" id="id_dokter"
                                aria-label="Default select example">
                                <?php
                                $sql_dokter = "SELECT * FROM tb_dokter";
                                $result = mysqli_query($koneksi, $sql_dokter);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['id_dokter'] . " > " . $row['id_dokter'] . " - " . $row['nama_dokter'] . " </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="diagnosa" name="diagnosa"
                                placeholder="Masukkan Diagnosa">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_poli" class="col-sm-2 col-form-label">ID Poli</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="id_poli" id="id_poli" aria-label="Default select example">
                                <?php
                                $sql_poli = "SELECT * FROM tb_poliklinik";
                                $result = mysqli_query($koneksi, $sql_poli);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['id_poli'] . " > " . $row['id_poli'] . " - " . $row['nama_poli'] . " </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_periksa" class="col-sm-2 col-form-label">Tanggal Periksa</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa"
                                placeholder="Masukkan Tanggal Periksa">
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mx-auto d-block" value="Tambah"></input>
                </form>
            </div>
        </div>
    </div>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>