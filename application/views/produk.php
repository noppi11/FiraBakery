<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
                                                       <!-- Modal -->
                                                       <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog">
                          <form class="modal-content" enctype="multipart/form-data" 
      method="post" 
      action="<?= site_url('produk/simpan') ?>">
  <div class="modal-header">
    <h5 class="modal-title" id="backDropModalTitle">Tambah Produk</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  
  <div class="modal-body">
    <div class="row">
      <div class="col mb-3">
        <label class="form-label">Id Produk</label>
        <input type="text" class="form-control" name="id_produk" placeholder="Masukkan ID Produk" required />
      </div>
      <div class="col mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Produk" required />
      </div>
      <div class="col mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Produk" required />
      </div>
    </div>

    <div class="row g-2">
      <div class="col mb-0">
        <label class="form-label">Harga</label>
        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" required />
      </div>
      <div class="col mb-0">
        <label class="form-label">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" required />
      </div>
      <div class="col mb-0">
        <label class="form-label">Foto Produk</label>
        <input type="file" class="form-control" name="gambar" required />
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
                      </div>
                    </div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Tables /</span> Tabel Produk
        </h4>
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#backDropModal"
                        >
                          Launch modal
                        </button>
              <!-- Bootstrap Table with Header - Footer -->
              <div class="card">
                <h5 class="card-header">Table Produk</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Deskripsi</th>
                        <th>Nama Kategori</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<?php foreach ($produk as $p): ?>
<tr>
    <td><?= $p->nama_produk ?></td>
    <td><?= number_format($p->harga, 0, ',', '.') ?></td>
    <td><?= $p->deskripsi ?></td>
    <td><?= $p->nama_kategori ?></td>
    <td>
        <img src="<?= base_url($p->gambar) ?>" width="100">
    </td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= site_url('produk/edit/'.$p->id_produk) ?>">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <a class="dropdown-item" href="<?= site_url('produk/hapus/'.$p->id_produk) ?>" onclick="return confirm('Yakin mau hapus?')">
                    <i class="bx bx-trash me-1"></i> Delete
                </a>
            </div>
        </div>
    </td>
</tr>
<?php endforeach; ?>
</tbody>

                    <tfoot class="table-border-bottom-0">
                      <tr>
                      <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Deskripsi</th>
                        <th>Nama Kategori</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>


              <hr class="my-5">

        <div class="content-backdrop fade"></div>

</div>
</div>