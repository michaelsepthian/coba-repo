<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">P E M A S O K</h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col mb-4">
                <button type="button" class="btn btn-primary tambahPemasok" data-toggle="modal" data-target="#formPemasok">
                    Tambah Pemasok
                </button>
                <a href='<?php echo MYURL; ?>/pemasok/detail' type="button" class="btn btn-primary">
                    Cek Orderan
                </a>
            </div>
        </div>
        <div class="col mb-6">
            <div class="card" style="background-color:transparent;">
                <table style="color:white;font-size:20px">
                    <tr>
                        <th style="padding-left:20px">No</th>
                        <th>Nama Karyawan</th>
                        <th>Alamat</th>
                        <th>No.TELP</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th><hr></th>
                        <th><hr></th>
                        <th><hr></th>
                        <th><hr></th>
                        <th><hr></th>
                        <th><hr></th>
                        <th><hr></th>
                    </tr>
                    <?php $no = 1;
                    foreach ($data['pemasok'] as $pemasok) : ?>
                        <tr>
                            <td style="padding-left:20px"><?php echo $no; ?></td>
                            <td><?php echo $pemasok['nama']; ?></td>
                            <td><?php echo $pemasok['alamat']; ?></td>
                            <td><?php echo $pemasok['notelp']; ?></td>
                            <td>
                            <td><a href="<?php echo MYURL; ?>/pemasok/order/<?php echo $pemasok['nama']; ?>" class="btn btn-primary float-center " style="background-color: #783c00; border-color:white">Order</a></td>
                            </td>
                            <td><a href="<?php echo MYURL; ?>/pemasok/detail/<?php echo $pemasok['id']; ?>" class="btn btn-warning float-center ubahPemasok" data-toggle="modal" data-target="#formPemasok" data-id="<?php echo $pemasok['id']; ?>">Ubah</a></td>
                            <td><a href="<?php echo MYURL; ?>/pemasok/delete/<?php echo $pemasok['id']; ?>" onclick="return confirm('Apakah benar ingin menghapus?');" class="btn btn-danger float-center">Hapus</a></td>
                        <tr>
                        <tr>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</body>

<div class="modal fade" id="formPemasok" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo MYURL; ?>/pemasok/tambah" method="post">
                    <input type='hidden' name='id' id='id'>
                    <div class="form-group">
                        <label for="namaLabel">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pemasok">
                    </div>
                    <div class="form-group">
                        <label for="alamatLabel">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="nomorTelpLabel">No. Telepon</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan Nomor Telepon">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>