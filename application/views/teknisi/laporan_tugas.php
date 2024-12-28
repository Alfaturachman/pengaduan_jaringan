<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card">
        <div class="card-header">Laporan Tugas</div>
        <div class="card-body">
            <?php if (!empty($laporan)) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengaduan</th>
                        <th>Isi Pengaduan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $key => $l) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $l['judul_pengaduan']; ?></td>
                        <td><?= $l['isi_pengaduan']; ?></td>
                        <td><?= $l['tgl_pengaduan']; ?></td>
                        <td><?= $l['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else : ?>
            <p>Tidak ada laporan ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>