<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Tambah Produk</b></h5>
</div>

<?php

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc())
{
    $kategori[]=$pecah;
}

?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control" required>
                        <option selected disabled>Pilih Nama Kategori</option>
                        <?php foreach ($kategori as $key => $value): ?>
                            <option value="<?php echo $value['id_kategori']; ?>">
                            <?php echo $value['nama_kategori']; ?>
                            </option>
                            <?php endforeach ?>
                    </select>
                <div> 
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Produk" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tambah Harga :</label>
                <div class="col-sm-9">
                    <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Produk" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Berat Produk :</label>
                <div class="col-sm-9">
                    <input type="number" name="berat" class="form-control" placeholder="Masukan Berat Produk" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Produk :</label>
                <div class="col-sm-9">
                    <input type="file" name="foto" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi Produk :</label>
                <div class="col-sm-9">
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi Produk" required></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Stock Produk :</label>
                <div class="col-sm-9">
                    <input type="number" name="stock" class="form-control" placeholder="Masukan Stock Produk" required>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-11">
                    <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="index.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>

    </div>
</form>