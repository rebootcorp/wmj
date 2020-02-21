<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-default fixed-top">
    <a class="navbar-brand" href="<?php echo base_url('transaksi') ?>">Warna Manunggal Jaya</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Home
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('transaksi') ?>">Daftar Transaksi</a>
            <a class="dropdown-item" href="<?php echo base_url('transaksi/input_transaksi') ?>">Input Transaksi</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Muatan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('muatan') ?>">Daftar Muatan</a>
            <a class="dropdown-item" href="<?php echo base_url('muatan/input_muatan') ?>">Input Muatan</a>
            <a class="dropdown-item" href="<?php echo base_url('muatan/konfirmasi_muatan') ?>">Konfirmasi Muatan</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tagihan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('tagihan') ?>">Daftar Tagihan</a>
            <a class="dropdown-item" href="<?php echo base_url('tagihan/input_tagihan') ?>">Input Tagihan</a>
            <a class="dropdown-item" href="<?php echo base_url('tagihan/konfirmasi_tagihan') ?>">Konfirmasi Tagihan</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pilihan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('transaksi') ?>">Laporan</a>
            <a class="dropdown-item" href="<?php echo base_url('transaksi') ?>">Eksport Excel</a>
            <a class="dropdown-item" href="<?php echo base_url('user/logout') ?>">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>