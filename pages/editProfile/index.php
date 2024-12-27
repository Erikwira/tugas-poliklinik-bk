<style>
    :root {
        --bg-1: #1A4D2E;
        --bg-2: #4F6F52;
        --color-text: #F5EFE6;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #F5EFE6;
    }

    .row .col-sm-6 h1{
        color: var(--bg-1);
        font-weight: 700;
    }
    
    .card {
        position: relative;
        width: 100%;
    }
    
    .card-header {
        position: relative;
        background: var(--bg-1);
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-tools .btn {
        background: var(--bg-2);
        color: var(--color-text);
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
    }
    
    .card-tools .btn:hover {
        background: var(--color-text);
        color: var(--bg-2);
    }

    .edit-btn{
        background: var(--bg-1);
        color: var(--color-text);
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
    }

    .edit-btn:hover{
        background: var(--color-text);
        color: var(--bg-1);
    }

    .modal-tabel{
        width: 100%;
        height: 100%;
    }

    .modal-tabel .modal-dialog{
        width: 100%;
    }

    .modal-dialog .modal-content {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .form-group label{
        font-size: 16px;
        font-weight: 700;
        color: var(--bg-1);
    }

    .form-group .form-control {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid var(--bg-1);
    }

    .form-control option{
        color: var(--bg-1);
        font-weight: 500;
    }
    @media (min-width: 576px) {
    .modal-dialog {
        max-width: 100%;
        margin: 0;
    }
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Profile Pasien</h1>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
<!-- TAMPILKAN DATA PASIEN DI SINI -->
<?php
if ($_SESSION['akses'] == "pasien") {
require 'config/koneksi.php';
$user_id = $_SESSION['id'] ?? null;
$query = "SELECT * FROM pasien WHERE id = '$user_id'";
$result = mysqli_query($mysqli, $query);

$data = mysqli_fetch_assoc($result)
?>
<div class="modal-tabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Form edit data pasien disini -->
                <form action="pages/editProfile/updatePasien.php" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" required>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat" required><?php echo $data['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $data['no_ktp'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp'] ?>" required>
                    </div>
                    <button type="submit" class="btn edit-btn">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} else if ($_SESSION['akses'] == "dokter") {
    require 'config/koneksi.php';
$user_id = $_SESSION['id'] ?? null;
$query = "SELECT * FROM dokter WHERE id = '$user_id'";
    $result = mysqli_query($mysqli, $query);
    
    $data = mysqli_fetch_assoc($result)
    ?>
    <div class="modal-tabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Form edit data Dokter disini -->
                    <form action="pages/editProfile/updateDokter.php" method="post">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" required>
                        <div class="form-group">
                            <label for="nama">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat" required><?php echo $data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp'] ?>" required>
                        </div>
                        <button type="submit" class="btn edit-btn">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}?>