<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Tables /</span> Tabel Pengguna
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div id="menghilang">
                <?= $this->session->flashdata('alert', true); ?>
            </div>
            <h5 class="card-header">Daftar Pengguna di FiraBakery</h5>
            <div class="table-responsive text-nowrap">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah User</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user->nama; ?></td>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->role; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditUser<?= $user->id_user ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onClick="return confirm('Apakah kamu sungguh ingin menghapusnya?')" href="<?= site_url('user/delete/'.$user->id_user) ?>">
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
        <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="<?= site_url('user/save') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="pembeli">Pembeli</option>
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
        <?php foreach ($users as $user): ?>
            <div class="modal fade" id="modalEditUser<?= $user->id_user ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="<?= site_url('user/save') ?>">
                        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?= $user->nama ?>" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username" value="<?= $user->username ?>" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Password (isi jika mau ganti)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="pembeli" <?= $user->role == 'pembeli' ? 'selected' : '' ?>>Pembeli</option>
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
