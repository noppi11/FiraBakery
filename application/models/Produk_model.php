<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    private $table = 'produk';

    public function get_all($limit = 8)
    {
        $this->db->select('produk.*, kategori.nama_kategori, g.gambar as foto_utama');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('(
            SELECT g1.id_produk, g1.gambar
            FROM gambar g1
            JOIN (
                SELECT id_produk, MIN(id_gambar) AS min_id
                FROM gambar
                GROUP BY id_produk
            ) g2 ON g1.id_produk = g2.id_produk AND g1.id_gambar = g2.min_id
        ) g', 'g.id_produk = produk.id_produk', 'left');
        $this->db->limit($limit);
    
        return $this->db->get()->result();
    }
    
    public function get_all_for_admin()
    {
        $this->db->select('produk.*, kategori.nama_kategori, g.gambar as foto_utama');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('(
            SELECT g1.id_produk, g1.gambar
            FROM gambar g1
            JOIN (
                SELECT id_produk, MIN(id_gambar) AS min_id
                FROM gambar
                GROUP BY id_produk
            ) g2 ON g1.id_produk = g2.id_produk AND g1.id_gambar = g2.min_id
        ) g', 'g.id_produk = produk.id_produk', 'left');
    
        return $this->db->get()->result();
    }
    
    
    public function get_by_kategori($id_kategori)
    {
        $this->db->select('produk.*, kategori.nama_kategori, g.gambar as foto_utama');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('(
            SELECT g1.id_produk, g1.gambar
            FROM gambar g1
            JOIN (
                SELECT id_produk, MIN(id_gambar) AS min_id
                FROM gambar
                GROUP BY id_produk
            ) g2 ON g1.id_produk = g2.id_produk AND g1.id_gambar = g2.min_id
        ) g', 'g.id_produk = produk.id_produk', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
    
        return $this->db->get()->result();
    }
    

    public function countAllProduk($search = null, $kategori = null)
    {
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');

        if (!empty($kategori)) {
            $this->db->where('produk.id_kategori', $kategori);
        }

        if (!empty($search)) {
            $this->db->like('produk.nama_produk', $search);
        }

        return $this->db->count_all_results();
    }

    public function getProduk($limit, $start, $search = null, $kategori = null, $sort = null)
    {
        $this->db->select('produk.*, kategori.nama_kategori, g.gambar as foto');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
    
        // Ambil 1 gambar pertama tiap produk
        $this->db->join('(
            SELECT g1.id_produk, g1.gambar as gambar
            FROM gambar g1
            JOIN (
                SELECT id_produk, MIN(id_gambar) as min_id
                FROM gambar
                GROUP BY id_produk
            ) g2 ON g1.id_produk = g2.id_produk AND g1.id_gambar = g2.min_id
        ) g', 'g.id_produk = produk.id_produk', 'left');
        
    
        // Filter pencarian
        if (!empty($search)) {
            $this->db->like('produk.nama_produk', $search);
        }
        if (!empty($kategori)) {
            $this->db->where('produk.id_kategori', $kategori);
        }
    
        // Urutan
        if ($sort == 'harga_asc') {
            $this->db->order_by('produk.harga', 'ASC');
        } elseif ($sort == 'harga_desc') {
            $this->db->order_by('produk.harga', 'DESC');
        } else {
            $this->db->order_by('produk.id_produk', 'DESC');
        }
    
        $this->db->limit($limit, $start);
    
        return $this->db->get()->result();
    }
    

    public function get_random_images($limit = 6)
{
    $this->db->select('gambar');
    $this->db->from('gambar');
    $this->db->where('gambar IS NOT NULL'); // hanya produk yg punya gambar
    $this->db->order_by('RAND()'); // ambil acak
    $this->db->limit($limit);
    return $this->db->get()->result();
}

public function getProdukFiltered($search = null, $id_kategori = null)
{
    $this->db->select('produk.*, kategori.nama_kategori, g.gambar as foto_utama');
    $this->db->from('produk');
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
    $this->db->join('(SELECT id_produk, gambar FROM gambar ORDER BY id_gambar ASC LIMIT 1) g', 'g.id_produk = produk.id_produk', 'left');

    // Filter search (nama produk)
    if (!empty($search)) {
        $this->db->like('produk.nama_produk', $search);
    }

    // Filter kategori
    if (!empty($kategori_id)) {
        $this->db->where('produk.id_kategori', $id_kategori);
    }

    $this->db->group_by('id.produk'); // biar tidak dobel kalau ada banyak gambar
    return $this->db->get()->result();
}

    public function insert_produk($data_produk) {
        $this->db->insert('produk', $data_produk);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_produk', $id)->update($this->table, $data);
    }
    
    public function get_by_id($id)
    {
        return $this->db->where('id_produk', $id)->get($this->table)->row();
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_produk' => $id]);
    }

    public function getWithKategori($id_produk)
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->where('produk.id_produk', $id_produk);
        return $this->db->get()->row();
    }
    
    public function getImages($id_produk)
    {
        return $this->db->get_where('gambar', ['id_produk' => $id_produk])->result();
    }
    
    public function getRelated($id_kategori, $id_produk)
    {
        $this->db->select('produk.*, kategori.nama_kategori, g.gambar as foto_utama');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('(
            SELECT g1.id_produk, g1.gambar
            FROM gambar g1
            JOIN (
                SELECT id_produk, MIN(id_gambar) AS min_id
                FROM gambar
                GROUP BY id_produk
            ) g2 ON g1.id_produk = g2.id_produk AND g1.id_gambar = g2.min_id
        ) g', 'g.id_produk = produk.id_produk', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        $this->db->where('produk.id_produk !=', $id_produk); // exclude produk yang sedang dilihat
    
        return $this->db->get()->result();
    }
    

    // simpan produk ke cart
    public function addToCart($id_produk, $id_user, $qty = 1)
    {
        // cek apakah produk sudah ada di cart user
        $cek = $this->db->get_where('cart', [
            'id_produk' => $id_produk,
            'id_user'   => $id_user
        ])->row();

        if ($cek) {
            // kalau sudah ada → update qty
            $this->db->set('qty', 'qty + '.$qty, FALSE);
            $this->db->where('id_cart', $cek->id_cart);
            $this->db->update('cart');
        } else {
            // kalau belum ada → insert baru
            $this->db->insert('cart', [
                'id_produk' => $id_produk,
                'id_user'   => $id_user,
                'qty'       => $qty
            ]);
        }
    }

    public function updateQty($id_cart, $qty, $id_user)
{
    $this->db->where('id_cart', $id_cart);
    $this->db->where('id_user', $id_user);
    $this->db->update('cart', ['qty' => $qty]);
}

public function deleteItem($id_cart, $id_user)
{
    $this->db->where('id_cart', $id_cart);
    $this->db->where('id_user', $id_user);
    $this->db->delete('cart');
}


    // ambil semua cart berdasarkan user
    public function getCartByUser($id_user)
    {
        $this->db->select('cart.id_cart, cart.qty, produk.id_produk, produk.nama_produk, produk.harga, MIN(g.gambar) AS foto');
        $this->db->from('cart');
        $this->db->join('produk', 'cart.id_produk = produk.id_produk');
        $this->db->join('gambar g', 'g.id_produk = produk.id_produk', 'left');
        $this->db->where('cart.id_user', $id_user);
        $this->db->group_by('cart.id_cart, cart.qty, produk.id_produk, produk.nama_produk, produk.harga'); 
        return $this->db->get()->result();
        
    }
    
    public function getCartHeader($id_user)
{
    $this->db->select('SUM(cart.qty) as total_qty, SUM(cart.qty * produk.harga) as total_harga');
    $this->db->from('cart');
    $this->db->join('produk', 'cart.id_produk = produk.id_produk');
    $this->db->where('cart.id_user', $id_user);
    $query = $this->db->get()->row();
    
    return $query;
}

public function getByUser($id_user)
{
    $this->db->select('c.*, p.nama_produk, p.harga');
    $this->db->from('cart c');
    $this->db->join('produk p', 'c.id_produk = p.id_produk');
    $this->db->where('c.id_user', $id_user);
    return $this->db->get()->result();
}

public function createTransaksi($id_user, $cart, $total)
{
    // 1. Insert ke tabel transaksi
    $this->db->insert('transaksi', [
        'id_user' => $id_user,
        'total'   => $total
    ]);
    $id_transaksi = $this->db->insert_id();

    // 2. Insert detail transaksi
    foreach ($cart as $item) {
        $subtotal = $item->harga * $item->qty;
        $this->db->insert('detail_transaksi', [
            'id_transaksi' => $id_transaksi,
            'id_produk'    => $item->id_produk,
            'qty'          => $item->qty,
            'subtotal'     => $subtotal
        ]);
    }

    return $id_transaksi;
}

public function clearCart($id_user)
{
    $this->db->delete('cart', ['id_user' => $id_user]);
}

}
