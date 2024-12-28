<?php
class Pengaduan_model extends CI_Model
{

    public function get_pengaduan_per_bulan()
    {
        $this->db->select('judul_pengaduan, MONTH(tgl_pengaduan) as bulan, COUNT(*) as jumlah');
        $this->db->from('pengaduan');
        $this->db->group_by(['judul_pengaduan', 'bulan']);
        $this->db->order_by('bulan', 'ASC');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $row) {
            $data[$row->judul_pengaduan][(int)$row->bulan - 1] = (int)$row->jumlah;
        }

        // Pastikan semua bulan terisi (0 jika tidak ada data)
        foreach ($data as $judul => $values) {
            $data[$judul] = array_replace(array_fill(0, 12, 0), $values);
        }

        return $data;
    }
}
