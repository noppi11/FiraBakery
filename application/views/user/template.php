<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('');?>user/css/style.css" type="text/css">
    <style>
        .about__text {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center; /* vertikal */
    align-items: center;     /* horizontal */
    height: 100%; /* pastikan col punya tinggi */
}

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="<?php echo base_url('');?>user/img/icon/search.png" alt=""></a>
                <a href="#"><img src="<?php echo base_url('');?>user/img/icon/heart.png" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><img src="<?php echo base_url('');?>user/img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="<?php echo base_url('');?>user/img/logo.png" alt="Fira Bakery"></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                
                <li>
                    <?php if ($this->session->userdata('logged_in')): ?>
                        <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
                    <?php else: ?>
                        <!-- kosongin aja, atau bisa kasih tombol login -->
                        <a href="<?php echo site_url('auth'); ?>">Login</a>
                       
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                   
                                    <li>
                                        <?php if ($this->session->userdata('logged_in')): ?>
                                            <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
                                        <?php else: ?>
                                            <!-- kosongin aja, atau bisa kasih tombol login -->
                                            <a href="<?php echo site_url('auth'); ?>">Login</a>
                                           
                                        <?php endif; ?>
                                    </li>

                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="./index.html"><img src="<?php echo base_url('');?>user/img/logo.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">
                                    <!-- Tombol Search -->
                                    <a href="javascript:void(0);" onclick="toggleSearch()" class="search-switch">
                                        <img src="<?php echo base_url('');?>user/img/icon/search.png" alt="Cari">
                                    </a>

                                </div>

                                <!-- Form Search & Filter (disembunyikan default) -->
                                <div id="searchBox" style="display:none; position:absolute; right:20px; top:60px; background:#fff; padding:15px; border:1px solid #ddd; border-radius:8px; z-index:999;">
                                    <form method="get" action="<?= base_url('produk/search') ?>">
                                        <input type="text" name="search" placeholder="Cari produk..." value="<?= $this->input->get('search') ?>" style="padding:5px; width:200px;">
                                        
                                        <select name="kategori" style="padding:5px; margin-top:5px; width:200px;">
                                            <option value="">-- Semua Kategori --</option>
                                            <?php foreach ($kategori as $k): ?>
                                                <option value="<?= $k->id_kategori ?>" <?= ($this->input->get('kategori') == $k->id_kategori) ? 'selected' : '' ?>>
                                                    <?= $k->nama_kategori ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <button type="submit" style="margin-top:5px; padding:5px 10px;">Cari</button>
                                    </form>
                                </div>

                                <script>
                                function toggleSearch() {
                                    var box = document.getElementById("searchBox");
                                    box.style.display = (box.style.display === "none" || box.style.display === "") ? "block" : "none";
                                }
                                </script>

                                <div class="header__top__right__cart">
                                    <a href="<?= base_url('cart') ?>">
                                        <img src="<?= base_url('user/img/icon/cart.png') ?>" alt="">
                                        <span><?= $cart_header->total_qty ?? 0 ?></span>
                                    </a>
                                    <div class="cart__price">Cart: <span>Rp <?= number_format($cart_header->total_harga ?? 0, 0, ',', '.') ?></span></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="<?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : '' ?>">
                                <a href="<?= site_url('home') ?>">Beranda</a>
                            </li>
                            <li class="<?= ($this->uri->segment(2) == 'tentang') ? 'active' : '' ?>">
                                <a href="<?= site_url('welcome/tentang') ?>">Tentang</a>
                            </li>
                            <li class="<?= ($this->uri->segment(1) == 'produk') ? 'active' : '' ?>">
                                <a href="<?= site_url('produk/shop') ?>">Belanja</a>
                            </li>
                            <li class="<?= ($this->uri->segment(2) == 'kontak') ? 'active' : '' ?>">
                                <a href="<?= site_url('kategori/kontak') ?>">Kontak</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <!-- Header Section End -->

    <?= $contents;?>

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="<?php echo base_url('');?>user/img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>JAM KERJA</h6>
                        <ul>
                            <li>Senin - Jumat: 08:00 am – 08:30 pm</li>
                            <li>Sabtu: 10:00 am – 16:30 pm</li>
                            <li>Minggu: 10:00 am – 16:30 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="<?php echo base_url('');?>user/img/footer-logo.png" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua.</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Subscribe</h6>
                        <p>Get latest updates and offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="<?php echo base_url('');?>user/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('');?>user/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('');?>user/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url('');?>user/js/jquery.barfiller.js"></script>
<script src="<?php echo base_url('');?>user/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url('');?>user/js/jquery.slicknav.js"></script>
<script src="<?php echo base_url('');?>user/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url('');?>user/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url('');?>user/js/main.js"></script>
</body>

</html>