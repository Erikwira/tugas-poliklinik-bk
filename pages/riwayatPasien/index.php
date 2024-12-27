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
        padding: 25px;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .card-header .card-title{
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

    .table thead tr{
        background: var(--bg-1);
        color: var(--color-text);
    }

    .table tbody tr{
        background: #fff;
        color: var(--bg-1);
    }

    .table tbody tr:hover {
        background: var(--bg-2);
        color: var(--color-text);
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

    .modal-body .card-body table thead tr{
        background: var(--bg-1);
        color: var(--color-text);
    }

    .modal-body .card-body table tbody tr{
        background: #fff;
        color: var(--bg-1);
    }
    .modal-body .card-body table tbody tr:hover{
        background: var(--bg-2);
        color: var(--color-text);
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Riwayat Pasien</h1>
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
                        <h3 class="card-title">Daftar Riwayat Pasien</h3>
                    </div>
                    <!-- /.card-header -->


                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No. KTP</th>
                                    <th>No. Telepon</th>
                                    <th>No. RM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                require 'config/koneksi.php';
                                $query = "SELECT daftar_poli.status_periksa, periksa.id, pasien.alamat, pasien.id as idPasien, pasien.no_ktp, pasien.no_hp, pasien.no_rm, periksa.tgl_periksa, pasien.nama as namaPasien, dokter.nama, daftar_poli.keluhan, periksa.catatan, GROUP_CONCAT(obat.nama_obat) as namaObat, SUM(obat.harga) AS hargaObat FROM detail_periksa INNER JOIN periksa ON detail_periksa.id_periksa = periksa.id INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id INNER JOIN obat ON detail_periksa.id_obat = obat.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = '$id_dokter' AND status_periksa = '1' GROUP BY pasien.id";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                    # code...
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['namaPasien']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['no_ktp']; ?></td>
                                    <td><?php echo $data['no_hp']; ?></td>
                                    <td><?php echo $data['no_rm']; ?></td>
                                    <td>
                                        <button type='button' class='btn btn-sm edit-btn' data-toggle="modal"
                                            data-target="#detailModal<?php echo $data['id'] ?>">Detail
                                            Riwayat Periksa</button>

                                        <div class="modal fade" id="detailModal<?php echo $data['id'] ?>">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Riwayat
                                                            <?php echo $data['namaPasien'] ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body table-responsive p-0">
                                                            <table class="table text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <td>No</td>
                                                                        <td>Tanggal Periksa</td>
                                                                        <td>Nama Pasien</td>
                                                                        <td>Nama Dokter</td>
                                                                        <td>Keluhan</td>
                                                                        <td>Obat</td>
                                                                        <td>Biaya</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $idPasien = $data['idPasien'];
                                                                        $nomor = 1;
                                                                        require 'config/koneksi.php';
                                                                        $ambilData = "SELECT detail_periksa.id as idDetailPeriksa, periksa.tgl_periksa, pasien.nama as namaPasien, dokter.nama, daftar_poli.keluhan, periksa.catatan,
                                                                                    GROUP_CONCAT(obat.nama_obat) as namaObat,
                                                                                    periksa.biaya_periksa AS hargaObat 
                                                                                    FROM detail_periksa 
                                                                                    INNER JOIN periksa ON detail_periksa.id_periksa = periksa.id 
                                                                                    INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id 
                                                                                    INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id 
                                                                                    INNER JOIN obat ON detail_periksa.id_obat = obat.id 
                                                                                    INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
                                                                                    INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
                                                                                    WHERE dokter.id = '$id_dokter' AND pasien.id = '$idPasien' 
                                                                                    GROUP BY pasien.id, periksa.tgl_periksa";
                                                                        $results = mysqli_query($mysqli, $ambilData);
                                                                        while ($datas = mysqli_fetch_assoc($results)) {
                                                                            # code...
                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $nomor++; ?></td>
                                                                        <td><?php echo $datas['tgl_periksa'] ?></td>
                                                                        <td><?php echo $datas['namaPasien'] ?></td>
                                                                        <td><?php echo $datas['nama'] ?></td>
                                                                        <td style="white-space: pre-line;"><?php echo $datas['keluhan'] ?></td>
                                                                        <td style="white-space: pre-line;"><?php echo $datas['namaObat'] ?></td>
                                                                        <td><?php echo $datas['hargaObat'] ?></td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-default edit-btn"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
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