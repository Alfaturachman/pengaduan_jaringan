<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user_by_id($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function getData()
    {
        return $this->db->get_where('pengaduan', ['instansi_id' => $this->user['id']])->result_array();
    }

    public function is_id_pelanggan_exist($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get('pengaduan');
        return $query->num_rows() > 0;
    }

    public function ubah_data()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul_pengaduan', true);
        $isi = $this->input->post('isi_pengaduan', true);

        $this->db->set('judul_pengaduan', $judul);
        $this->db->set('isi_pengaduan', $isi);

        $this->db->where('id', $id);
        $query = $this->db->update('pengaduan');

        if ($this->db->affected_rows($query) > 0) {
            $this->session->set_flashdata('msg', 'diupdate.');
            redirect('daftar-pengaduan');
        } else {
            $this->session->set_flashdata('err', 'diupdate.');
            redirect('daftar-pengaduan');
        }
    }

    public function tambah_data()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'instansi_id' => $this->user['id'],
            'tgl_pengaduan' => date('Y-m-d H:i:s'),
            'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
            'judul_pengaduan' => htmlspecialchars($this->input->post('judul_pengaduan', true)),
            'isi_pengaduan' => htmlspecialchars($this->input->post('isi_pengaduan', true)),
            'alamat_pengaduan' => htmlspecialchars($this->input->post('alamat', true)),
            'no_telp_pengaduan' => htmlspecialchars($this->input->post('no_hp', true)),
            'status_pengaduan' => 0
        ];

        log_message('info', 'Insert Data: ' . json_encode($data));

        if (!$this->db->insert('pengaduan', $data)) {
            log_message('error', 'Database Error: ' . $this->db->error());
            throw new Exception('Database Error');
        }

        $this->session->set_flashdata('msg', 'submit.');
    }

    public function ubah_password()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $upass = $data['user']['password'];
        $pass = $this->input->post('password');
        $newpass = $this->input->post('newpass');

        // jika password yang di verify tidak sama dengan password user dari db
        if (!password_verify($pass, $upass)) {
            $this->session->set_flashdata('msg', 'Password Lama Salah!');
            redirect('ubah-password');
        } else {
            // jika input password lama sama dengan input password baru
            if ($newpass == $pass) {
                $this->session->set_flashdata('msg', 'Password baru tidak boleh sama dengan password lama.');
                redirect('ubah-password');
            } else {
                // jika tidak sama dengan password baru
                $pass_hash = password_hash($newpass, PASSWORD_DEFAULT);

                $this->db->set('password', $pass_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('user');

                $this->session->set_flashdata('ubahpass', '<div class="alert alert-success">Password berhasil diubah.</div>');
                redirect('ubah-password');
            }
        }
    }
}
