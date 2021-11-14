<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
  <center>
    <h2 style="color:white; margin-top:90px"><?php echo $data['karyawan']['nama_karyawan']; ?></h2>
    <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
    <div class='container'>
      <div class="card" style="max-width: 540px;background-color:transparent; color:white;text-align:left;font-size:20px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?php echo MYURL; ?>/img/profile-default.jpg" width=150 height=150 class="rounded-circle">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['karyawan']['nama_karyawan']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Detail</h6>
              <p class="card-text">Alamat : <?php echo $data['karyawan']['alamat']; ?></p>
              <p class="card-text">No. Telepon : <?php echo $data['karyawan']['notelp']; ?></p>
              <p class="card-text">Jabatan : <?php echo $data['karyawan']['jabatan']; ?></p>
              <p class="card-text">Gaji : Rp.<?php echo $data['karyawan']['gaji']; ?></p>
              <a href="<?php echo MYURL; ?>/karyawan/password/<?php echo $data['karyawan']['id']; ?>" class="badge badge-primary" data-toggle="modal" data-target="#formPassword" data-id="<?php echo $data['karyawan']['id']; ?>">Konfigurasi Password</a>
              <a href="<?php echo MYURL; ?>/karyawan/hapus/<?php echo $data['karyawan']['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin Dihapus?';">Hapus</a>
              <a href="<?php echo MYURL; ?>/karyawan" class="badge badge-warning">kembali</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </center>
</body>

<div class="modal fade" id="formPassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfigurasi Password</h5>
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