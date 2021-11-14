<body style="background-image : url('<?php echo MYURL; ?>/img/background.jpg'); opacity :5;">
  <center>
    <h2 style="color:white; margin-top:90px">H I S T O R I&nbsp&nbsp&nbsp&nbspT R A N S A K S I</h2>
    <img src='<?php echo MYURL; ?>/img/spr.png' width='500px' height='100px;'>
  </center>
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-12">
      </div>
    </div>
    <a href="<?php echo MYURL; ?>/history/get_total" class="btn btn-primary ml-2 float-center mb-5" data-toggle="" data-target='' data-id="">Total</a>
    <div class="card" style="background-color:transparent;">
      <table style="color:white;font-size:20px">
        <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Tipe Pembayaran</th>
          <th>Total</th>
          <th>Detail</th>
        </tr>
        <tr>
          <th>
            <hr>
          </th>
        </tr>
        <?php $no = 1;
        foreach ($data['history'] as $history) : ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td>
              <?php foreach ($data['customer'] as $customer) : ?>
                <?php if ($customer['id'] == $history['id_order_customer']) : ?>
                  <?php echo $customer['nama']; ?>
                <?php endif ?>
              <?php endforeach ?>
            </td>
            <td><?php echo $history['tipe']; ?></th>
            <td>Rp. <?php echo $history['total'];
                    $no++; ?></td>
            <td><a href="<?php echo MYURL; ?>/<?php echo $history['id_order_customer']; ?>" class="btn btn-success ml-2 float-center" data-toggle="modal" data-target="#formDetail" data-id="<?php echo $history['id_order_customer']; ?>" style="background-color: #783c00; border-color:white">Detail</a></td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>
  </div>
  </div>

  <div class="modal fade" id="formDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi</h5>
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