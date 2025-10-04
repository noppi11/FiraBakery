    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="<?php echo base_url('');?>user/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Membuat hidupmu lebih manis dengan setiap gigitannya!</h2>
                                <a href="#" class="primary-btn">Kue Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="<?php echo base_url('');?>user/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Rasakan sendiri kehangatan dan kenikmatannya!</h2>
                                <a href="#" class="primary-btn">Kue Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->

    <!-- About Section End -->

    <!-- Categories Section Begin -->
    <div class="categories">
    <div class="container">
    <div class="row">
        <div class="categories__slider owl-carousel">
            <?php foreach ($kategori as $k): ?>
                <div class="categories__item">
                    <div class="categories__item__icon">
                        <a href="<?= base_url('produk/kategori/' . $k->id_kategori) ?>">
                            <span class="<?= $k->icon ?>"></span>
                            <h5><?= $k->nama_kategori ?></h5>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>

    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
    <div class="container">
        <div class="row">
            <?php foreach($produk as $p): ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product__item">
                    <a href="<?= base_url('produk/detail/' . $p->id_produk) ?>">
                        <div class="product__item__pic set-bg"
                            data-setbg="<?= !empty($p->foto_utama) ? base_url($p->foto_utama) : base_url('assets/img/no-image.png') ?>">
                            <div class="product__label">
                                <span><?= $p->nama_kategori ?? '' ?></span>
                            </div>
                        </div>
                    </a>

                    <div class="product__item__text">
                        <h6>
                            <a href="<?= base_url('produk/detail/' . $p->id_produk) ?>">
                                <?= $p->nama_produk ?>
                            </a>
                        </h6>
                        <div class="product__item__price">
                            Rp<?= number_format($p->harga, 0, ',', '.') ?>
                        </div>
                        <div class="cart_add">
                            <a href="<?= base_url('produk/add_to_cart//'.$p->id_produk) ?>">Add to cart</a>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

    <!-- Product Section End -->

    <!-- Class Section Begin -->
    <section class="class spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="class__form">
                        <div class="section-title">
                            <span>  Cara Pesan </span>
                            <h2>Berikut Cara Memesan <br />Kue Kami</h2>
                        </div>
                        <h3>1. Pilih Produk</h3>
                        <p>Lihat katalog roti, kue, dan pastry di halaman menu atau galeri produk.</p>
                        <h3>2. Tambah ke Keranjang</h3>
                        <p>Tambahkan ke keranjang produk yang sudah dipilih</p>
                        <h3>3. Hubungi kami</h3>
                        <p>Di halaman daftar keranjang maka akan muncul untuk tombol 'transaksi' yang otomatis mengarahkan ke nomor kami</p>
                        <h3>4. Datang ke Toko</h3>
                        <p>Datang langsung ke toko untuk pembayaran dan pengambilan kue</p>
                    </div>
                </div>
            </div>
            <div class="class__video set-bg" data-setbg="<?php echo base_url('');?>user/img/class-vidio.jpeg">

            </div>
        </div>
    </section>
    <!-- Class Section End -->

    <!-- Team Section Begin -->

    <!-- Team Section End -->

    <!-- Testimonial Section Begin -->

    <!-- Testimonial Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Follow us on instagram</span>
                            <h2>Sweet moments are saved as memories.</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> @firabakery</h5>
                    </div>
                </div>
                <div class="col-lg-8">
    <div class="row">
        <?php foreach ($random_images as $i => $img): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                <div class="instagram__pic <?= ($i % 2 == 1) ? 'middle__pic' : '' ?>">
                    <img src="<?= base_url($img->gambar) ?>" alt="">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    <div class="map">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-7">
                
            </div>
        </div>
    </div>
    <div class="map__iframe">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.599474129807!2d111.0977496!3d-7.618484999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e798ba6509d9b45%3A0x667742b6b7ee0759!2sfira%20bakery!5e0!3m2!1sid!2sid!4v1757141166134!5m2!1sid!2sid" 
        width="100%" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    </div>
</div>

    <!-- Map End -->