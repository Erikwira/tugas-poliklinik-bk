<?php

include 'config/koneksi.php';


$query_jml_pasien = "SELECT COUNT(*) as jumlah_pasien FROM pasien";
$query_jml_dokter = "SELECT COUNT(*) as jumlah_dokter FROM dokter";
$query_jml_poli = "SELECT COUNT(*) as jumlah_poli FROM poli";
$query_jml_obat = "SELECT COUNT(*) as jumlah_obat FROM obat";

// Eksekusi query dan ambil hasilnya
$result_pasien = mysqli_query($mysqli, $query_jml_pasien);
$result_dokter = mysqli_query($mysqli, $query_jml_dokter);
$result_poli = mysqli_query($mysqli, $query_jml_poli);
$result_obat = mysqli_query($mysqli, $query_jml_obat);

// Cek apakah query berhasil dieksekusi
if ($result_pasien && $result_dokter && $result_poli && $result_obat) {
    // Ambil hasil query
    $row_pasien = mysqli_fetch_assoc($result_pasien);
    $row_dokter = mysqli_fetch_assoc($result_dokter);
    $row_poli = mysqli_fetch_assoc($result_poli);
    $row_obat = mysqli_fetch_assoc($result_obat);

    // Ambil nilai jumlah dari hasil query
    $jumlah_pasien = $row_pasien['jumlah_pasien'];
    $jumlah_dokter = $row_dokter['jumlah_dokter'];
    $jumlah_poli = $row_poli['jumlah_poli'];
    $jumlah_obat = $row_obat['jumlah_obat'];
} else {
    // Handle kesalahan jika query tidak berhasil
    $jumlah_pasien = "Error";
    $jumlah_dokter = "Error";
    $jumlah_poli = "Error";
    $jumlah_obat = "Error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Dashboard</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        :root {
            --bg-1: #1A4D2E;
            --bg-2: #4F6F52;
            --color-text: #F5EFE6;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            height: 100vh;
        }

        .row .col-sm-6 h1{
            color: var(--bg-1);
            font-weight: 700;
        }

        .small-box {
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: var(--color-text);
            margin-bottom: 20px;
            padding: 15px;
            background: var(--bg-1);
        }

        .small-box .inner {
            text-align: center;
        }

        .small-box .inner h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-text);
        }

        .small-box .inner p {
            font-size: 1.2rem;
            font-weight: 500;
            margin: 5px 0 0 0;
            color: var(--color-text);
        }

        .small-box .small-box-footer {
            background: #fff;
            color: var(--bg-1);
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
        }

        .small-box .small-box-footer:hover {
            background: var(--bg-2);
            color: var(--color-text);
        }
    </style>
</head>

<body>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $jumlah_pasien; ?></h3>

                            <p>Jumlah Pasien</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="pasien.php" class="small-box-footer">Info Selanjutnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $jumlah_dokter; ?><sup style="font-size: 20px"></sup></h3>

                            <p>Jumlah Dokter</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="dokter.php" class="small-box-footer">Info Selanjutnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $jumlah_poli; ?></h3>

                            <p>Jenis Poli</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="poli.php" class="small-box-footer">Info Selanjutnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $jumlah_obat; ?></h3>

                            <p>Jenis Obat</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="obat.php" class="small-box-footer">Info Selanjutnya <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Link to Bootstrap JS and other necessary scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>