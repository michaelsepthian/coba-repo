<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">O R D E R <?php echo $data['pemasok']; ?></h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>

    <div class="container" style="color:white;">
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <form action="<?php echo MYURL; ?>/pemasok/simpan_order" method="post">
            <input type="hidden" id="pemasok" name="pemasok" value="<?php echo $data['pemasok']; ?>">
            <div class="form-group">
                <label>Nama Makanan</label>
                <select class="form-control" id="makanan" name="makanan">
                    <?php foreach ($data['makanan'] as $makanan) : ?>
                        <option value="<?php echo $makanan['nama']; ?>"><?php echo $makanan['nama']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <label>qty</label>
            <div class="form-group">
                <input type="text" class="form-control" id="qty" name="qty" autocomplete="off">
            </div>
            <label>Catatan</label>
            <div class="form-group">
                <textarea name="catatan" class="form-control" rows="5" cols="70" placeholder="Masukkan Catatan Untuk Pemasok"></textarea>
            </div>
            <button type="submit" id="submit" name="Submit" class="btn btn-primary mr-2 mt-3">Submit</button>
            <a href="<?php echo MYURL; ?>/pemasok" type="button" class="btn btn-secondary mr-2 mt-3">Tutup</a>
        </form>
        <h2>Histori</h2>
        <div class="card" style="background-color:transparent;">
            <table style="color:white;">
                <tr>
                    <th style="padding-left:20px">No</th>
                    <th>Makanan</th>
                    <th>qty</th>
                    <th>Catatan</th>
                    <th>Tanggal</th>
                    <th>status</th>
                    <th></th>
                </tr>
                <tr>
                <th>
                    <th><hr></th>
                    <th><hr></th>
                    <th><hr></th>
                    <th><hr></th>
                    <th><hr></th>
                    <th><hr></th>
                    <th><hr></th>
                    <th><hr></th>
                </tr>
                <?php $no = 1;
                foreach ($data['histori'] as $histori) : ?>
                    <?php if ($histori['pemasok'] == $data['pemasok']) : ?>
                        <tr>
                            <td style="padding-left:20px"><?php echo $no; ?></td>
                            <td><?php echo $histori['makanan']; ?></td>
                            <td><?php echo $histori['qty']; ?></td>
                            <td><?php echo $histori['catatan']; ?></td>
                            <td><?php echo $histori['tanggal']; ?></td>
                            <?php if ($histori['status_order'] == 0) : ?>
                                <td>Sedang Proses</td>
                                <td><a href="<?php echo MYURL; ?>/pemasok/selesai/<?php echo $histori['id']; ?>" class="btn btn-primary float-center" style="background-color: #783c00; border-color:white">Selesai</a></td>
                            <?php else : ?>
                                <td>Selesai</td>
                                <td>-</td>
                            <?php endif ?>
                        <tr>
                        <tr>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                            <th><hr></th>
                        </tr>
                        <?php $no++; ?>
                    <?php endif ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>