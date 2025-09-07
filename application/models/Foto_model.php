<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_model extends CI_Model {
    private $table = 'gambar';

    public function get_all() {
        return $this->db->get('gambar')->result();
    }

    public function get_by_produk($id_produk)
    {
        return $this->db->get_where('gambar', ['id_produk' => $id_produk])->result();
    }

    public function insert($data)
    {
        return $this->db->insert('gambar', $data);
    }

    public function get_by_id($id_gambar)
{
    return $this->db->get_where('gambar', ['id_gambar' => $id_gambar])->row();
}

public function update($id_gambar, $data)
{
    return $this->db->where('id_gambar', $id_gambar)->update('gambar', $data);
}

public function get_id_hapus($id)
{
    return $this->db->get_where('gambar', ['id_gambar' => $id])->row();
}

public function delete($id)
{
    $this->db->where('id_gambar', $id);
    return $this->db->delete('gambar');
}
}
