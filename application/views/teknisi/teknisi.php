<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <!-- Tabel Daftar Tugas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tugas Anda</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($tugas)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Pengaduan</th>
                            <th>Isi Pengaduan</th>
                            <th>Alamat</th>
                            <th>Tanggal Pengaduan</th>
                            <th>No Hp Pengaduan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tugas as $i => $row) : ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= htmlspecialchars($row['judul_pengaduan']); ?></td>
                            <td><?= htmlspecialchars($row['isi_pengaduan']); ?></td>
                            <td><?= htmlspecialchars($row['alamat_pengaduan']); ?></td>
                            <td>
                                <?= date('d M Y', strtotime($row['tgl_pengaduan'])); ?>
                            </td>
                            <td><?= htmlspecialchars($row['no_telp_pengaduan']); ?></td>
                            <td>
                                <span
                                    class="badge <?= $row['status_pengaduan'] == 0 ? 'badge-warning' : ($row['status_pengaduan'] == 1 ? 'badge-info' : ($row['status_pengaduan'] == 2 ? 'badge-success' : 'badge-danger')) ?>">
                                    <?= $row['status_pengaduan'] == 0 ? 'Antrian' : ($row['status_pengaduan'] == 1 ? 'Proses' : ($row['status_pengaduan'] == 2 ? 'Selesai' : 'Batal')) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($row['status_pengaduan'] != 2) : ?>
                                <a class="btn btn-sm btn-primary" href="#" data-toggle="modal"
                                    data-target="#detail-pengaduan" data-id="<?= $row['id']; ?>"
                                    data-tanggal="<?= date('d M Y', strtotime($row['tgl_pengaduan'])); ?>"
                                    data-pelanggan="<?= htmlspecialchars($row['nama_instansi']); ?>"
                                    data-isi="<?= htmlspecialchars($row['isi_pengaduan']); ?>"
                                    data-alamat="<?= htmlspecialchars($row['alamat_pengaduan']); ?>"
                                    data-no_telp="<?= htmlspecialchars($row['no_telp_pengaduan']); ?>"
                                    data-status="<?= $row['status_pengaduan']; ?>">Detail</a>
                                <?php else : ?>
                                <button class="btn btn-sm btn-secondary" disabled>Selesai</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else : ?>
            <p class="text-center">Belum ada tugas yang tersedia untuk Anda.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal Box - Detail Pengaduan -->
<div class="modal fade" id="detail-pengaduan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Detail Data Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('teknisi/ubah_status'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_pengaduan">
                    <table class="table table-bordered text-justify text-gray-900">
                        <tr>
                            <td>Tanggal</td>
                            <td id="tgl"></td>
                        </tr>
                        <tr>
                            <td>Pelanggan</td>
                            <td id="instansi"></td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td id="isi"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td id="status"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td id="alamat"></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td id="no_telp"></td>
                        </tr>
                        <tr>
                            <td>Ubah Status</td>
                            <td>
                                <select name="status_pengaduan" id="status_select" class="form-control" required>
                                    <option value=""> -- PILIH STATUS TERBARU -- </option>
                                    <option value="0">Antrian</option>
                                    <option value="1">Proses</option>
                                    <option value="2">Selesai</option>
                                    <option value="3">Batal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><textarea name="keterangan" class="form-control" rows="3"
                                    placeholder="Masukkan keterangan tambahan (jika ada)"></textarea></td>
                        </tr>
                        <tr>
                            <td>Upload File</td>
                            <td>
                                <input type="file" name="file_pengaduan" class="form-control" id="file_input"
                                    onchange="previewFile()">
                                <div id="file_review" style="margin-top: 10px;">
                                    <!-- Preview akan muncul di sini -->
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah Status Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#detail-pengaduan').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button yang memicu modal
    var id = button.data('id');
    var tanggal = button.data('tanggal');
    var pelanggan = button.data('pelanggan');
    var isi = button.data('isi');
    var status = button.data('status');
    var alamat = button.data('alamat');
    var noTelp = button.data('no_telp'); // Ambil data-no_telp

    var modal = $(this);
    modal.find('#id_pengaduan').val(id);
    modal.find('#tgl').text(tanggal);
    modal.find('#instansi').text(pelanggan);
    modal.find('#isi').text(isi);
    modal.find('#status').text(status == 0 ? 'Antrian' : (status == 1 ? 'Proses' : (status == 2 ? 'Selesai' :
        'Batal')));
    modal.find('#alamat').text(alamat); // Menampilkan alamat
    modal.find('#no_telp').text(noTelp); // Menampilkan nomor telepon
    modal.find('#status_select').val(status); // Set status saat ini di dropdown
});

// Fungsi untuk mem-preview file yang di-upload
function previewFile() {
    var file = document.querySelector('#file_input').files[0];
    var preview = document.querySelector('#file_review');
    var reader = new FileReader();

    if (file) {
        var fileName = file.name;
        var fileType = file.type;

        preview.innerHTML = '';

        if (fileType.startsWith('image/')) {
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                preview.appendChild(img);
            };
        } else {
            preview.textContent = 'File yang dipilih: ' + fileName;
        }

        reader.readAsDataURL(file);
    }
}

function previewFile() {
    var file = document.querySelector('#file_input').files[0];
    var preview = document.querySelector('#file_review');
    var reader = new FileReader();

    if (file) {
        var fileName = file.name;
        var fileType = file.type;

        preview.innerHTML = '';

        if (fileType.startsWith('image/')) {
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                preview.appendChild(img);
            };
        } else {
            preview.textContent = 'File yang dipilih: ' + fileName;
        }

        reader.readAsDataURL(file);
    }
}
</script>