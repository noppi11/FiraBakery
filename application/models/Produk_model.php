<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function insert_produk($data_produk) {
        $this->db->insert('produk', $data_produk);
    }

    public function insert_kategori($data_kategori) {
        $this->db->insert('kategori', $data_kategori);
    }

    public function insert_foto($data_foto) {
        $this->db->insert('gambar', $data_foto);
    }

    public function get_all_produk() {
        $this->db->select('produk.*, kategori.nama_kategori, gambar.gambar');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_produk = produk.id_produk');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk');
        return $this->db->get()->result();
    }
}
