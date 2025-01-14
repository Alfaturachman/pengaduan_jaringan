<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load Admin_model
        $this->load->model('Admin_model', 'model');

        // Check if user is logged out or role does not match
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 1) {
            redirect('');
        }

        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function pengguna()
    {
        // siapkan data
        $data = [
            'judul' => 'Kelola Pengguna',
            'user' => $this->user,
            'pengguna' => $this->model->getPengguna()
        ];

        // load view
        $this->templating->load('admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('pass1', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|matches[pass1]');

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Tambah Pengguna',
                'user' => $this->user
            ];

            $this->templating->load('admin/tambah', $data);
        } else {
            // Ambil data dari form
            $data = [
                'nama_instansi' => $this->input->post('nama_instansi'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
                'role_id' => 3,
            ];

            // Insert ke database
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg', 'Pengguna baru berhasil ditambahkan!');
            redirect('data-pengguna');
        }
    }

    public function hapus_pengguna()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->db->where('instansi_id', $id);
        $this->db->delete('pengaduan');
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('data-pengguna');
    }
}
