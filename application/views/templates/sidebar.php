<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #007bff;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-wifi"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Keluhan Jaringan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <?php if (isset($user) && $user['role_id'] == 1) : ?>
    <!-- Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data-pengguna'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Pengguna</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data-pengaduan'); ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Daftar Keluhan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan-pengaduan'); ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Cetak Laporan</span>
        </a>
    </li>

    <?php elseif (isset($user) && $user['role_id'] == 3) : ?>
    <!-- Teknisi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('daftar_tugas'); ?>">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Daftar Tugas</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('status_tugas'); ?>">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Status Tugas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan_tugas'); ?>">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan Tugas</span>
        </a>
    </li> -->

    <?php elseif (isset($user)) : ?>
    <!-- User -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('daftar-pengaduan'); ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Daftar Keluhan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tambah-pengaduan'); ?>">
            <i class="fas fa-fw fa-plus"></i>
            <span>Tambah Keluhan</span>
        </a>
    </li>
    <?php endif; ?>

    <!-- Ubah Password -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('ubah-password'); ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span>
        </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title" id="logoutModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Klik "Keluar" jika ingin mengakhiri sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>