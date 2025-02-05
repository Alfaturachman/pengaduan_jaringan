<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'model');
    }

    public function index()
    {
        is_user();

        $teknisi = $this->model->get_teknisi();

        $data = [
            'judul' => 'Data Pengaduan',
            'teknisi' => $teknisi,
            'user' => $this->user
        ];

        $this->templating->load('menu/index', $data);
    }

    public function read_data()
    {
        // jika ada request ajax yang dikirimkan
        if ($this->input->is_ajax_request() == true) {
            // ambil data dari table
            $list = $this->model->get_datatables();
            $data = [];
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = [];

                // tombol action
                $btnAction = "<button type=\"button\" data-toggle=\"modal\" data-target=\"#detail-pengaduan\" class='btn btn-sm btn-info btn-hapus' data-id=\"$field->id\" data-tgl=\"" . date('d F Y H:i:s', strtotime($field->tgl_pengaduan)) . "\" data-instansi=\"$field->nama_instansi\" data-judul=\"$field->judul_pengaduan\" data-isi=\"$field->isi_pengaduan\" data-status=\"$field->status_pengaduan\"><i class=\"fas fa-fw fa-edit\"></i> Detail</button>
                <button type=\"button\" data-toggle=\"modal\" data-target=\"#hapus-pengaduan\" class='btn btn-sm btn-danger btn-hapus' data-id=\"$field->id\"><i class=\"fas fa-fw fa-trash-alt\"></i> Hapus</button>";

                // Menentukan status pengaduan
                $status = $field->status_pengaduan;
                $tanggalJam = date('d M Y H:i', strtotime($field->tgl_pengaduan)) . ' WIB';

                // Menambahkan data ke row
                $row[] = $no;
                $row[] = $field->id_pelanggan;  // Menampilkan ID Pelanggan
                $row[] = $tanggalJam; // Menampilkan tanggal dan jam
                $row[] = $field->nama_instansi;
                $row[] = ($status == 0 ? '<span class="badge-warning p-1 rounded-sm">antrian</span>' : ($status == 1 ? '<span class="badge-blue p-1 rounded-sm">proses</span>' : ($status == 2 ? '<span class="badge-success p-1 rounded-sm">selesai</span>' : '<span class="badge-danger p-1 rounded-sm">batal</span>')));
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
                "data" => $data,
            ];

            // output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function ubah_status()
    {
        // Cek apakah user terautentikasi
        is_user();

        // Ambil data yang dikirim dari form
        $id_pengaduan = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $daerah_semarang = $this->input->post('daerah_semarang');

        $this->form_validation->set_rules('daerah_semarang', 'Daerah Semarang', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data tidak valid.');
            redirect('data-pengaduan');
        }

        $update_data = [
            'daerah_pengaduan' => $daerah_semarang,
            'id_user' => $id_user,
        ];

        $this->model->update_pengaduan($id_pengaduan, $update_data);

        $this->session->set_flashdata('success', 'Data pengaduan berhasil diubah.');
        redirect('data-pengaduan');
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('pengaduan');
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('data-pengaduan');
    }

    public function laporan()
    {
        is_user();
        $data = [
            'judul' => 'Cetak Laporan',
            'user' => $this->user,
            'instansi' => $this->model->getNamaInstansi()
        ];

        $this->templating->load('report/index', $data);
    }

    public function cetak_laporan()
    {
        // cek, fitur ini hanya bisa diakses oleh admin
        is_user();

        // jika user melalui button pengecekan
        if (isset($_POST['btn-cek'])) {
            // tangkap data
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $filter = $this->input->post('filter');

            // prepare data for view
            $data = [
                'judul' => 'Cetak Laporan',
                'user' => $this->user,
                'instansi' => $this->model->getNamaInstansi(),
                'data' => $this->model->getPengaduanByDate($mulai, $selesai, $filter)
            ];

            // load view
            $this->templating->load('report/index', $data);
            // jika melalui button export pdf
        } else if (isset($_POST['cetak-pdf'])) {
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $filter = $this->input->post('filter');

            // load library DOMPDF
            $this->load->library('dompdf_gen');

            // prepare data
            $data = [
                'data' => $this->model->getPengaduanByDate($mulai, $selesai, $filter)
            ];

            $this->load->view('report/laporan_pdf', $data);

            // konfigurasi dompdf
            $paper_size = 'A4';
            $orientation = 'portrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan Pengaduan Jaringan.pdf', ['Attachment' => true]); // false atau 0 untuk preview sebelum download

            exit;
            // jika melalui url biasa, kembalikan
        } else {
            redirect('laporan-pengaduan');
        }
    }
}
