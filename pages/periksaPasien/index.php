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

    .card{
        position: relative;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card .card-body{
        border-radius: 5px;
    }

    thead{
        background: var(--bg-1);
    }
    thead tr th{
        color: var(--color-text);
        font-weight: 300;
    }
    tbody tr{
        background: #fff;
        color: var(--bg-1);
    }
    tbody tr:hover{
        background: var(--bg-2);
        color: var(--color-text);
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

    .form-group .form-control, .form-group .select2{
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
                <h1 class="m-0">Daftar Periksa Pasien</h1>
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
                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    require 'config/koneksi.php';
                                    $query = "SELECT pasien.nama, daftar_poli.keluhan, daftar_poli.status_periksa, daftar_poli.id FROM daftar_poli INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = '$id_dokter'";
                                    $result = mysqli_query($mysqli,$query);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                        # code...
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['keluhan']; ?></td>
                                    <td>
                                        <?php if ($data['status_periksa']==1) {
                                        ?>
                                        <button type='button' class='btn btn-sm edit-btn'
                                            data-toggle="modal"
                                            data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                            <div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Edit Periksa Pasien</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form tambah data obat disini -->

                                                        <?php
                                                            $idDaftarPoli = $data['id'];
                                                            require 'config/koneksi.php';
                                                            $ambilDataPeriksa = mysqli_query($mysqli,"SELECT * FROM periksa INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id WHERE daftar_poli.id = '$idDaftarPoli'");
                                                            $ambilData = mysqli_fetch_assoc($ambilDataPeriksa);
                                                        ?>
                                                        <form action="pages/periksaPasien/editPeriksa.php"
                                                            method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $data['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" required
                                                                    value="<?php echo $data['nama'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_periksa">Tanggal Periksa</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="tanggal_periksa" name="tanggal_periksa"
                                                                    required value="<?php echo $ambilData['tgl_periksa'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="catatan">Catatan</label>
                                                                <textarea class="form-control" rows="3" id="catatan"
                                                                    name="catatan" required><?php echo $ambilData['catatan'] ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  } else { ?>
                                        <button type='button' class='btn btn-sm btn-info edit-btn' data-toggle="modal"
                                            data-target="#periksaModal<?php echo $data['id'] ?>">Periksa</button>
                                        <div class="modal fade" id="periksaModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Periksa Pasien</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form tambah data obat disini -->
                                                        <form action="pages/periksaPasien/periksaPasien.php"
                                                            method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $data['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" required
                                                                    value="<?php echo $data['nama'] ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_periksa">Tanggal Periksa</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="tanggal_periksa" name="tanggal_periksa"
                                                                    required>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="catatan">Catatan</label>
                                                                <textarea class="form-control" rows="3" id="catatan"
                                                                    name="catatan" required></textarea>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label>Obat</label>
                                                                <select class="select2" multiple="multiple"
                                                                    data-placeholder="Pilih Obat" style="width: 100%;"
                                                                    name="obat[]">
                                                                    <?php 
                                                                        require 'config/koneksi.php';
                                                                        $getObat = "SELECT * FROM obat";
                                                                        $queryObat = mysqli_query($mysqli,$getObat);
                                                                        while ($datas = mysqli_fetch_assoc($queryObat)) {
                                                                    ?>
                                                                    <option value="<?php echo $datas['id'] ?>">
                                                                        <?php echo $datas['nama_obat'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-info edit-btn">Periksa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </td>
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
<script>
    function hitungTotal() {
        // Ambil semua elemen select dengan name "obat[]"
        var selectedObat = document.querySelectorAll('select[name="obat[]"] option:checked');
        
        var totalHarga = 150000; // Harga awal
        // Iterasi melalui obat yang dipilih dan tambahkan harga masing-masing
        selectedObat.forEach(function(option) {
            totalHarga += parseInt(option.getAttribute('data-harga')) || 0;
        });

        // Tampilkan total harga
        document.getElementById('totalHarga').innerText = 'Total Harga: ' + totalHarga;
    }
</script>