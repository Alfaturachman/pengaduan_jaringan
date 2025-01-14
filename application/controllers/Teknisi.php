<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Teknisi_model', 'model');
        $this->load->model('Menu_model', 'model_menu');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 3) {
            redirect('');
        }

        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    // Teknisi: Daftar Tugas
    public function daftar_tugas()
    {
        is_teknisi();
        $data = [
            'judul' => 'Daftar Tugas Teknisi',
            'user' => $this->user,
            'tugas' => $this->model->getTugasTeknisi()
        ];

        $this->templating->load('teknisi/teknisi', $data); // Load view dengan data tugas
    }

    public function ubah_status()
    {
        $this->model_menu->ubahStatusPengaduan();

        redirect('daftar_tugas');
    }

    // Teknisi: Update Status Tugas
    public function update_status_tugas()
    {
        is_teknisi(); // Middleware untuk memeriksa apakah user adalah teknisi

        $id_tugas = $this->input->post('id_tugas');
        $status = $this->input->post('status');

        // Validasi data yang dikirim
        if (!$id_tugas || !$status) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak lengkap!</div>');
            redirect('teknisi/daftar_tugas');
        }

        // Update status tugas
        $result = $this->model->updateStatusTugas($id_tugas, $status);

        // Feedback ke user berdasarkan hasil update
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status tugas berhasil diperbarui!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui status tugas.</div>');
        }

        redirect('daftar_tugas');
    }

    public function status_tugas()
    {
        is_teknisi(); // Middleware untuk memeriksa apakah user adalah teknisi
        $data = [
            'judul' => 'Status Tugas Teknisi',
            'user' => $this->user,
            'tugas' => $this->model->getTugasTeknisi($this->user['id']) // Mendapatkan tugas teknisi
        ];

        $this->templating->load('teknisi/status_tugas', $data); // Load view status_tugas
    }

    public function laporan_tugas()
    {
        is_teknisi(); // Middleware untuk memeriksa apakah user adalah teknisi
        $data = [
            'judul' => 'Laporan Tugas Teknisi',
            'user' => $this->user,
            'laporan' => $this->model->getTugasTeknisi($this->user['id']) // Bisa disesuaikan jika laporan memiliki format berbeda
        ];

        $this->templating->load('teknisi/laporan_tugas', $data); // Load view laporan_tugas
    }
}