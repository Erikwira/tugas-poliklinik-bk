<!DOCTYPE html>
<html lang="en">

<style>
    :root{
        --bg-1: #1A4D2E;
        --bg-2: #4F6F52;
        --color-text: #F5EFE6;
    }
    .tempat-body{
        background: #fff !important;
    }
    .landing{
        position: relative;
        width: 100%;
        height: 100vh;
        background-image: url("./assets/images/team-doctors.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .landing .row-landing{
        position: relative;
        backdrop-filter: blur(5px);
        padding: 15px;
        border-radius: 10px;
        top: 150px;
        text-align: center;
    }
    .row-landing .land-font{
        color: var(--color-text);
    }
    .pasien{
        background-image: url("./assets/images/pasient.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top;
        position: relative;
        height: 500px;
        width: 100%;
        padding: 0 0 0 300px !important;
    }
    .dokter{
        background-image: url("./assets/images/doctor.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top;
        position: relative;
        height: 500px;
        width: 100%;
        padding: 0 0 0 300px !important;
    }
    .row{
        position: relative;
        width: 400px;
        backdrop-filter: blur(5px);
        padding: 10px;
        border-radius: 5px;
    }
    .row i{
        font-size: 50px;
        color: var(--bg-1);
    }
    .row .login{
        font-size: 38px;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--color-text);
    }
    .row p{
        font-size: 20px;
        font-weight: 300;
        text-transform: capitalize;
        color: var(--color-text);
    }
    .row .btn{
        background-color: var(--bg-1);
        color: var(--color-text);
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        font-size: 20px;
        font-weight: 500;
    }
    .row .btn:hover{
        background-color: var(--bg-2);
        color: var(--color-text);
    }

    @media (max-width: 768px) {
        .card-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .img-box {
            justify-content: center;
            margin-bottom: 15px;
        }
    }

</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PolikliniKlik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="hold-transition login-page tempat-body">
    <div class="container-fluid flex flex-col justify-center items-center p-5 landing">
        <div class="row row-landing">
            <h1 class="font-weight-bold mb-3 land-font">PolikliniKlik</h1>
            <h5 class="land-font">Website Layanan Kesehatan Masyarakat</h5>
        </div>
    </div>
    <div class="container-fluid flex flex-col justify-center pasien">
        <div class="row">
            <i class="fas fa-hospital-user"></i>
            <h3 class="login text-bold">Pasien</h3>
            <p class="text-white">ingin periksa, silahkan login</p>
            <a href="loginUser.php" class="btn btn-success btn-block">Masuk</a>
        </div>
    </div>
    <div class="container-fluid flex flex-col justify-center dokter">
        <div class="row">
            <i class="fas fa-stethoscope"></i>
            <h3 class="login text-bold">Dokter</h3>
            <p class="text-white">ingin memeriksa, silahkan login</p>
            <a href="login.php" class="btn btn-success btn-block">Masuk</a>
        </div>
    </div>
</body>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</html>