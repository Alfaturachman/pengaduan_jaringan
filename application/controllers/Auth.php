<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        is_login();

        // Validasi username dan password
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username wajib diisi.'
        ]);
        $this->form_validation->set_rules('pass', 'Password', 'required|trim', [
            'required' => 'Password wajib diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $this->load->view('auth/index', $data);
        } else {
            // Jika lolos validasi, proses login
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('pass', true);

        // Get user data
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // Cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'logged_in' => true
                ];
                $this->session->set_userdata($data);

                // Redirect sesuai role
                switch ($user['role_id']) {
                    case 1:
                        redirect('data-pengguna'); // Admin
                        break;
                    case 2:
                        redirect('tambah-pengaduan'); // User
                        break;
                    case 3:
                        redirect('daftar_tugas'); // Teknisi
                        break;
                    default:
                        redirect('auth');
                        break;
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        // Validasi input
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required|trim', [
            'required' => 'Nama Instansi wajib diisi.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Masukkan email yang valid.',
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|callback_valid_no_hp|is_unique[user.no_hp]', [
            'required' => 'No HP wajib diisi.',
            'is_unique' => 'No HP ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username wajib diisi.',
            'is_unique' => 'Username ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('pass1', 'Password', 'required|min_length[6]|matches[pass2]', [
            'required' => 'Password wajib diisi.',
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|matches[pass1]', [
            'required' => 'Konfirmasi Password wajib diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Register';
            $this->load->view('auth/register', $data);
        } else {
            $this->_register_store();
        }
    }

    public function valid_no_hp($no_hp)
    {
        // Contoh format nomor HP: dimulai dengan 08, hanya angka, dan panjang 10-13 karakter
        if (preg_match('/^08[0-9]{8,11}$/', $no_hp)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_no_hp', 'Nomor HP harus dimulai dengan 08 dan berisi 10-13 angka.');
            return false;
        }
    }

    private function _register_store()
    {
        // Ambil input dari form
        $data = [
            'nama_instansi' => htmlspecialchars($this->input->post('nama_instansi', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'role_id' => 2 // Role default untuk user biasa
        ];

        // Simpan data ke database
        if ($this->db->insert('user', $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi berhasil! Silakan login.</div>');
            redirect('auth');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat registrasi!</div>');
            redirect('auth/register');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('auth');
    }

    public function notfound()
    {
        $data['judul'] = 'Page Not Found';
        $this->load->view('auth/error_404', $data);
    }
}