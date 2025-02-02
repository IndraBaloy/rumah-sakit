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
        <h3>Data Poliklinik</h3>
        <hr>
        <a class="btn btn-primary mb-2" href="poli_tambah.php">Tambah Data</a>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Id Poli</th>
                            <th scope="col">Nama Poli</th>
                            <th scope="col">Gedung</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM tb_poliklinik";
                        $result = mysqli_query($koneksi,$sql);

                        $no = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>{$no}</td>
                            <td>$row[id_poli]</td>
                            <td>$row[nama_poli]</td>
                            <td>$row[gedung]</td>
                            <td class='text-center'>
                                <a href='poli_edit.php?id_poli=$row[id_poli]' class='btn btn-sm btn-success'>Edit</a>
                                <a href='poli_hapus.php?id_poli=$row[id_poli]' class='btn btn-sm btn-danger'>Hapus</a>
                            </td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>