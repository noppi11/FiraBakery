<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function index(){
        $this->load->view('login');
    }
    
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->check_login($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'id_user'   => $user->id_user, // kolom di DB
                'username'  => $user->username,
                'role'      => $user->role,
                'logged_in' => TRUE
            ]);            

            // kalau role admin → dashboard admin
            if ($user->role == 'admin') {
                redirect('admin');
            }

            // kalau role pembeli → cek apakah ada redirect_url
            if ($user->role == 'pembeli') {
                if ($this->session->userdata('redirect_url')) {
                    $url = $this->session->userdata('redirect_url');
                    $this->session->unset_userdata('redirect_url'); // hapus biar gak numpuk
                    //echo "Redirect ke: ".$url; exit;
                    redirect($url); 
                } else {
                    redirect('home'); // default kalau gak ada redirect
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }

    public function registrasi(){
        $this->load->view('registrasi');
    }

    public function registrasi_proses() {
        $id = $this->input->post('id_user');

        $data = [
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role'     => 'pembeli' // default role
        ];

        // Jika password diisi, baru diset
        if ($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        if ($id) {
            $this->User_model->update($id, $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data user berhasil diperbarui.</div>');
        } else {
            $this->User_model->insert($data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">User baru berhasil ditambahkan.</div>');
        }

        redirect('auth');
    }

    public function logout()
{
    // Hapus semua session
    $this->session->sess_destroy();

    // Redirect ke halaman login atau home
    redirect('auth'); // bisa juga redirect('welcome')
}


public function forgot_password()
{
    $this->load->view('user/lupa_password');
}

public function send_reset_link()
{
    $email = $this->input->post('email');
    $user = $this->db->get_where('user', ['email' => $email])->row();

    if ($user) {
        // buat token unik
        $token = bin2hex(random_bytes(50));
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // simpan ke database
        $this->db->where('id_user', $user->id_user);
        $this->db->update('user', [
            'reset_token' => $token,
            'reset_expires' => $expires
        ]);

        // kirim email
        $reset_link = base_url("user/reset_password/$token");
        $message = "Klik link berikut untuk reset password: <a href='$reset_link'>$reset_link</a>";

        $this->load->library('email');
        $this->email->from('noreply@yourapp.com', 'YourApp');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message($message);

        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Cek email kamu untuk reset password.');
            redirect("auth/reset_password/$token"); // pindah langsung ke halaman reset
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim email.');
            redirect('auth/forgot_password');
        }
        
    } else {
        $this->session->set_flashdata('error', 'Email tidak ditemukan.');
    }
    redirect('auth/forgot_password');
}

public function reset_password($token)
{
    $user = $this->db->get_where('user', [
        'reset_token' => $token,
        'reset_expires >=' => date("Y-m-d H:i:s")
    ])->row();

    if (!$user) {
        $this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa.');
        redirect('auth/forgot_password');
    }

    $data['token'] = $token;
    $this->load->view('user/reset_password', $data);
}

public function update_password()
{
    $token = $this->input->post('token');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', [
        'reset_token' => $token,
        'reset_expires >=' => date("Y-m-d H:i:s")
    ])->row();

    if ($user) {
        $hashed = password_hash($password, PASSWORD_BCRYPT);

        $this->db->where('id_user', $user->id_user);
        $this->db->update('user', [
            'password' => $hashed,
            'reset_token' => NULL,
            'reset_expires' => NULL
        ]);

        $this->session->set_flashdata('success', 'Password berhasil diubah. Silakan login.');
        redirect('auth/login');
    } else {
        $this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa.');
        redirect('auth/forgot_password');
    }
}

    }