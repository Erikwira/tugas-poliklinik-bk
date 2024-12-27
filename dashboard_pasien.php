<!DOCTYPE html>
<?php
    session_start();
    $username = $_SESSION['username'];

    if ($username == "") {
        header("location:login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PolikliniKlik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <style>
        .content-wrapper {
            height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include ('components/sidebar.php') ?>
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <?php include ('pages/dashboard/index.php') ?>
        </div>
        <!-- /.content-wrapper -->
    </div>
</body>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
</html>