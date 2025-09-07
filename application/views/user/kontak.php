    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
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
            <div class="contact__address">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Alamat</h6>
                            <ul>
                                <li><span class="icon_pin_alt"></span>
                                    <p>Jl. Merdeka No. 10, Jakarta Pusat, Indonesia</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Kontak</h6>
                            <ul>
                                <li><span class="icon_headphones"></span>
                                    <p>+62 812-3456-7890</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Email & Sosial Media</h6>
                            <ul>
                                <li><span class="icon_mail_alt"></span>
                                    <p>support@namabisnis.com</p>
                                </li>
                                <li><span class="icon_social_facebook"></span>
                                    <p>@namabisnis</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Contak dengan kita</h3>
                        <ul>
                            <li>Pelayanan kami selalu tersedia</li>
                            <li>Setiap Hari: 5:00am to 9:00pm</li>
                            
                        </ul>
                        <img src="img/cake-piece.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">
                        <form id="waForm">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" id="name" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea id="message" placeholder="Message" required></textarea>
                                    <button type="submit" class="site-btn">Send Us</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            document.getElementById("waForm").addEventListener("submit", function(e) {
                e.preventDefault();

                let name = document.getElementById("name").value;
                let email = document.getElementById("email").value;
                let message = document.getElementById("message").value;

                let phone = "6281234567890"; // Ganti dengan nomor WA kamu (pakai format internasional tanpa +)
                let text = `Halo, saya *${name}* (${email}) ingin bertanya:%0A${message}`;

                let url = `https://wa.me/${phone}?text=${text}`;
                window.open(url, "_blank");
            });
            </script>

        </div>
    </section>
    <!-- Contact Section End -->