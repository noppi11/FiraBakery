<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
    }

	public function index()
	{
        $data['produk'] = $this->Produk_model->get_all_produk();
        $this->template->load('dashboard','produk', $data);
	}

    public function simpan() {
        $id_produk = $this->input->post('id_produk');

        // Upload Foto
        $config['upload_path']   = './assets/uploads/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; // 2MB
        $config['file_name']     = 'produk_' . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            echo json_encode([
                'status'  => 'error',
                'message' => $this->upload->display_errors()
            ]);
            return;
        }

        $upload_data = $this->upload->data();
        $file_path = 'assets/uploads/produk/' . $upload_data['file_name'];

        // Simpan ke tabel produk
        $data_produk = [
            'id_produk'   => $id_produk,
            'nama_produk' => $this->input->post('nama_produk'),
            'harga'       => $this->input->post('harga'),
            'deskripsi'   => $this->input->post('deskripsi')
        ];
        $this->Produk_model->insert_produk($data_produk);

        // Simpan ke tabel kategori
        $data_kategori = [
            'id_produk'      => $id_produk,
            'nama_kategori'  => $this->input->post('nama_kategori')
        ];
        $this->Produk_model->insert_kategori($data_kategori);

        // Simpan ke tabel foto
        $data_foto = [
            'id_produk' => $id_produk,
            'gambar' => $file_path
        ];
        $this->Produk_model->insert_foto($data_foto);

        echo json_encode([
            'status'  => 'success',
            'message' => 'Produk berhasil disimpan'
        ]);
    }
}
