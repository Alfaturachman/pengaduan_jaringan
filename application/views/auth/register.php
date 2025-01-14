<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $judul; ?>
    </title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-primary d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register Akun</h2>
                        <?php if ($this->session->flashdata('message')) : ?>
                            <?= $this->session->flashdata('message'); ?>
                        <?php endif; ?>
                        <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                            <div class="form-group">
                                <label for="nama_instansi">Nama</label>
                                <input type="text" name="nama_instansi" id="nama_instansi"
                                    class="form-control <?= form_error('nama_instansi') ? 'is-invalid' : 'border-left-primary' ?>"
                                    value="<?= set_value('nama_instansi'); ?>" placeholder="Nama">
                                <div class="invalid-feedback">
                                    <?= form_error('nama_instansi'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email"
                                    class="form-control <?= form_error('email') ? 'is-invalid' : 'border-left-primary' ?>"
                                    value="<?= set_value('email'); ?>" placeholder="Email">
                                <div class="invalid-feedback">
                                    <?= form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="1"
                                    class="form-control <?= form_error('alamat') ? 'is-invalid' : 'border-left-primary' ?>"
                                    placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('alamat') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control <?= form_error('username') ? 'is-invalid' : 'border-left-primary' ?>"
                                    value="<?= set_value('username'); ?>" placeholder="Masukkan username">
                                <div class="invalid-feedback">
                                    <?= form_error('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pass1" id="password"
                                    class="form-control <?= form_error('pass1') ? 'is-invalid' : 'border-left-primary' ?>"
                                    placeholder="Kata sandi" value="<?= set_value('pass1'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('pass1'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi-password">Konfirmasi Password</label>
                                <input type="password" name="pass2" id="konfirmasi-password"
                                    class="form-control <?= form_error('pass2') ? 'is-invalid' : 'border-left-primary' ?>"
                                    placeholder="Ulangi kata sandi">
                                <div class="invalid-feedback">
                                    <?= form_error('pass2'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </form>
                        <div class="text-center mt-3">
                            Sudah punya akun? <a href="<?= base_url('auth/index'); ?>">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>