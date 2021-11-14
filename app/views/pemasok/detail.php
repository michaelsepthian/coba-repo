<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">D E T A I L</h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>
    <div class="container">
        <div class="col mb-4">
            <a href="<?php echo MYURL; ?>/pemasok" type="button" class="btn btn-primary ">
                Kembali
            </a>
        </div>
        <div class="card" style="background-color:transparent;">
            <table style="color:white;font-size:20px;">
                <tr>
                    <th style="padding-left:20px">No</th>
                    <th>Pemasok</th>
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
                    <tr>
                        <td style="padding-left:20px"><?php echo $no; ?></td>
                        <td><?php echo $histori['pemasok']; ?></td>
                        <td><?php echo $histori['makanan']; ?></td>
                        <td><?php echo $histori['qty']; ?></td>
                        <td><?php echo $histori['catatan']; ?></td>
                        <td><?php echo $histori['tanggal']; ?></td>
                        <?php if ($histori['status_order'] == 0) : ?>
                            <td>Sedang Proses</td>
                        <?php else : ?>
                            <td>Selesai</td>
                        <?php endif ?>
                    <tr>
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
                    <?php $no++; ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>