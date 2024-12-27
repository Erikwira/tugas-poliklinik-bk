<style>
    :root{
        --bg-1: #1A4D2E;
        --bg-2: #4F6F52;
        --color-text: #F5EFE6;
    }
    .main-header{
        background: var(--color-text);
    }
    .main-header .navbar-nav .nav-item a{
        color: var(--bg-1);
        font-weight: 700;
    }
    .main-header .navbar-nav .nav-item a:hover{
        color: var(--bg-2);
    }
    .form-inline .input-group .form-control{
        border: 1px solid var(--bg-2);
        border-radius: 5px;
        padding: 8px 15px;
        background: #fff;
    }
    .form-inline .input-group .form-control:focus{
        border: 1px solid var(--bg-2);
    }
    .form-inline .input-group .input-group-append .btn-bar{
        color: var(--bg-1);
    }
    .form-inline .input-group .input-group-append .btn-navbar i{
        color: var(--bg-1);
    }
    .form-inline .input-group .input-group-append .btn-navbar:hover i{
        color: var(--bg-2);
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
    </ul>
</nav>