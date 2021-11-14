<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <div class='container mt-5'>
        <center>
            <h2 style="color:white; margin-top:90px">M E N U</h2>
            <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
        </center>
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col mb-4">
                <h3 class="mt-3" style="color:white;">K O P I</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <b>Nama Menu</b>
                        <b class="float-right mr-3">Pick</b>
                    </li>
                    <?php $order = null;
                    foreach ($data['menu'] as $menu) : ?>
                        <?php if ($menu['tipe'] == 'kopi') : ?>
                            <li class="list-group-item" style="background-color:transparent; color : white;">
                                <?php echo $menu['nama']; ?> ---
                                Rp.<?php echo $menu['harga']; ?>
                                <a href="<?php echo MYURL; ?>/<?php echo $menu['nama']; ?>" id="namaMenu" class="btn btn-primary float-right" data-toggle="modal" data-target="#formOrder" data-id="<?php echo $menu['nama']; ?>" style="background-color: #783c00; border-color:white">Order</a>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>

            </div>

            <div class="col mb-4">
                <h3 class="mt-3" style="color:white;">M A K A N A N</h3>
                <li class="list-group-item">
                    <b>Nama Menu</b>
                    <b class="float-right mr-3">Pick</b>
                </li>
                <ul class="list-group">
                    <?php foreach ($data['menu'] as $menu) : ?>
                        <?php if ($menu['tipe'] == 'makanan') : ?>
                            <li class="list-group-item" style="background-color:transparent; color : white;">
                                <?php echo $menu['nama']; ?> ---
                                Rp.<?php echo $menu['harga']; ?>
                                <a href="<?php echo MYURL; ?>/<?php echo $menu['nama']; ?>" id="namaMenu" class="btn btn-primary float-right" data-toggle="modal" data-target="#formOrder" data-id="<?php echo $menu['nama']; ?>" style="background-color: #783c00; border-color:white">Order</a>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            </div>

            <div class="col mb-6">
                <h3 class="mt-3" style="color:white;">O R D E R</h3>
                <table style="font-size:15px; color : white;">
                    <tr style="background-color:white; color:black;">
                        <th style="height :50px;">Nama Order</th>
                        <th>Catatan</th>
                        <th>
                            <center>Qty</center>
                        </th>
                        <th>
                            <center>Harga</center>
                        </th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($data['order'] as $order) : ?>
                        <?php if ($order['status_order'] == 0) : ?>
                            <tr style="margin-top:15px;">
                                <?php $total += $order['harga'] * $order['qty']; ?>
                                <td><?php echo $order['nama_menu']; ?></td>
                                <td><?php echo $order['tambahan']; ?></td>
                                <td><?php echo $order['qty']; ?></td>
                                <td>Rp.<?php echo $order['harga']; ?></td>
                                <td>Rp.<?php echo ($order['harga'] * $order['qty']); ?></td>
                                <td><a href="<?php echo MYURL; ?>/home/update/<?php echo $order['id']; ?>" class="badge badge-success ml-2" style="margin-bottom: 2px; background-color: white; border-color:#783c00;color:#783c00;">Update</a>
                                    <a href="<?php echo MYURL; ?>/home/delete/<?php echo $order['id']; ?>" onclick="return confirm('Apakah benar ingin menghapus?');" class="badge badge-danger ml-2 ">Delete</a></td>
                            </tr>
                            <?php $no++; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total</th>
                        <td>Rp.<?php echo $total; ?></td>
                        <th></th>
                    </tr>
                </table>
                <br>
                <center>
                    <a href="<?php echo MYURL; ?>/home/payment" class="btn btn-success" style="background-color: white; border-color:#783c00;color:#783c00;">Bayar</a>
                    <a href="<?php echo MYURL; ?>/home/cancel" onclick="return confirm('Apakah benar ingin cancel order?');" id="namaMenu" class="btn btn-danger">Cancel</a>
                </center>
            </div>
        </div>
        <center><img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
            <h2 style="color:white; margin-bottom:90px,font-size=10px;"><i>~~~Kurang Atau Lebih, Setiap Rezeki Perlu Dirayakan Dengan Secangkir Kopi~~~</i></h2>
        </center>
    </div>

    <div class="modal fade" id="formOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
</body>