    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Product detail</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Sweet autumn leaves</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <!-- Gambar besar -->
                        <div class="product__details__big__img">
                            <img class="big_img" 
                                src="<?= base_url(($gambar[0]->gambar ?? 'default.jpg')) ?>" 
                                alt="<?= $produk->nama_produk ?>">
                        </div>

                        <!-- Thumbnail kecil -->
                        <div class="product__details__thumb">
                            <?php foreach ($gambar as $i => $g): ?>
                                <div class="pt__item <?= $i == 1 ? 'active' : '' ?>">
                                    <img data-imgbigurl="<?= base_url($g->gambar) ?>"
                                        src="<?= base_url($g->gambar) ?>" 
                                        alt="<?= $produk->nama_produk ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <!-- Label kategori -->
                        <div class="product__label"><?= $produk->nama_kategori ?></div>

                        <!-- Nama produk -->
                        <h4><?= strtoupper($produk->nama_produk) ?></h4>

                        <!-- Harga -->
                        <h5>Rp<?= number_format($produk->harga, 0, ',', '.') ?></h5>

                        <!-- Deskripsi -->
                        <p><?= $produk->deskripsi ?></p>

                        <!-- Info produk -->
                        <ul>
                            <li>SKU: <span><?= $produk->sku ?? '-' ?></span></li>
                            <li>Category: <span><?= $produk->nama_kategori ?></span></li>
                            <li>Tags: 
                                <span>
                                    <?php if (!empty($produk->tags)) : ?>
                                        <?= $produk->tags ?>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </span>
                            </li>
                        </ul>

                        <!-- Option -->
                        <div class="product__details__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="<?= base_url('produk/add_to_cart//'.$produk->id_produk) ?>" class="primary-btn">
                                Add to cart
                            </a>
                            <a href="#" class="heart__btn">
                                <span class="icon_heart_alt"></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Products Section Begin -->
    <section class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Produk Terkait</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related__products__slider owl-carousel">
                <?php foreach ($related as $r): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="<?= base_url('uploads/produk/'.$r->gambar) ?>">
                    <div class="product__label">
                        <span><?= $produk->nama_kategori ?></span>
                    </div>
                </div>
                <div class="product__item__text">
                    <h6><a href="<?= site_url('produk/detail/'.$r->id_produk) ?>">
                        <?= $r->nama_produk ?>
                    </a></h6>
                    <div class="product__item__price">
                        Rp<?= number_format($r->harga, 0, ',', '.') ?>
                    </div>
                    <div class="cart_add">
                        <a href="<?= site_url('produk/add_to_cart/'.$r->id_produk) ?>">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Related Products Section End -->