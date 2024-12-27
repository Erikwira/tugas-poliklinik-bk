<!DOCTYPE html>
<html lang="en">

<head>
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
            background-image: url('./assets/images/bg-pasien1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100vh;
            width: 100%;
            color: var(--bg-1);
            display: flex;
            justify-content: center;
        }

        .banner-section .section{
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            top: 5%;
        }

        .section h1{
            font-size: 2.5rem;
            font-weight: 500;
            color: var(--bg-1);
            margin-bottom: 1rem;
        }

        .section p{
            font-size: 1.1rem;
            font-weight: 300;
            color: var(--bg-2);
        }

        .list-section{
            width: 100%;
            height: 400px;
            background: var(--color-text);
            padding: 2rem 0;
        }

        .list-section .list-container{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
        }

        .list-section h2{
            text-align: center;
            font-size: 2.5rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .service-list{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-left: 0;
        }

        .service-list li{
            background-color: var(--bg-1);
            color: var(--color-text);
            border-radius: 5px;
            margin: 1rem;
            padding: 1.5rem;
            width: calc(50% - 2rem);
            text-align: center;
            transition: transform 0.3s;
        }

        .service-list li:hover{
            transform: scale(1.03);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        li i, li span {
            font-size: 20px;
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <section class="banner-section">
        <div class="section">
            <h1>Kesehatan Anda Kebahagiaan Kami Juga</h1>
            <p>PolikliniKlik Siap Melayani Kesehatan Anda Dengan Segenap Hati</p>
        </div>
    </section>

    <section class="list-section">
        <div class="list-container">
            <h2>Layanan Kami</h2>
            <ul class="service-list">
                <li>
                    <i class="icon fas fa-stethoscope"></i>
                    <span class="service-text">Layanan Medis Umum</span>
                </li>
                <li>
                    <i class="icon fas fa-user-md"></i>
                    <span class="service-text">Pemeriksaan Spesialis</span>
                </li>
                <li>
                    <i class="icon fas fa-hospital"></i>
                    <span class="service-text">Fasilitas Kesehatan Modern</span>
                </li>
                <li>
                    <i class="icon fas fa-comments"></i>
                    <span class="service-text">Konsultasi Kesehatan</span>
                </li>
            </ul>
        </div>
    </section>
</body>
</html>