<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Tables /</span> Tabel Produk
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div id="menghilang">
                <?= $this->session->flashdata('alert', true); ?>
            </div>
            <h5 class="card-header">Daftar Pengguna di FiraBakery</h5>
            <div class="table-responsive text-nowrap">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">Tambah Produk</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Nama Kategori</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($produk as $p): ?>
                            <tr>
                                <td><?= $p->nama_produk ?></td>
                                <td><?= $p->nama_kategori ?></td>
                                <td><?= number_format($p->harga, 0, ',', '.') ?></td>
                                <td><?= strlen($p->deskripsi) > 50 ? substr($p->deskripsi, 0, 50) . '...' : $p->deskripsi ?></td>

                                <td> <?php if ($p->foto_utama): ?> <img src="<?= base_url($p->foto_utama) ?>" width="80"> <?php else: ?> <span class="text-muted">Belum ada foto</span> <?php endif; ?> </td>

                                
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditProduk<?= $p->id_produk ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')" href="<?= site_url('produk/delete/'.$p->id_produk) ?>">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalTambahGambar<?= $p->id_produk ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Tambah Gambar
                                            </a>
                                            <!-- Trigger -->
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalUpdateGambar<?= $p->id_produk ?>">
                                                <i class="bx bx-image me-1"></i> Update Gambar
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Modal Tambah User -->
        <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
            <form class="modal-content" method="post" action="<?= site_url('produk/simpan') ?>">
  <div class="modal-header">
    <h5 class="modal-title">Tambah Produk</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  </div>
  
  <div class="modal-body">
    <div class="row">
      <div class="col mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Produk" required />
      </div>
      <div class="col mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-control" name="id_kategori" required>
          <option value="">-- Pilih Kategori --</option>
          <?php foreach ($kategori as $k): ?>
            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="row g-2">
      <div class="col mb-0">
        <label class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga" required />
      </div>
      <div class="col mb-0">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" rows="3" required></textarea>
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>

            </div>
        </div>

        <!-- Modal Edit Produk -->
        <?php foreach ($produk as $p): ?>
            <div class="modal fade" id="modalEditProduk<?= $p->id_produk ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                <form method="post" action="<?= site_url('produk/update/'.$p->id_produk) ?>">
                <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                            <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama_produk" value="<?= $p->nama_produk ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id_kategori ?>" <?= $p->id_kategori == $k->id_kategori ? 'selected' : '' ?>>
                    <?= $k->nama_kategori ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" value="<?= $p->harga ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required><?= $p->deskripsi ?></textarea>
    </div>
                              
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                </div>

</form>

                </div>
            </div>
        <?php endforeach; ?>

<!-- Modal -->
<?php foreach ($produk as $p): ?>
<div class="modal fade" id="modalTambahGambar<?= $p->id_produk ?>" tabindex="-1" aria-labelledby="modalLabel<?= $p->id_produk ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('foto/tambah/'.$p->id_produk) ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel<?= $p->id_produk ?>">Tambah Gambar Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="gambar<?= $p->id_produk ?>" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar<?= $p->id_produk ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal -->
<?php foreach ($produk as $p): ?>
<div class="modal fade" id="modalUpdateGambar<?= $p->id_produk ?>" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Gambar Produk: <?= $p->nama_produk ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php if (!empty($gambar[$p->id_produk])): ?>
            <?php foreach ($gambar[$p->id_produk] as $g) : ?>
              <div class="col-md-4 text-center mb-3">
              <img src="<?= base_url($g->gambar) ?>" class="img-thumbnail mb-2" style="height:150px;object-fit:cover;">
                
                <!-- Form Update -->
                <form action="<?= site_url('foto/update/'.$g->id_gambar) ?>" method="post" enctype="multipart/form-data">
                  <input type="file" name="gambar" class="form-control mb-2" required>
                  <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
                <!-- tombol hapus -->
<a href="<?= site_url('foto/delete/'.$g->id_gambar) ?>" 
   onclick="return confirm('Yakin ingin menghapus gambar ini?')" 
   class="btn btn-sm btn-danger">Hapus</a>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-muted">Belum ada gambar untuk produk ini.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


        <hr class="my-5">
        <div class="content-backdrop fade"></div>
    </div>
</div>

