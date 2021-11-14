<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">K A R Y A W A N</h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>
    <div class='container'>
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="col mb-4">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formData">
                Tambah Karyawan
            </button>
        </div>
        <div class="card" style="background-color:transparent;">
            <table style="color:white;font-size:20px">
                <tr>
                    <th style="padding-left:20px">No</th>
                    <th>Nama Karyawan</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                </tr>
                <?php $no = 1;
                foreach ($data['karyawan'] as $krywn) : ?>
                    <tr>
                        <td style="padding-left:20px"><?php echo $no; ?></td>
                        <td><?php echo $krywn['nama_karyawan']; ?></td>
                        <td><a href="<?php echo MYURL; ?>/karyawan/detail/<?php echo $krywn['id']; ?>" class="btn btn-primary float-center" style="background-color: #783c00; border-color:white">Detail</a></td>
                        <td><a href="<?php echo MYURL; ?>/karyawan/detail/<?php echo $krywn['id']; ?>" class="btn btn-warning float-center tampilModalUbah" data-toggle="modal" data-target="#formData" data-id="<?php echo $krywn['id']; ?>">Ubah</a></td>
                    <tr>
                    <tr>
                        <th>
                            <hr>
                        </th>
                        <th>
                            <hr>
                        </th>
                        <th>
                            <hr>
                        </th>
                        <th>
                            <hr>
                        </th>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>

<div class="modal fade" id="formData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo MYURL; ?>/karyawan/tambah" method="post">
                    <input type='hidden' name='id' id='id'>
                    <div class="form-group">
                        <label for="namaLabel">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="umurLabel">Umur</label>
                        <input type="number" class="form-control" id="umur" name="umur">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="manager">Manager</option>
                            <option value="barista">Barista</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomorTelp">No. Telepon</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan Kontak Yang Dapat Dihubungi">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>