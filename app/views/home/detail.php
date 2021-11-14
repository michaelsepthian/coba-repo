<center>
    <form action="<?php echo MYURL; ?>/home/order" method="post">
        <table>
            <tr>
                <?php if ($data['menu']['stok'] <= 10) : ?>
                    <div class="alert alert-danger" role="alert">
                        Stok <?php echo $data['menu']['nama']; ?> : <a href="#" class="alert-link"><?php echo $data['menu']['stok']; ?></a>. Cepat Cek Stok!
                    </div>
                <?php else : ?>
                    <div class="alert alert-info" role="alert">
                        Stok <?php echo $data['menu']['nama']; ?> : <a href="#" class="alert-link"><?php echo $data['menu']['stok']; ?></a>. Silahkan Order
                    </div>
                <?php endif ?>
            </tr>
            <tr>
                <input type="hidden" class="form-control" id="id_customer" name="id_customer" value="<?php echo $data['customer']['id']; ?>">
                <th><label>Nama Menu</label></th>
                <th><input type="text" class="form-control" id="nama" name="nama" readonly value="<?php echo $data['menu']['nama'] ?>" /></th>
            </tr>
            <tr>
            </tr>
            <tr>
                <th><label>Harga</label></th>
                <th><input type="text" class="form-control" id="harga" name="harga" readonly value="<?php echo $data['menu']['harga'] ?>" /></th>
            </tr>
            <tr>
            </tr>
            <tr>
                <th><label>qty</label></th>
                <th><input type="number" class="form-control" id="qty" name="qty" autocomplete="off"></th>
            </tr>
            <tr>
            </tr>
            <tr>
                <th><label>Tambahan</label></th>
                <th><input type="text" class="form-control" id="tambahan" name="tambahan" autocomplete="off"></th>
            </tr>
        </table>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="background-color: #b5651d; border-color:white">Tambah</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </form>
</center>