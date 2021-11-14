<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
    <center>
        <h2 style="color:white; margin-top:90px">C E K&nbsp&nbsp&nbsp&nbspT O T A L</h2>
        <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    </center>
    <div class='container' style="font-size:30px;color:white">
        <form action='<?php echo MYURL; ?>/history/cek' method="post">
            <div class="form-group">
                <center><input type='date' style="font-size:30px;" name="tanggal" id="tanggal"></center>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary float-left" style="font-size:20px;" data-toggle="modal" data-target="#formDetail">Cek</button>
                <a href="<?php echo MYURL; ?>/history" class="btn btn-secondary float-left" style="font-size:20px;" data-dismiss="modal">Tutup</a>
            </div>
        </form>
        <?php if ($data['cek'] != 0) : ?>
            <?php $total = 0;
            $count = 0;
            foreach ($data['cek'] as $temp) : ?>
                <?php $total += $temp['total'];
                $count++; ?>
            <?php endforeach ?>
            Total Transaksi Tanggal : <b><?php echo $data['tanggal']; ?></b>
            &nbsp&nbsp&nbspSebesar : Rp. <?php echo $total; ?>
            &nbsp&nbsp&nbspJumlah Transaksi : <?php echo $count; ?>
        <?php endif ?>
        <center><img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
            <h2 style='color:white; margin-bottom:90px, font-size=10px;'><i>~~~Satu Langkah Kecil Dari Sebuah Niat Baik Mampu Membawa Kita Menuju Sesuatu Yang Di Luar Imajinasi~~~</i></h2>
        </center>
    </div>
</body>