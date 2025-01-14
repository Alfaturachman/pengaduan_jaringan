<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
    body {
        font-family: Arial, sans-serif;
        background: #FDF7F4;
    }

    .hero {
        position: relative;
        background: url('https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/01/2023/07/18/IMG-20230717-WA0024-3668894057.jpg') no-repeat center center/cover;
        height: 100vh;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .content-section {
        margin-bottom: 50px;
    }

    .image-content img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .content-section p {
        text-align: justify;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: left;
        margin-left: 5%;
    }

    .hero-content h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .hero-content p {
        font-size: 1.2rem;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">

            <img src="<?= base_url(); ?>/assets/img/logo_depan.png" width="135px" height="75px">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link scrollto" href="#hero">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link scrollto" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link scrollto" href="#portofolio">Fasilitas</a></li>
                    <li class="nav-item"><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Selamat Datang di <span>Aplikasi Keluhan WiFi</span></h1>
            <p>PLN Iconnet Semarang.</p>
            <a href="<?= base_url('auth/index'); ?>" class="btn btn-primary btn-lg">Login</a>
            <a href="https://www.youtube.com/watch?v=wFhCgW_gzRE" target="_blank"
                class="btn btn-outline-light btn-lg">Lihat Video Profil</a>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- Tentang Kami -->
        <div class="container py-5" id="tentang">
            <div class="section-title">
                <h1 class="text-primary">Tentang Kami</h1>
            </div>

            <!-- First Section -->
            <div class="row content-section align-items-center">
                <div class="col-md-6">
                    <p>Kehadiran PLN Icon Plus sebagai Anak Perusahaan PT PLN (Persero) mengemban misi untuk memenuhi
                        kebutuhan
                        dan harapan Pemangku Kepentingan dalam penyediaan solusi teknologi informasi dan komunikasi
                        (TIK).
                        Hal ini tidak hanya terbatas pada penyediaan layanan yang handal bagi pelanggan, tetapi juga
                        pada
                        kontribusi aktif perusahaan bagi perkembangan telekomunikasi nasional. Dalam mewujudkan misi
                        tersebut, PLN Icon Plus secara proaktif melakukan peningkatan kapasitas dan perluasan jaringan
                        sehingga dapat memperluas jangkauan pelayanan perusahaan.
                    </p>
                </div>
                <div class="col-md-6 image-content">
                    <img src="<?= base_url(); ?>/assets/img/pict-satu.jpg" alt="PLN Icon Plus Image">
                </div>
            </div>

            <!-- Second Section -->
            <div class="row content-section align-items-center">
                <div class="col-md-6 image-content">
                    <img src="<?= base_url(); ?>/assets/img/pict-dua.jpg" alt="PLN Icon Plus Transformation">
                </div>
                <div class="col-md-6">
                    <p>Transformasi PLN Icon Plus dari penyedia jaringan komunikasi menjadi penyedia solusi ICT
                        merupakan
                        langkah yang diambil untuk menjawab tantangan era globalisasi saat ini, dan menjadi jawaban atas
                        semua permasalahan ICT bagi industri yang membutuhkan konektivitas dan solusi ICT yang handal di
                        seluruh pelosok Nusantara. Komitmen PLN Icon Plus ini didukung oleh jaringan full fiber optic
                        dengan
                        memanfaatkan aset strategis PLN (ROW) serta sumber daya manusia yang sangat kompeten di
                        bidangnya,
                        menjadikan PLN Icon Plus sebagai penyedia ICT yang terpercaya.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Tentang Kami -->

        <!-- Fasilitas Section -->
        <section id="portofolio" class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="text-primary">Fasilitas Paket Layanan WiFi</h2>
                    <p class="text-muted">Kami menyediakan paket internet untuk mendukung kenyamanan dan kelancaran
                        anda.
                    </p>
                </div>
                <div class="row">
                    <!-- Paket Iconnet 10 -->
                    <div class="col-md-3 mb-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">ICONNET 10</h5>
                                <p class="card-text">Full Fiber To The Home</p>
                                <p class="text-primary font-weight-bold">Up to 10 Mbps</p>
                                <p>Download/Upload</p>
                                <p>Unlimited Quota</p>
                                <h4 class="text-success">Rp 185.000/bulan</h4>
                                <p class="text-muted">*harga belum termasuk pajak</p>
                                <!-- <a href="#" class="btn btn-primary btn-block">Pesan Sekarang</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Paket Iconnet 20 -->
                    <div class="col-md-3 mb-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">ICONNET 20</h5>
                                <p class="card-text">Full Fiber To The Home</p>
                                <p class="text-primary font-weight-bold">Up to 20 Mbps</p>
                                <p>Download/Upload</p>
                                <p>Unlimited Quota</p>
                                <h4 class="text-success">Rp 207.000/bulan</h4>
                                <p class="text-muted">*harga belum termasuk pajak</p>
                                <!-- <a href="#" class="btn btn-primary btn-block">Pesan Sekarang</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Paket Iconnet 50 -->
                    <div class="col-md-3 mb-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">ICONNET 50</h5>
                                <p class="card-text">Full Fiber To The Home</p>
                                <p class="text-primary font-weight-bold">Up to 50 Mbps</p>
                                <p>Download/Upload</p>
                                <p>Unlimited Quota</p>
                                <h4 class="text-success">Rp 297.000/bulan</h4>
                                <p class="text-muted">*harga belum termasuk pajak</p>
                                <!-- <a href="#" class="btn btn-primary btn-block">Pesan Sekarang</a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Paket Iconnet 100 -->
                    <div class="col-md-3 mb-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">ICONNET 100</h5>
                                <p class="card-text">Full Fiber To The Home</p>
                                <p class="text-primary font-weight-bold">Up to 100 Mbps</p>
                                <p>Download/Upload</p>
                                <p>Unlimited Quota</p>
                                <h4 class="text-success">Rp 427.000/bulan</h4>
                                <p class="text-muted">*harga belum termasuk pajak</p>
                                <!-- <a href="#" class="btn btn-primary btn-block">Pesan Sekarang</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End OF Section -->


        <!-- Contact Section -->
        <section id="kontak" class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="text-primary">Kontak Kami</h2>
                </div>
                <div class="row text-center">
                    <!-- Alamat -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Alamat</h5>
                                <p class="card-text">Jl. Setia Budi No.96, Kota Semarang</p>
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Email Kami</h5>
                                <p class="card-text">cc.iconnet@iconpln.co.id</p>
                            </div>
                        </div>
                    </div>
                    <!-- Telepon -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-phone fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Hubungi Kami</h5>
                                <p class="card-text">(024)7620576</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.651503253977!2d110.41639917475825!3d-7.050173992952067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708bfb93576d07%3A0xbaebedb699fe0932!2sPLN%20Icon%20Plus%20SBU%20Regional%20Jawa%20Bagian%20Tengah!5e0!3m2!1sid!2sid!4v1734704069883!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- Footer -->
        <footer class="bg-light py-4 mt-5">
            <div class="container">
                <div class="row">
                    <!-- Logo dan Informasi Kontak -->
                    <div class="col-md-4 text-center text-md-left mb-4 mb-md-0">
                        <!-- <img src="<?= base_url(); ?>/assets/img/logo_depan.png" class="mb-3" style="width: 100px;"> -->
                        <p>Jl. Setia Budi No.96, Kota Semarang</p>
                        <p><strong>Telepon:</strong> (024)7620576</p>
                        <p><strong>Email:</strong> cc.iconnet@iconpln.co.id</p>
                    </div>

                    <!-- Useful Links -->
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <h5 class="font-weight-bold">Useful Links</h5>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero" class="text-dark">Beranda</a></li>
                            <li><a href="#portofolio" class="text-dark">Fasilitas</a></li>
                            <li><a href="#tim" class="text-dark">Team</a></li>
                            <li><a href="#kontak" class="text-dark">Kontak</a></li>
                        </ul>
                    </div>

                    <!-- Social Media -->
                    <div class="col-md-4 text-center">
                        <h5 class="font-weight-bold">Social Media Kami</h5>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/iconnet.plniconplus/" target="_blank"
                            class="btn btn-outline-dark mx-1" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/iconnetindonesia.id/" target="_blank"
                            class="btn btn-outline-dark mx-1" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <!-- Twitter -->
                        <a href="https://api.whatsapp.com/send?phone=6281112002123" target="_blank"
                            class="btn btn-outline-dark mx-1" title="Twitter">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Footer -->
        <footer class="text-center bg-light text-dark py-4">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Universitas Dian Nuswantoro - <?= date('Y'); ?></span>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>