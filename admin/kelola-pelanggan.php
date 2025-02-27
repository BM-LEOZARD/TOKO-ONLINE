<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Kelola-Pelanggan</b></h5>
</div>

<?php

$pelanggan = array();
$ambil = $koneksi->query("SELECT * FROM pelanggan");
while($pecah = $ambil->fetch_assoc())
{
    $pelanggan[] = $pecah;
}

?>

<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $key => $value): ?>
                <tr>
                    <td width="50"><?php echo $key+1 ?></td>
                    <td><?php echo $value['foto_pelanggan']; ?></td>
                    <td><?php echo $value['nama-lengkap_pelanggan']; ?></td>
                    <td><?php echo $value['nama-panggilan_pelanggan']; ?></td>
                    <td><?php echo $value['email_pelanggan']; ?></td>
                    <td><?php echo $value['no-telepon_pelanggan']; ?></td>
                    <td class ="text-center" width="150">
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
