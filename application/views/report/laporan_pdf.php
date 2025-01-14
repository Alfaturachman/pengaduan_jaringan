<style>
body {
    font-family: Arial, sans-serif;
    margin: 1cm;
}

header {
    text-align: center;
    margin-bottom: 20px;
}

header img {
    width: 80px;
    height: 80px;
    display: block;
    margin: 0 auto;
}

header .kop-surat {
    text-align: center;
    font-size: 12px;
    line-height: 1.5;
}

header .kop-surat h1 {
    margin: 5px 0;
    font-size: 18px;
}

header .kop-surat p {
    margin: 0;
    font-size: 12px;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

table {
    border-collapse: collapse;
    width: 100%;
    padding: 4px;
    text-align: center;
    page-break-inside: avoid;
}

table,
th,
td {
    border: 1px solid black;
}

.cetak {
    margin-bottom: 10px;
    font-size: 12px;
    text-align: left;
}
</style>

<body>

    <!-- Kop Surat -->
    <header>
        <img src="<?= base_url('assets/img/login.svg'); ?>">
        <div class="kop-surat">
            <h1>PLN Iconnet Semarang</h1>
            <p>Jl. Setia Budi No.96, Srondol Kulon, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50263</p>
            <p>Telp: (024) 7620576 | Email: cc.iconnet@iconpln.co.id</p>
        </div>
    </header>

    <h2>Daftar Laporan Keluhan</h2>

    <div class="cetak">
        Tanggal dicetak: <?= date('d/m/Y'); ?>
    </div>

    <table>
        <tr>
            <th style="width: 6%">No.</th>
            <th style="width: 20%">Judul</th>
            <th style="width: 40%">Isi Keluhan</th>
            <th style="width: 14%">Tanggal</th>
            <th style="width: 20%">Nama Pelanggan</th>
        </tr>

        <?php if (!empty($data)) : ?>
        <?php foreach ($data as $num => $row) : ?>
        <tr>
            <td style="width: 6%"><?= $num+1 ?></td>
            <td style="width: 20%"><?= $row['judul_pengaduan']; ?></td>
            <td style="width: 40%"><?= $row['isi_pengaduan']; ?></td>
            <td style="width: 14%"><?= $row['tgl_pengaduan']; ?></td>
            <td style="width: 20%"><?= $row['nama_instansi']; ?></td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
            <td colspan="5" style="text-align: center;">Tidak ada data!</td>
        </tr>
        <?php endif; ?>
    </table>

</body>