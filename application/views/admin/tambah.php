<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>
            <h1 class="h3 my-1 text-gray-800"><i class="fa fa-fw fa-users"></i> <?= $judul; ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/tambah_pengguna') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama_instansi">Nama Instansi</label>
                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= set_value('nama_instansi') ?>" required>
                            <?= form_error('nama_instansi', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" required>
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" required><?= set_value('alamat') ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" required>
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="pass1">Password</label>
                            <input type="password" class="form-control" id="pass1" name="pass1" required>
                            <?= form_error('pass1', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="pass2">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="pass2" name="pass2" required>
                            <?= form_error('pass2', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Universitas Dian Nuswantoro Semarang - <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Modal Hapus Data Pengguna -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Hapus <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/hapus_pengguna'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {
        /*
            saat user klik tombol hapus dengan id (#hapus-pengguna),
            isi value dari field yang memiliki class (modal-body) id (id),
            dengan value dari attribute data-id
        */
        $(document).on("click", "#hapus-pengguna", function() {
            $(".modal-body #id").val($(this).data('id'));
        });
    });
</script>

</body>

</html>