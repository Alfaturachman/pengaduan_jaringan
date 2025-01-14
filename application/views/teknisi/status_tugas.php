<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card">
        <div class="card-header">Daftar Status Tugas</div>
        <div class="card-body">
            <?php if (!empty($tugas)) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengaduan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tugas as $key => $t) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $t['judul_pengaduan']; ?></td>
                        <td><?= $t['status']; ?></td>
                        <td>
                            <a href="<?= base_url('teknisi/update_status_tugas/' . $t['id']); ?>"
                                class="btn btn-sm btn-primary">Ubah Status</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else : ?>
            <p>Tidak ada tugas ditemukan.</p>
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