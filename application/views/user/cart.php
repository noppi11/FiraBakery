    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        
                    <form action="<?= site_url('cart/update') ?>" method="post">
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($cart as $c): ?>
        <tr>
            <td class="product__cart__item">
                <div class="product__cart__item__pic">
                    <?php if ($c->foto): ?>
                        <img src="<?= base_url($c->foto) ?>" width="80" alt="<?= $c->nama_produk ?>">
                    <?php else: ?>
                        <img src="<?= base_url('uploads/noimage.png') ?>" width="80">
                    <?php endif; ?>
                </div>
                <div class="product__cart__item__text">
                    <h6><?= $c->nama_produk ?></h6>
                    <h5>Rp<?= number_format($c->harga, 0, ',', '.') ?></h5>
                </div>
            </td>

            <!-- Input qty pakai array qty[id_cart] -->
            <td class="quantity__item">
                <div class="quantity">
                    <div class="pro-qty">
                        <input type="number" name="qty[<?= $c->id_cart ?>]" value="<?= $c->qty ?>" min="1">
                    </div>
                </div>
            </td>

            <td class="cart__price">
                Rp<?= number_format($c->harga * $c->qty, 0, ',', '.') ?>
            </td>

            <td class="cart__close">
                <a href="<?= site_url('cart/delete/'.$c->id_cart) ?>" 
                   onclick="return confirm('Hapus produk ini dari keranjang?')">
                    <span class="icon_close"></span>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tombol update cart -->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="continue__btn update__btn">
            <button type="submit" class="btn btn-warning"><i class="fa fa-spinner"></i> Update cart</button>
        </div>
    </div>
</form>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="<?= site_url('produk/shop') ?>">Continue Shopping</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    
                <?php 
$total_qty = 0;
$total_harga = 0;

foreach($cart as $c){
    $total_qty += $c->qty;                // jumlah semua barang
    $total_harga += $c->harga * $c->qty;  // total harga
}
?>

<div class="cart__total">
    <h6>Total Pesanan</h6>
    <ul>
        <li>Jumlah Barang <span><?= $total_qty ?> item</span></li>
        <li>Total Harga <span>Rp <?= number_format($total_harga, 0, ',', '.') ?></span></li>
    </ul>
    <a href="<?= base_url('cart/transaksi') ?>" class="primary-btn">Proceed to checkout</a> 
</div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->