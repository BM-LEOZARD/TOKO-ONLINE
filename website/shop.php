<?php 

include '../koneksi/koneksi.php';

if(isset($_GET['idkategori']))
{
  $id_kategori = $_GET['idkategori'];

  $kategori_produk = array();

  $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori
  ON  produk.id_kategori=kategori.id_kategori 
  WHERE produk.id_kategori='$id_kategori' LIMIT 8");

  while($pecah = $ambil->fetch_assoc())
  {
    $kategori_produk[]=$pecah;
  }
}
else
{
  $produk = array();

  $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori
  ON  produk.id_kategori=kategori.id_kategori LIMIT 8");

  while($pecah = $ambil->fetch_assoc())
  {
    $produk[]=$pecah;
  }
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
          <li><a href="index.html" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Shop</span></li>
        </ul>
      </section>

      <!--=============== CATEGORIES ===============-->

      <?php 

      include 'include/sidebar.php';

      ?>

      <!--=============== PRODUCTS ===============-->
      <section class="products container section--lg">
        <div class="products__container grid">

          <?php if(isset($_GET['idkategori'])): ?>

            <?php foreach ($kategori_produk as $key => $value): ?>
              <div class="product__item">
                <div class="product__banner">
                  <a class="product__images">
                    <img
                      src="../assets/foto produk/<?php echo $value['foto_produk'];?>"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="details.php?idproduk=<?php echo $value['id_produk']; ?>" class="action__btn" aria-label="Quick View">
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

          <?php else: ?>

            <?php foreach ($produk as $key => $value): ?>
              <div class="product__item">
                <div class="product__banner">
                  <a class="product__images">
                    <img
                      src="../assets/foto produk/<?php echo $value['foto_produk'];?>"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="details.php?idproduk=<?php echo $value['id_produk']; ?>" class="action__btn" aria-label="Quick View">
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

          <?php endif; ?>

        </div>
        <ul class="pagination">
          <li><a href="#" class="pagination__link active">01</a></li>
          <li><a href="#" class="pagination__link">02</a></li>
          <li><a href="#" class="pagination__link">03</a></li>
          <li><a href="#" class="pagination__link">...</a></li>
          <li><a href="#" class="pagination__link">16</a></li>
          <li><a href="#" class="pagination__link icon">
            <i class="fi-rs-angle-double-small-right"></i>
          </a></li>
        </ul>
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
  </body>
</html>
