<table>
    <tr>
        <?php foreach ($data['karyawan'] as $karyawan) : ?>
            <?php if ($karyawan['id'] == $data['payment']['id_karyawan']) : ?>
                <td><b>Nama Kasir : </b><?php echo $karyawan['nama_karyawan']; ?></td>
            <?php endif ?>
        <?php endforeach ?>
    </tr>
    <tr>
        <td><b>Waktu : </b><?php echo $data['payment']['waktu']; ?></td>
        <td><b>Tanggal : </b><?php echo $data['payment']['tanggal']; ?></td>
    </tr>
    <tr>
        <td><b>Nama Customer :</b>
            <?php foreach ($data['customer'] as $customer) : ?>
                <?php foreach ($data['order'] as $order) : ?>
                    <?php if ($order['id_customer'] == $customer['id']) : ?>
                        <?php echo $customer['nama'];
                        break; ?>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </td>
    </tr>
    <tr>
        <td><b>Tipe Pembayaran : </b><?php echo $data['payment']['tipe']; ?></td>
    </tr>
</table>
<b>------------------------------------------------------------------------</b>
<table>
    <tr>
        <th>Nama Menu</th>
        <th>
            <center>qty</center>
        </th>
        <th>Harga</th>
    </tr>
    <?php $total = 0;
    foreach ($data['order'] as $order) : ?>
        <tr>
            <td>
                <?php echo $order['nama_menu']; ?><br>
                <p class="text-muted"><?php echo $order['tambahan']; ?></p>
            </td>
            <td>
                <center><?php echo $order['qty']; ?></center>
            </td>
            <td>
                Rp. <?php echo $order['harga']; ?>
                <?php $total += $order['qty'] * $order['harga']; ?>
            </td>
        </tr>
    <?php endforeach ?>
    <tr>
        <th></th>
        <th>....................</th>
        <th>....................</th>
    </tr>
    <tr>
        <th></th>
        <th>Total </th>
        <td><b>Rp.<?php echo $total; ?></b></td>
    </tr>
</table>
<b>------------------------------------------------------------------------</b>
<a href="#" class="btn btn-success ml-5 float-right" style="background-color: #783c00; border-color:white">Print</a>