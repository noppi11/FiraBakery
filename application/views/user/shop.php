    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
        <div class="shop__option">
    <div class="row">
        <div class="col-lg-7 col-md-7">
            <div class="shop__option__search">
                <form method="get" action="<?= base_url('produk/shop') ?>">
                    <select name="kategori">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k->id_kategori ?>" 
                                <?= ($this->input->get('kategori') == $k->id_kategori) ? 'selected' : '' ?>>
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="search" placeholder="Search"
                        value="<?= $this->input->get('search') ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="col-lg-5 col-md-5">
            <div class="shop__option__right">
                <form method="get" action="<?= base_url('produk/shop') ?>">
                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Default sorting</option>
                        <option value="asc" <?= ($this->input->get('sort')=='asc')?'selected':'' ?>>A - Z</option>
                        <option value="desc" <?= ($this->input->get('sort')=='desc')?'selected':'' ?>>Z - A</option>
                        <option value="harga_asc" <?= ($this->input->get('sort')=='harga_asc')?'selected':'' ?>>Harga Termurah</option>
                        <option value="harga_desc" <?= ($this->input->get('sort')=='harga_desc')?'selected':'' ?>>Harga Termahal</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>

            <div class="row">
                <?php foreach ($produk as $p): ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= base_url($p->foto) ?>">
                            <div class="product__label">
                                <span><?= $p->nama_kategori ?? 'Produk' ?></span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?= $p->nama_produk ?></a></h6>
                            <div class="product__item__price">Rp<?= number_format($p->harga, 0, ',', '.') ?></div>
                            <div class="cart_add">
                                <a href="<?= base_url('produk/add_to_cart//'.$p->id_produk) ?>">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <?= $pagination ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__last__text">
                            <p>Showing <?= count($produk) ?> of <?= $this->Produk_model->countAllProduk() ?> results</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shop Section End -->