<style>
    :root{
        --bg-1: #1A4D2E;
        --bg-2: #4F6F52;
        --color-text: #F5EFE6;
    }
    .main-sidebar{
        height: 100%;
        background-color: var(--bg-1);
        color: var(--color-text);
    }
    .sidebar .user-panel{
        background-color: var(--bg-2);
        padding: 10px;
        border-radius: 5px;
        margin: 10px 0;
    }
    .user-panel .info h1{
        color: var(--color-text);
        font-size: 18px;
        font-weight: 700;
    }

    .sidebar .form-inline{
        display: flex;
        flex-direction: row;
        width: 100%;
        margin: 20px 0;
    }
    .form-inline .input-group1{
        flex: 1;
    }
    .form-inline .input-group2{
        flex: 0;
    }
    .form-inline .input-group1 .form-control{
        width: 100%;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
    }
    .form-inline .input-group2 .btn{
        padding: 7.5px 10px;
        background-color: var(--bg-2);
        color: var(--color-text);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }
    .nav-tree{
        background: var(--bg-2);
    }
    .nav-tree:hover{
        background: var(--color-text);
    }
    .nav-tree i, .nav-tree p{
        color: var(--color-text);
    }
    .nav-tree:hover i, .nav-tree:hover p{
        color: var(--bg-1);
    }
    .nav-treeview .nav-item .nav-link{
        background: var(--bg-1);
    }
    .nav-treeview .nav-item:hover .nav-link{
        background: var(--color-text);
    }
    .nav-treeview .nav-item .nav-link i,
    .nav-treeview .nav-item .nav-link p{
        color: var(--color-text);
    }
    .nav-treeview .nav-item:hover .nav-link i,
    .nav-treeview .nav-item:hover .nav-link p{
        color: var(--bg-1);
    }
    .nav-link p span{
        background: var(--bg-2);
    }
</style>
<aside class="main-sidebar elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel d-flex">
            <div class="image">
                <img src="assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <h1 class="d-block"><?php echo $username ?></h1>
            </div>
        </div>

        

        <?php
        if ($_SESSION['akses'] == "pasien" || $_SESSION['akses'] == "dokter") {
        ?>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="editProfile.php" class="nav-link nav-tree">
                        <i class="nav-icon fas fa-user nav-icon"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
            </ul>
        <?php
        }
        ?>

        <!-- SidebarSearch Form -->
<!--         <div class="form-inline">
            <div class="input-group1" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            </div>
            <div class="input-group2">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link nav-tree">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <?php
                    if ($_SESSION['akses'] == "admin") {
                    ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="dashboard_admin.php" class="nav-link">
                                    <i class="fas fa-solid fas fa-th nav-icon"></i>
                                    <p>Dashboard <span class="right badge badge-danger">Admin</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dokter.php" class="nav-link">
                                    <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                                    <p>Dokter <span class="right badge badge-danger">Admin</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="poli.php" class="nav-link">
                                    <i class="fas fa-solid fa-hospital nav-icon"></i>
                                    <p>Poli <span class="right badge badge-danger">Admin</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="obat.php" class="nav-link">
                                    <i class="fas fa-solid fa-tablets nav-icon"></i>
                                    <p>Obat <span class="right badge badge-danger">Admin</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pasien.php" class="nav-link">
                                    <i class="fas fa-solid fa-user nav-icon"></i>
                                    <p>Pasien <span class="right badge badge-danger">Admin</span></p>
                                </a>
                            </li>
                        </ul>
                    <?php 
                    } else if($_SESSION['akses'] == "dokter"){ 
                    ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="dashboard_dokter.php" class="nav-link">
                                    <i class="fas fa-solid fas fa-th nav-icon"></i>
                                    <p>Dashboard <span class="right badge badge-success">Dokter</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="jadwalPeriksa.php" class="nav-link">
                                    <i class="fas fa-solid fa-hospital-user nav-icon"></i>
                                    <p>Jadwal Dokter <span class="right badge badge-success">Dokter</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="periksaPasien.php" class="nav-link">
                                    <i class="fas fa-solid fa-stethoscope nav-icon"></i>
                                    <p>Periksa Pasien <span class="right badge badge-success">Dokter</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="riwayatPasien.php" class="nav-link">
                                    <i class="fas fa-solid fa-book-medical nav-icon"></i>
                                    <p>Riwayat Pasien <span class="right badge badge-success">Dokter</span></p>
                                </a>
                            </li>
                        </ul>
                    <?php 
                    } else if($_SESSION['akses'] == "pasien"){
                    ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="dashboard_pasien.php" class="nav-link">
                                    <i class="fas fa-solid fa-hospital-user nav-icon"></i>
                                    <p>Dashboard <span class="right badge badge-info">Pasien</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="daftarPoliklinik.php" class="nav-link">
                                    <i class="fas fa-solid fa-stethoscope nav-icon"></i>
                                    <p>Daftar Poli <span class="right badge badge-info">Pasien</span></p>
                                </a>
                            </li>
                        </ul>
                    <?php 
                    } ?>
                </li>
                <li class="nav-item">
                    <a href="pages/logout/logout.php" class="nav-link nav-tree @media (min-width: 992px) {
    .sidebar-mini.sidebar-collapse .main-sidebar, .sidebar-mini.sidebar-collapse .main-sidebar::before ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>