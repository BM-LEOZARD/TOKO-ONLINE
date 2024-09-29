<?php 

session_start();
include '../koneksi/koneksi.php';

$id_produk = $_GET['idproduk'];

$ambil = $koneksi->query("SELECT * FROM produk");
$produk = $ambil->fetch_assoc();

$produkfoto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($pecah = $ambil->fetch_assoc())
{
  $produkfoto[] = $pecah;
}

$produk_foto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk' LIMIT 1");
while($tiap = $ambil->fetch_assoc())
{
    $produk_foto[]=$tiap;
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

    <title>BM Store</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->

    <?php

      include 'include/navbar.php';

    ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.html" class="breadcrumb__link">Beranda</a></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Details Produk</span></li>
        </ul>
      </section>

      <!--=============== DETAILS ===============-->
      <section class="details section--lg">
        <div class="details__container container grid">
          <div class="details__group">
            <?php foreach ($produk_foto as $key => $value): ?>
              <img src="../assets/foto produk/<?php echo $value['nama_produk_foto']; ?>" class="details__img">
              <div class="details__small-images grid">
                <?php foreach ($produkfoto as $key => $value): ?>
                  <img src="../assets/foto produk/<?php echo $value['nama_produk_foto']; ?>" alt="#" class="details__small-img">
                <?php endforeach ?>
              </div>
            <?php endforeach ?>
          </div>
          <div class="details__group">
            <h3 class="details__title">Henley Shirt</h3>
            <p class="details__brand">Brand: <span></span></p>
            <div class="details__price flex">
              <span class="new__price">Rp<?php echo number_format($produk['harga_produk']); ?></span>
            </div>
            <p class="short__description">
            </p>
            <ul class="products__list">
              <li class="list__item flex">
                <i class="fi-rs-crown"></i> 1 Year Al Jazeera Brand Warranty
              </li>
              <li class="list__item flex">
                <i class="fi-rs-refresh"></i> 30 Days Return Policy
              </li>
              <li class="list__item flex">
                <i class="fi-rs-credit-card"></i> Cash on Delivery available
              </li>
            </ul>
            <div class="details__size flex">
              <span class="details__size-title">Size</span>
              <ul class="size__list">
                <li>
                  <a href="#" class="size__link size-active">M</a>
                </li>
                <li>
                  <a href="#" class="size__link">L</a>
                </li>
                <li>
                  <a href="#" class="size__link">XL</a>
                </li>
                <li>
                  <a href="#" class="size__link">XXL</a>
                </li>
              </ul>
            </div>
            <div class="details__size flex">
              <span class="details__size-title">Jumlah :</span>
              <input type="number" name="jumlah" class="quantity" value="1" min="1" max="<?php echo $produk['stock_produk']; ?>">
            </div>
            <div class="details__action">
              <a href="#" class="btn btn--sm">Beli Sekarang</a>
              <a href="belanja.php?idproduk=<?php echo $value['id_produk']; ?>" class="action__btn" aria-label="Tambah Ke Keranjang">
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
              <a href="#" class="details__action-btn">
                <i class="fi fi-rs-heart"></i>
              </a>
            </div>
            <div class="details__meta">
              <li class="meta__list flex">
                <span>Kategori:</span><input disabled type="text" name="nama" class="form-control" value="">
              </li>
              <li class="meta__list flex">
                <span>Stock:</span><input disabled class="form-control" value="<?php echo $produk['stock_produk']; ?>">
              </li>
            </div>
          </div>
        </div>
      </section>

      <?php
      
      if(isset($_POST['belanja']))
      {
        $jumlah = $_POST['jumlah'];

        $_SESSION['keranjang_belanja'][$id_produk] = $jumlah;

        echo "<script>alert('Produk Berhasil Masuk Ke Keranjang');</script>";
        echo "<script>location='keranjang.php';</script>";
      }

      ?>
      
      <!--=============== DETAILS TAB ===============-->
      <section class="details__tab container">
        <div class="detail__tabs">
          <span class="detail__tab active-tab" data-target="#info">
            Deskripsi Produk
          </span>
          <span class="detail__tab" data-target="#reviews">Reviews(3)</span>
        </div>
        
        <div class="card detail">
          <div class="card-body">
            <table class="info__table">
              <tr>
                <?php echo $produk['deskripsi_produk']; ?>
              </tr>
            </table>
          </div>
          <div class="details__tab-content" content id="reviews">
            <div class="reviews__container grid">
              <div class="review__single">
                <div>
                  <img
                    src="./assets/img/avatar-1.jpg"
                    alt=""
                    class="review__img"
                  />
                  <h4 class="review__title">Jacky Chan</h4>
                </div>
                <div class="review__data">
                  <div class="review__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <p class="review__description">
                    Thank you, very fast shipping from Poland only 3days.
                  </p>
                  <span class="review__date">December 4, 2022 at 3:12 pm</span>
                </div>
              </div>
              <div class="review__single">
                <div>
                  <img
                    src="./assets/img/avatar-2.jpg"
                    alt=""
                    class="review__img"
                  />
                  <h4 class="review__title">Meriem Js</h4>
                </div>
                <div class="review__data">
                  <div class="review__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <p class="review__description">
                    Great low price and works well
                  </p>
                  <span class="review__date">August 23, 2022 at 19:45 pm</span>
                </div>
              </div>
              <div class="review__single">
                <div>
                  <img
                    src="./assets/img/avatar-3.jpg"
                    alt=""
                    class="review__img"
                  />
                  <h4 class="review__title">Moh Benz</h4>
                </div>
                <div class="review__data">
                  <div class="review__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <p class="review__description">
                    Authentic and beautiful, Love these ways more than ever
                    expected, They are great earphones.
                  </p>
                  <span class="review__date">March 2, 2021 at 10:01 am</span>
                </div>
              </div>
            </div>
            <div class="review__form">
              <h4 class="review__form-title">Add a review</h4>
              <div class="rate__product">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <form action="" class="form grid">
                <textarea
                  class="form__input textarea"
                  placeholder="Write Comment"
                ></textarea>
                <div class="form__group grid">
                  <input type="text" placeholder="Name" class="form__input">
                  <input type="email" placeholder="Email" class="form__input">
                </div>
                <div class="form__btn">
                  <button class="btn">Submit Review</button>
                </div>
              </form>
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
