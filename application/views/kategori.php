<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Tables /</span> Tabel Kategori
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div id="menghilang">
                <?= $this->session->flashdata('alert', true); ?>
            </div>
            <h5 class="card-header">Daftar Kategori di FiraBakery</h5>
            <div class="table-responsive text-nowrap">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">Tambah Kategori</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($kategori as $k): ?>
                            <tr>
                                <td><?= $k->nama_kategori; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditKategori<?= $k->id_kategori ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')" href="<?= site_url('kategori/delete/'.$k->id_kategori) ?>">
                                                <i class="bx bx-trash me-1"></i> Delete
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
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?= site_url('kategori/save') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Icon</label>
                                <select name="icon" required>
                                    <option value="">-- Pilih Icon --</option>
                                    <?php foreach ($icons as $icon): ?>
                                        <option value="<?= $icon ?>">
                                            <span class="<?= $icon ?>"></span> <?= $icon ?>
                                        </option>

                                    <?php endforeach; ?>
                                </select>
                                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit User -->
        <?php foreach ($kategori as $k): ?>
  <div class="modal fade" id="modalEditKategori<?= $k->id_kategori ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="<?= site_url('kategori/update') ?>">
        <input type="hidden" name="id_kategori" value="<?= $k->id_kategori ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Nama Kategori</label>
              <input type="text" name="nama_kategori" value="<?= $k->nama_kategori ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Icon</label>
              <select name="icon" class="form-control" required>
                <option value="">-- Pilih Icon --</option>
                <?php foreach ($icons as $icon): ?>
                  <option value="<?= $icon ?>" <?= (isset($k->icon) && $k->icon === $icon) ? 'selected' : '' ?>>
                    <?= $icon ?>
                  </option>
                <?php endforeach; ?>
              </select>
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


        <hr class="my-5">
        <div class="content-backdrop fade"></div>
    </div>
</div>
