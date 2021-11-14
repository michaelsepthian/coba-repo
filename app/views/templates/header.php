<html>

<head>
  <link rel="icon" href='<?php echo MYURL; ?>/img/logo.png'>
  <title>Halaman <?php echo $data['judul']; ?></title>
  <link rel="stylesheet" href='http://localhost/CoffeeShop-1/public/css/bootstrap.css'>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed; z-index:999; top:0px;width:100%;">
  <div class="container">
    <img src='<?php echo MYURL; ?>/img/logo.png' width='50px' height='50px'>
    <a class="navbar-brand" href="#">Coffee Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo MYURL; ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo MYURL; ?>/presensi">Presensi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo MYURL; ?>/karyawan">Karyawan</a>
        </li>
        <li>
          <a class="nav-link" href="<?php echo MYURL; ?>/stock">Stock</a>
        </li>
        <li>
          <a class="nav-link" href="<?php echo MYURL; ?>/history">Histori_Order</a>
        </li>
        <li>
          <a class="nav-link" href="<?php echo MYURL; ?>/pemasok">Pemasok</a>
        </li>
      </ul>
    </div>
</nav>