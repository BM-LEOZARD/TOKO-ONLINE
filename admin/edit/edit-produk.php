<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Edit Produk</b></h5>
</div>

<?php

$id_produk = $_GET['idproduk'];
$id_foto = $_GET['idfoto'];

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc())
{
    $kategori[] = $pecah;
}

$ambil = $koneksi->query("SELECT * FROM produk_foto JOIN produk
ON produk_foto.id_produk=produk.id_produk
WHERE id_produk_foto='$id_produk'");
$editfoto = $ambil->fetch_assoc();

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori
ON produk.id_kategori=kategori.id_kategori
WHERE id_produk='$id_produk'");
$edit = $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
            
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control">

                        <option value="<?php echo $edit['id_kategori']; ?>">
                            <?php echo $edit['nama_kategori']; ?>
                        </option>

                        <?php foreach ($kategori as $key => $value): ?>
                            <option value="<?php echo $value['id_kategori']; ?>">
                                <?php echo $value['nama_kategori']; ?>
                            </option>
                        <?php endforeach ?>  
                    </select>    
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?php echo $edit['nama_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Harga Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="harga" class="form-control" value="<?php echo $edit['harga_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Berat Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="berat" class="form-control" value="<?php echo $edit['berat_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Produk :</label>
                <div class="col-sm-9">
                    <img src="../assets/foto produk/<?php echo $edit['foto_produk']; ?>" width="150">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi Produk :</label>
                <div class="col-sm-9">
                    <textarea type="text" name="deskripsi" class="form-control"><?php echo $edit['deskripsi_produk']; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Stock Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="stock" class="form-control" value="<?php echo $edit['stock_produk']; ?>">
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

<?php

if(isset($_POST['simpan']))
{
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    //Jika foto produk diubah
    if(!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "../assets/foto produk/" . $namafoto);

        $koneksi->query("UPDATE produk SET
        id_kategori = '$id_kategori',
        nama_produk = '$nama',
        harga_produk = '$harga',
        berat_produk = '$berat',
        foto_produk = '$namafoto',
        deskripsi_produk = '$deskripsi',
        stock_produk = '$stock'
        WHERE id_produk = '$id_produk'");
    }

    //Jika foto produk tidak diubah
    else
    {
        $koneksi->query("UPDATE produk SET
        id_kategori = '$id_kategori',
        nama_produk = '$nama',
        harga_produk = '$harga',
        berat_produk = '$berat',
        deskripsi_produk = '$deskripsi',
        stock_produk = '$stock'
        WHERE id_produk = '$id_produk'");
    }

    $namaprodukfoto = $_FILES['foto']['name'];
    $lokasiprodukfoto = $_FILES['foto']['tmp_name'];

    if(!empty($lokasiprodukfoto))
    {
        move_uploaded_file($lokasiprodukfoto, "../assets/foto produk/" . $namaprodukfoto);

        $koneksi->query("UPDATE produk_foto SET
        id_produk = '$id_produk',
        nama_produk_foto = '$namaprodukfoto'
        WHERE id_produk_foto = '$id_foto'");
    }
    else
    {
        $koneksi->query("UPDATE produk_foto SET
        id_produk = '$id_produk'
        WHERE id_produk_foto = '$id_foto'");
    }
    

    
    echo "<script>alert('Data Berhasil Diedit');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";

}

?>