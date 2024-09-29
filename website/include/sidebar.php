<?php 

include '../koneksi/koneksi.php';

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc())
{
    $kategori[]=$pecah;
}

?>

<section class="categories container section">
    <h3 class="section__title"><span>Kategori</span> Produk</h3>
    <div class="categories__container swiper">
        <div class="swiper-wrapper">
            <?php foreach ($kategori as $key => $value): ?>
                <a href="shop.php?idkategori=<?php echo $value['id_kategori']; ?>" class="category__item swiper-slide">
                  <?php echo $value['nama_kategori']; ?>
                </a>
            <?php endforeach ?>
                <a href="shop.php" class="category__item swiper-slide">
                    Semua Produk
                </a>
        </div>

        <div class="swiper-button-prev">
        <i class="fi fi-rs-angle-left"></i>
        </div>
        <div class="swiper-button-next">
        <i class="fi fi-rs-angle-right"></i>
        </div>
    </div>
    </section>