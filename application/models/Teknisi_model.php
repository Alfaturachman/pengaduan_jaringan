<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi_model extends CI_Model
{
    /**
     * Mendapatkan daftar tugas teknisi berdasarkan ID teknisi
     * @param int $id_teknisi
     * @return array
     */
    public function getTugasTeknisi()
    {
        $this->db->select('
        pengaduan.id, 
        pengaduan.judul_pengaduan, 
        pengaduan.isi_pengaduan, 
        pengaduan.tgl_pengaduan, 
        pengaduan.status_pengaduan,
        pengaduan.alamat_pengaduan,
        pengaduan.no_telp_pengaduan,
        user.nama_instansi
    ');
        $this->db->from('pengaduan');
        $this->db->join('user', 'pengaduan.instansi_id = user.id', 'left');
        $this->db->order_by('pengaduan.tgl_pengaduan', 'DESC');

        return $this->db->get()->result_array();
    }

    /**
     * Memperbarui status tugas teknisi
     * @param int $id_tugas
     * @param string $status
     * @return bool
     */
    public function updateStatusTugas($id_tugas, $status)
    {
        // Validasi ID tugas dan status
        if (!is_numeric($id_tugas) || empty($status)) {
            return false;
        }

        $this->db->set('status', $status);
        $this->db->where('id', $id_tugas);

        return $this->db->update('tugas'); // Akan mengembalikan TRUE jika berhasil
    }

    /**
     * Menambahkan tugas baru untuk teknisi
     * @param array $data
     * @return bool
     */
    public function tambahTugas($data)
    {
        // Pastikan data bukan array kosong
        if (empty($data) || !is_array($data)) {
            return false;
        }

        return $this->db->insert('tugas', $data);
    }

    /**
     * Mendapatkan detail tugas berdasarkan ID tugas
     * @param int $id_tugas
     * @return array|null
     */
    public function getDetailTugas($id_tugas)
    {
        // Validasi ID tugas
        if (!is_numeric($id_tugas)) {
            return null;
        }

        $this->db->select('tugas.*, pengaduan.judul_pengaduan, pengaduan.isi_pengaduan, pengaduan.tanggal_pengaduan');
        $this->db->from('tugas');
        $this->db->join('pengaduan', 'tugas.id_pengaduan = pengaduan.id', 'left');
        $this->db->join('user', 'tugas.id_teknisi = user.id', 'left');
        $this->db->where('tugas.id', $id_tugas);

        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * Mendapatkan daftar teknisi berdasarkan role_id
     * @param int $role_id
     * @return array
     */
    public function getTeknisiByRole($role_id)
    {
        // Validasi role_id
        if (!is_numeric($role_id)) {
            return [];
        }

        $this->db->select('id, nama_instansi, email, username, no_hp');
        $this->db->from('user');
        $this->db->where('role_id', $role_id);

        $query = $this->db->get();
        return $query->result_array();
    }
}