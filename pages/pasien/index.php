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
    
    .card-header .card-title{
        position: absolute;
        top: 35%;
        color: var(--color-text);
        font-size: 1.3rem;
        font-weight: 500;
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

    .card-body{
        background: #fff;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        color: var(--color-text);
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table thead {
        background: var(--bg-1);
        color: var(--color-text);
    }

    .table tbody tr:hover {
        background: var(--bg-2);
        color: var(--color-text);
    }

    .table tbody tr td:last-child {
        text-align: center;
    }

    .modal-content {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .modal-content .modal-header .modal-title{
        font-size: 20px;
        font-weight: 700;
        color: var(--bg-1);
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
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Pasien</h1>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-sm float-right" data-toggle="modal"
                                data-target="#addModal">
                                Tambah
                            </button>
                            <!-- Modal Tambah Data Pasien -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Data Pasien</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form tambah data pasien disini -->
                                            <form action="pages/pasien/tambahPasien.php" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pasien</label>
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control" rows="3" id="alamat" name="alamat"
                                                        placeholder="Alamat" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_ktp">No KTP</label>
                                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_hp">No HP</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                        required>
                                                </div>
                                                <button type="submit" class="btn edit-btn">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->


                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No KTP</th>
                                    <th>No Hp</th>
                                    <th>No Rekamedis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- TAMPILKAN DATA PASIEN DI SINI -->
                                <?php
                            require 'config/koneksi.php';
                            $no = 1;
                            $query = "SELECT * FROM pasien";
                            $result = mysqli_query($mysqli, $query);

                            while ($data = mysqli_fetch_assoc($result)) {
                                # code...  
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['alamat'] ?></td>
                                    <td><?php echo $data['no_ktp'] ?></td>
                                    <td><?php echo $data['no_hp'] ?></td>
                                    <td><?php echo $data['no_rm'] ?></td>
                                    <td>
                                        <button type='button' class='btn btn-sm edit-btn'
                                            data-toggle="modal"
                                            data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                        <button type='button' class='btn btn-sm btn-danger' data-toggle="modal"
                                            data-target="#hapusModal<?php echo $data['id'] ?>">Hapus</button>
                                    </td>
                                    <!-- Modal Edit Data Pasien -->
                                    <div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModalLabel">Edit Data Pasien</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form edit data pasien disini -->
                                                    <form action="pages/pasien/updatePasien.php" method="post">
                                                        <input type="hidden" class="form-control" id="id" name="id"
                                                            value="<?php echo $data['id'] ?>" required>
                                                        <div class="form-group">
                                                            <label for="nama">Nama Pasien</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                name="nama" value="<?php echo $data['nama'] ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea class="form-control" rows="3" id="alamat"
                                                                name="alamat" placeholder="Alamat"
                                                                required><?php echo $data['alamat'] ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_ktp">No KTP</label>
                                                            <input type="text" class="form-control" id="no_ktp"
                                                                name="no_ktp" value="<?php echo $data['no_ktp'] ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_hp">No HP</label>
                                                            <input type="text" class="form-control" id="no_hp"
                                                                name="no_hp" value="<?php echo $data['no_hp'] ?>"
                                                                required>
                                                        </div>
                                                        <button type="submit" class="btn edit-btn">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus Data Obat -->
                                    <div class="modal fade" id="hapusModal<?php echo $data['id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModalLabel">Hapus Data Pasien</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form hapus data obat disini -->
                                                    <form action="pages/pasien/hapusPasien.php" method="post">
                                                        <input type="hidden" class="form-control" id="id" name="id"
                                                            value="<?php echo $data['id'] ?>" required>
                                                        <p>Apakah anda yakin untuk menghapus data pasien? <span
                                                                class="font-weight-bold"><?php echo $data['nama'] ?></span>
                                                        </p>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->