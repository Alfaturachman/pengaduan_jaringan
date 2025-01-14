<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'model');
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function read_data()
    {
        is_admin();
        $data = [
            'judul' => 'Daftar Pengaduan',
            'user' => $this->user,
            'data' => $this->model->getData()
        ];
        $this->templating->load('user/pengaduan', $data);
    }

    public function ubah_data()
    {
        if (isset($_POST['ubah-data'])) {
            $this->model->ubah_data();
        } else {
            redirect('auth/notfound');
        }
    }

    public function tambah_data()
    {
        is_admin();

        // Mendapatkan data user berdasarkan ID dari session
        $id = $this->session->userdata('id_user');
        $user_data = $this->model->get_user_by_id($id);

        do {
            $id_pelanggan = substr(str_shuffle("0123456789"), 0, 12);
        } while ($this->model->is_id_pelanggan_exist($id_pelanggan));

        $data = [
            'judul' => 'Tambah Pengaduan',
            'user' => $user_data,
            'alamat' => $user_data['alamat'],
            'no_hp' => $user_data['no_hp'],
            'id_pelanggan' => $id_pelanggan
        ];

        $this->templating->load('user/tambah', $data);
    }

    public function tambah_data_aksi()
    {
        if ($this->input->is_ajax_request() == true) {
            log_message('info', 'Memulai validasi tambah_data_aksi.');

            $this->form_validation->set_rules('judul_pengaduan', 'Judul pengaduan', 'required|max_length[255]');
            $this->form_validation->set_rules('isi_pengaduan', 'Isi pengaduan', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[255]');
            $this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required|numeric|max_length[20]');

            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run() == false) {
                $errors = [
                    'judul_pengaduan' => form_error('judul_pengaduan'),
                    'isi_pengaduan' => form_error('isi_pengaduan'),
                    'alamat' => form_error('alamat'),
                    'no_hp' => form_error('no_hp'),
                ];

                log_message('error', 'Validasi gagal: ' . json_encode($errors));

                $data = [
                    'status' => false,
                    'errors' => $errors
                ];
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                log_message('info', 'Validasi berhasil, melanjutkan ke penyimpanan data.');
                log_message('info', 'id_pelanggan: ' . $this->input->post('id_pelanggan'));

                $pengaduan_data = [
                    'id_pelanggan' => $this->input->post('id_pelanggan'),
                    'judul_pengaduan' => $this->input->post('judul_pengaduan'),
                    'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                    'alamat_pengaduan' => $this->input->post('alamat'),
                    'no_telp_pengaduan' => $this->input->post('no_hp'),
                    'tgl_pengaduan' => date('Y-m-d H:i:s'),
                    'status_pengaduan' => 0, // Status default saat ditambahkan
                ];

                if ($this->model->tambah_data($pengaduan_data)) {
                    log_message('info', 'Data pengaduan berhasil disimpan: ' . json_encode($pengaduan_data));
                } else {
                    log_message('error', 'Gagal menyimpan data pengaduan.');
                }

                $data['status'] = true;
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            log_message('error', 'Akses tidak valid pada tambah_data_aksi.');
            redirect('tambah-pengaduan');
        }
    }

    public function ubah_password()
    {
        $data = [
            'user' => $this->user,
            'judul' => 'Ubah Password'
        ];

        $this->form_validation->set_rules('password', 'Password Lama', 'required');
        $this->form_validation->set_rules('newpass', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('newpass2', 'Konfirmasi Password', 'required|matches[newpass]');

        if ($this->form_validation->run() == false) {
            $this->templating->load('user/ubah-password', $data);
        } else {
            $this->model->ubah_password();
        }
    }
}
