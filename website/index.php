<?php 

session_start();
include '../koneksi/koneksi.php';

$produk = array();

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori
ON  produk.id_kategori=kategori.id_kategori LIMIT 20");

while($pecah = $ambil->fetch_assoc())
{
  $produk[]=$pecah;
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
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/styles2.css" />

    <title>BM Store</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->

    <?php

    include 'include/navbar.php';

    ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      
      <!--=============== HOME ===============-->
      <section class="home section--lg">
        <div class="home__container container grid">
          <div class="home__content">
            <span class="home__subtitle">Hot Promotions</span>
            <h1 class="home__title">
              Fashion Trending <span>Great Collection</span>
            </h1>
            <p class="home__description">
              Save more with coupons & up tp 20% off
            </p>
            <a href="shop.php" class="btn">Shop Now</a>
          </div>
          <img src="../img produk/img/banner.png" class="home__img" alt="hats" />
        </div>
      </section>

      <!--=============== CATEGORIES ===============-->

      <?php 

        include 'include/sidebar.php';

      ?>

      <!--=============== PRODUCTS ===============-->
      <section class="products container section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-title">
                <h1>Produk</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="tab__items">
          <div class="tab__item active-tab" content id="featured">
            <div class="products__container grid">
              <?php foreach ($produk as $key => $value): ?>
                <div class="product__item">
                  <div class="product__banner">
                    <a href="details.php" class="product__images">
                      <img
                        src="../assets/foto produk/<?php echo $value['foto_produk'];?>"
                      />
                    </a>
                    <div class="product__actions">
                      <a href="details.php?idproduk=<?php echo $value['id_produk']; ?>" class="action__btn" aria-label="Detail Produk">
                        <i class="fi fi-rs-eye"></i>
                      </a>
                      <a
                        href="#"
                        class="action__btn"
                        aria-label="Add to Wishlist"
                      >
                        <i class="fi fi-rs-heart"></i>
                      </a>
                      <a
                        href="belanja.php?idproduk=<?php echo $value['id_produk']; ?>"
                        class="action__btn"
                        aria-label="Add To Cart"
                      >
                        <i class="fi fi-rs-shopping-bag-add"></i>
                      </a>
                      <a href="#" class="action__btn" aria-label="Compare">
                        <i class="fi fi-rs-shuffle"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product__content">
                    <span class="product__category">Clothing</span>
                      <h5><?php echo $value['nama_produk']; ?></h5>
                    <div class="product__rating">
                    </div>
                    <div class="product__price flex">
                      <p>Rp<?php echo number_format($value['harga_produk']); ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </section>

      <!--=============== NEWSLETTER ===============-->

        <?php

        include 'include/letter.php';

        ?>

    </main>

      <!--=============== FOOTER ===============-->
        <?php

        include 'include/footer.php';

        ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/main2.js"></script>
  </body>
</html>
