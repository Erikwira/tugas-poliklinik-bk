<?php
    require 'config/koneksi.php';
    $id_poli = $_SESSION['id_poli'];

    $query_poli = "SELECT nama_poli FROM poli WHERE id = $id_poli";
    $result = mysqli_query($mysqli,$query_poli);

    if ($result) {
        // Ambil hasil query
        $row = mysqli_fetch_assoc($result);

        // Tampilkan nama poli
        $nama_poli = $row['nama_poli'];
    } else {
        // Handle error jika query gagal
        $nama_poli = "Tidak dapat mendapatkan nama poli";
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
        :root{
            --bg-1: #1A4D2E;
            --bg-2: #4F6F52;
            --color-text: #F5EFE6;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
        }

        .banner-section {
            font-family: 'Sora', sans-serif;
            background-image: url('./assets/images/bg-dokter.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100vh;
            width: 100%;
            color: var(--bg-1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .banner-section .section{
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .section h1{
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--bg-1);
            margin-bottom: 1rem;
        }

        .section p{
            font-size: 1.1rem;
            font-weight: 300;
            color: var(--bg-2);
        }

        .list-section {
            background: var(--color-text);
            padding: 2rem 0;
        }

        .list-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .list-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--bg-1);
            margin-bottom: 2rem;
        }

        .service-list {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            padding: 0;
        }

        .service-list li {
            background-color: var(--bg-1);
            color: var(--color-text);
            border-radius: 10px;
            padding: 2rem;
            width: 280px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            list-style: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .service-list li:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .service-list li i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--color-text);
        }

        .service-text {
            font-size: 1.1rem;
            font-weight: 500;
        }

    </style>
</head>

<body>
    <section class="banner-section">
        <div class="section">
            <h1 class="m-0 text-center">Selamat Datang Dokter <?php echo $username ?></h1>
            <p class="m-0 text-center">Anda berada di <?php echo $nama_poli; ?></p>
        </div>
    </section>

    <section class="list-section">
        <div class="list-container">
            <h2>Kesehatan Pasien Adalah Prioritas Utama</h2>
            <ul class="service-list">
                <li>
                    <i class="fas fa-calendar-check"></i>
                    <p class="service-text">Anda dapat mengelola jadwal</p>
                </li>
                <li>
                    <i class="fas fa-hand-holding-heart"></i>
                    <p class="service-text">Memberikan Perawatan Terbaik</p>
                </li>
                <li>
                    <i class="fas fa-chart-line"></i>
                    <p class="service-text">Fitur Untuk Meningkatkan Efisiensi Praktek Anda</p>
                </li>
                <li>
                    <i class="fas fa-user-md"></i>
                    <p class="service-text">Memberikan Pengalaman Terbaik Bagi Pasien</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Link to Bootstrap JS and other necessary scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>