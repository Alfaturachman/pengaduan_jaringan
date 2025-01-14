<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        // Data pengaduan
        $data['data_series'] = [
            'Pengaduan Masuk' => [10, 20, 15, 30, 25, 18, 22, 27, 29, 35, 40, 50],
            'Pengaduan Selesai' => [5, 12, 10, 18, 20, 15, 17, 20, 25, 30, 33, 40],
        ];

        // Memuat view "beranda" dan mengirimkan data
        $this->load->view('beranda', $data);
    }
}
