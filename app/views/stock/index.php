<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">S T O K</h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary tombolTambahMenu" data-toggle="modal" data-target="#formMenu">
                    Tambah Menu
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo MYURL; ?>/stock/cari" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Menu" aria-label="Cari Menu" aria-describedby="button-addon2" id="keyword" name="keyword" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" style="background-color: #783c00; border-color:#783c00" type="submit" id="submit">search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($data['menu'] as $menu) : ?>
                    <?php if ($menu['stok'] <= 10) : ?>
                        <div class="alert alert-danger" role="alert">
                            Stok <?php echo $menu['nama']; ?> : <a href="#" class="alert-link"><?php echo $menu['stok']; ?></a>. Cepat Pesan Ke Pemasok.
                        </div>
                    <?php elseif ($menu['stok'] <= 15) : ?>
                        <div class="alert alert-warning" role="alert">
                            Stok <?php echo $menu['nama']; ?> : <a href="#" class="alert-link"><?php echo $menu['stok']; ?></a>. Harus Siap - Siap Pesan.
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
        <div class="card" style="background-color:transparent;font-size:30px;">
            <table style="color:white;">
                <tr>
                    <th style="padding-left:20px">No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Update Stock</th>
                </tr>
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
                    <th>
                        <hr>
                    </th>
                </tr>
                <?php $no = 1;
                foreach ($data['menu'] as $menu) : ?>
                    <tr>
                        <td style="padding-left:20px"><?php echo $no; ?></td>
                        <td><?php echo $menu['nama']; ?></td>
                        <td>Rp. <?php echo $menu['harga']; ?></td>
                        <td><?php echo $menu['stok']; ?></td>
                        <td><a href="<?php echo MYURL; ?>/<?php echo $menu['nama']; ?>" class="badge badge-success ml-2 float-center tombolUpdate" data-toggle="modal" data-target="#formMenu" data-id="<?php echo $menu['nama']; ?>" style="background-color: #783c00; border-color:#783c00">Update</a></td>
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

<div class="modal fade" id="formMenu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo MYURL; ?>/stock/tambah" method="post">
                    <div class="form-group">
                        <label for="namaLabel">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Menu">
                    </div>
                    <div class="form-group">
                        <label for="hargaLabel">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="tipeLabel">Tipe</label>
                        <select class="form-control" id="tipe" name="tipe">
                            <option value="makanan">Makanan</option>
                            <option value="kopi">Kopi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stockLabel">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
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