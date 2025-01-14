<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getPengguna()
    {
        $this->db->where('role_id !=', 1); // Kondisi untuk mengecualikan role_id = 1
        return $this->db->get('user')->result_array(); // Eksekusi query dan kembalikan hasil sebagai array
    }


    public function tambah_pengguna()
    {
        // tangkap data dan encrypt password
        $password = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
        $data = [
            'nama_instansi' => htmlspecialchars($this->input->post('nama_instansi', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => $password,
            'role_id' => 2
        ];

        // insert data ke database
        $this->db->insert('user', $data);
        // set session
        $this->session->set_flashdata('msg', 'ditambahkan.');
        // kembalikan ke halaman pengguna
        redirect('data-pengguna');
    }
}