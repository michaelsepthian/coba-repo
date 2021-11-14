<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">P E M B A Y A R A N</h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="card" style="background-color:transparent;">
            <div class="card-body" style="color:white;font-size:20px;">
                <form action="<?php echo MYURL; ?>/home/paymentSubmit" method="post">
                    <label>Kasir</label>
                    <div class="form-group">
                        <select class="form-control" id="kasir" name="kasir">
                            <?php foreach ($data['karyawan'] as $kasir) : ?>
                                <option value="<?php echo $kasir['id']; ?>"><?php echo $kasir['nama_karyawan']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <label>Masukkan Nama Customer</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                    </div>
                    <label for="tipe">Tipe</label>
                    <div class="form-group">
                        <select class="form-control" id="tipe" name="tipe">
                            <option value="TUNAI">TUNAI</option>
                            <option value="OVO">OVO</option>
                            <option value="BCA">BCA</option>
                            <option value="GOPAY">GOPAY</option>
                        </select>
                    </div>
                    <div class="col mb-6">
                        <h3 class="mt-3">List Order</h3>
                        <div class="card" style="background-color:transparent;">
                            <table style="color:white;font-size:20px;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Order</th>
                                    <th>Catatan</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                <?php $no = 1;
                                $total = 0;
                                foreach ($data['order'] as $order) : ?>
                                    <?php if ($order['status_order'] == 0) : ?>
                                        <tr style="margin-top:15px;">
                                            <?php $total += $order['harga'] * $order['qty']; ?>
                                            <input type="hidden" id="id_customer" name="id_customer" value="<?php echo $order['id_customer']; ?>">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $order['nama_menu']; ?></td>
                                            <input type="hidden" name="nama_menu[]" value="<?php echo $order['nama_menu']; ?>">
                                            <td><?php echo $order['tambahan']; ?></td>
                                            <td><?php echo $order['qty']; ?></td>
                                            <input type="hidden" name="qty[]" value="<?php echo $order['qty']; ?>">
                                            <td>Rp.<?php echo $order['harga']; ?></td>
                                            <td>Rp.<?php echo ($order['harga'] * $order['qty']); ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <label>Total</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="total" name="total" readonly value="<?php echo $total; ?>">
                        </div>
                        <label>Tunai</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="tunai" name="tunai">
                        </div>
                        <button type="submit" id="submit" name="Submit" class="btn btn-primary mr-2 mt-3">Submit</button>
                        <a href="<?php echo MYURL; ?>/home" type="button" class="btn btn-secondary mr-2 mt-3">Tutup</a>
                </form>
            </div>
        </div>
    </div>
</body>