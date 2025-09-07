<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'user'; // sesuaikan dengan nama tabel di DB

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->where('id_user', $id)->get($this->table)->row();
    }

    public function getById($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row();
    }
    
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_user', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id_user', $id)->delete($this->table);
    }

    public function check_login($username, $password)
    {
        // cari user berdasarkan username
        $this->db->where('username', $username);
        $user = $this->db->get($this->table)->row();

        // jika user ditemukan dan password cocok
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }

        // kalau gagal
        return false;
    }
}
