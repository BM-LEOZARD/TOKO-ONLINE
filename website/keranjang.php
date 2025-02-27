<?php 

session_start();
include '../koneksi/koneksi.php';

if(empty($_SESSION['keranjang_belanja'] OR !isset($_SESSION['keranjang_belanja'])))
{
  echo "<script>location='shop.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css"
    />

    <!--=============== SWIPER CSS ===============-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/styles2.css" />

    <title>Ecommerce Website</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header">

      <nav class="nav container">
        <a href="index.php" class="nav__logo">
          <img
            class="nav__logo-img"
            src="assets/img/logo.svg"
            alt="website logo"
          />
        </a>
        <div class="nav__menu" id="nav-menu">
          <div class="nav__menu-top">
            <a href="index.php" class="nav__menu-logo">
              <img src="./assets/img/logo.svg" alt="">
            </a>
            <div class="nav__close" id="nav-close">
              <i class="fi fi-rs-cross-small"></i>
            </div>
          </div>
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.php" class="nav__link active-link">Home</a>
            </li>
            <li class="nav__item">
              <a href="shop.php" class="nav__link">Shop</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">Tentang Kami</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">Kontak</a>
            </li>
          </ul>
          <div class="header__search">
            <input
              type="text"
              placeholder="Search For Items..."
              class="form__input"
            />
            <button class="search__btn">
              <img src="assets/img/search.png" alt="search icon" />
            </button>
          </div>
        </div>
        <div class="header__user-actions">
          <a href="#" class="header__action-btn" title="notifikasi">
            <img src="assets/img/icon-notifikasi.svg" alt="" />
          </a>
          <a href="wishlist.php" class="header__action-btn" title="Wishlist">
            <img src="assets/img/icon-heart.svg" alt="" />
            <span class="count">3</span>
          </a>
          <a href="keranjang.php" class="header__action-btn" title="Cart">
            <img src="assets/img/icon-cart.svg" alt="" />
            <span class="count">3</span>
          </a>
          <a href="login-register.php" class="header__action-btn" title="account">
            <img src="assets/img/icon-account.svg" alt="" />
          </a>
          <div class="header__action-btn nav__toggle" id="nav-toggle">
            <img src="./assets//img/menu-burger.svg" alt="">
          </div>
        </div>
      </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.html" class="breadcrumb__link">Beranda</a></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Keranjang</span></li>
        </ul>
      </section>

      <!--=============== CART ===============-->
      <section class="cart section--lg container">
       <p class="total__products">Anda Mempunyai <span>10</span> items Di Dalam Keranjang Anda</p>
        <div class="table__container">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
               foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah
                ):
                $ambil = $koneksi->query("SELECT * FROM produk 
                WHERE id_produk='$id_produk' ");
                $pecah = $ambil->fetch_assoc();
                $subtotal = $pecah['harga_produk']*$jumlah;
              ?>
                <tr>
                  <td width="50px"><?php echo $no++; ?></td>
                  <td>
                    <img src="../assets/foto produk/<?php echo $pecah['foto_produk']; ?>" width="100">
                  </td>
                  <td><?php echo $pecah['nama_produk']; ?></td>
                  <td><?php echo $jumlah; ?></td>
                  <td>Rp<?php echo number_format($pecah['harga_produk']); ?></td>
                  <td>Rp<?php echo number_format($subtotal); ?></td>
                  <td>
                    <a href="hapus-keranjang.php?idproduk=<?php echo $pecah['id_produk']; ?>"><i class="fi fi-rs-trash table__trash"></i></a>
                  </td>
                </tr>
                <?php endforeach ?>
            </tbody>
          </table>
        </div>

        <div class="cart__actions">
          <a href="#" class="btn flex btn__md">
            <i class="fi-rs-shuffle"></i> Checkout
          </a>
          <a href="shop.php" class="btn flex btn__md">
            <i class="fi-rs-shopping-bag"></i> Kembali Belanja
          </a>
        </div>

        <div class="divider">
          <i class="fi fi-rs-fingerprint"></i>
        </div>

        <div class="cart__group grid">
          <div>
            <div class="cart__shippinp">
              <h3 class="section__title">Calculate Shipping</h3>
              <form action="" class="form grid">
                <input
                  type="text"
                  class="form__input"
                  placeholder="State / Country"
                />
                <div class="form__group grid">
                  <input type="text" class="form__input" placeholder="City" />
                  <input
                    type="text"
                    class="form__input"
                    placeholder="PostCode"
                  />
                </div>
                <div class="form__btn">
                  <button class="btn flex btn--sm">
                    <i class="fi-rs-shuffle"></i> Update
                  </button>
                </div>
              </form>
            </div>
            <div class="cart__coupon">
              <h3 class="section__title">Apply Coupon</h3>
              <form action="" class="coupon__form form grid">
                <div class="form__group grid">
                  <input
                    type="text"
                    class="form__input"
                    placeholder="Enter Your Coupon"
                  />
                  <div class="form__btn">
                    <button class="btn flex btn--sm">
                      <i class="fi-rs-label"></i> Aplly
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="cart__total">
            <h3 class="section__title">Cart Totals</h3>
            <table class="cart__total-table">
                <tr>
                  <td><span class="cart__total-title">Cart Subtotal</span></td>
                  <td><span class="cart__total-price">$240.00</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Shipping</span></td>
                  <td><span class="cart__total-price">$10.00</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Total</span></td>
                  <td><span class="cart__total-price">$250.00</span></td>
                </tr>
            </table>
            <a href="checkout.html" class="btn flex btn--md">
              <i class="fi fi-rs-box-alt"></i> Proceed To Checkout
            </a>
          </div>
        </div>
      </section>

      <!--=============== NEWSLETTER ===============-->
      <section class="newsletter section">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
            <img
              src="./assets/img/icon-email.svg"
              alt=""
              class="newsletter__icon"
            />
            Sign in to Newsletter
          </h3>
          <p class="newsletter__description">
            ...and receive $25 coupon for first shopping.
          </p>
          <form action="" class="newsletter__form">
            <input
              type="text"
              placeholder="Enter Your Email"
              class="newsletter__input"
            />
            <button type="submit" class="newsletter__btn">Subscribe</button>
          </form>
        </div>
      </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.html" class="footer__logo">
            <img src="./assets/img/logo.svg" alt="" class="footer__logo-img" />
          </a>
          <h4 class="footer__subtitle">Contact</h4>
          <p class="footer__description">
            <span>Address:</span> 13 Tlemcen Road, Street 32, Beb-Wahren
          </p>
          <p class="footer__description">
            <span>Phone:</span> +01 2222 365 /(+91) 01 2345 6789
          </p>
          <p class="footer__description">
            <span>Hours:</span> 10:00 - 18:00, Mon - Sat
          </p>
          <div class="footer__social">
            <h4 class="footer__subtitle">Follow Me</h4>
            <div class="footer__links flex">
              <a href="#">
                <img
                  src="./assets/img/icon-facebook.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-twitter.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-instagram.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-pinterest.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-youtube.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
            </div>
          </div>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Address</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">About Us</a></li>
            <li><a href="#" class="footer__link">Delivery Information</a></li>
            <li><a href="#" class="footer__link">Privacy Policy</a></li>
            <li><a href="#" class="footer__link">Terms & Conditions</a></li>
            <li><a href="#" class="footer__link">Contact Us</a></li>
            <li><a href="#" class="footer__link">Support Center</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">My Account</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Sign In</a></li>
            <li><a href="#" class="footer__link">View Cart</a></li>
            <li><a href="#" class="footer__link">My Wishlist</a></li>
            <li><a href="#" class="footer__link">Track My Order</a></li>
            <li><a href="#" class="footer__link">Help</a></li>
            <li><a href="#" class="footer__link">Order</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Secured Payed Gateways</h3>
          <img
            src="./assets/img/payment-method.png"
            alt=""
            class="payment__img"
          />
        </div>
      </div>
      <div class="footer__bottom">
        <p class="copyright">&copy; 2024 Evara. All right reserved</p>
        <span class="designer">Designer by Crypticalcoder</span>
      </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
