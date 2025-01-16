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
        <h3>Tambah Data Dokter</h3>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="id_dokter" class="col-sm-2 col-form-label">ID Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_dokter" name="id_dokter"
                                placeholder="Masukkan Id Dokter">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"
                                placeholder="Masukkan Nama Dokter">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="spesialis" name="spesialis"
                                placeholder="Masukkan Spesialis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan Alamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                placeholder="Masukkan Nomor Telpon">
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
        $id_dokter      = $_POST['id_dokter'];
        $nama_dokter    = $_POST['nama_dokter'];
        $spesialis      = $_POST['spesialis'];
        $alamat         = $_POST['alamat'];
        $no_telp        = $_POST['no_telp'];

        $sql_dokter = "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialis, alamat, no_telp) VALUES ('$id_dokter','$nama_dokter','$spesialis','$alamat','$no_telp')";
        
        if ($koneksi->query($sql_dokter) === TRUE) {
            echo "<script>
                    alert('Data Berhasil Ditambahkan');
                    window.location.href = 'dokter_view.php';
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