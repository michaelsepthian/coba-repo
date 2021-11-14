<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
  <center>
    <h2 style="color:white; margin-top:90px">P R E S E N S I</h2>
    <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
  </center>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <br>
    <div class="row row-cols-1 row-cols-md-2">
      <form action="<?php echo MYURL; ?>/presensi/absen" method="post" style="color:white;">
        <div class="form-group" style="color:white;">
          <label for="namaLabel">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="passwordLabel">Kata Sandi</label>
          <input type="password" class="form-control" id="pass" name="pass" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #783c00; border-color:white">Absen</button>
      </form>
      <div class="col mb-6" style="color:white;">
        <h3 style="color:white;margin-top:-20px;">Daftar Absensi Karyawan</h3>
        <div class="card" style="background-color:transparent;">
          <table style="color:white;font-size:20px;">
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Jam</th>
              <th>Tanggal</th>
            </tr>
            <tr>
              <th><hr></th>
              <th><hr></th>
              <th><hr></th>
              <th><hr></th>
            </tr>
            <?php $no = 1;
            foreach ($data['daftar'] as $daftar) : ?>
              <?php foreach ($data['karyawan'] as $karyawan) : ?>
                <?php if ($karyawan['id'] == $daftar['id_karyawan']) : ?>
                  <tr>
                    <th><?php echo $no; ?></th>
                    <th><?php echo $karyawan['nama_karyawan']; ?></th>
                    <th><?php echo $daftar['jam']; ?></th>
                    <th><?php echo $daftar['tanggal']; ?></th>
                  </tr>
                  <?php $no++; ?>
                <?php endif ?>
              <?php endforeach ?>
            <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>