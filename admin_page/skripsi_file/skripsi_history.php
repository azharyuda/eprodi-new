<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
 ?>

<section class="main page-header">
  <h4><i class="fa fa-thumbs-up fa-fw" style="color: #9150B4;"></i> History Penggantian Judul Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Halaman Daftar Perubahan Judul Skripsi Mahasiswa
    </li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
        Daftar Skripsi Mahasiswa yang ingin dirubah</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIM</th>
          <th class="text-center">Nama Mahasiswa</th>
          <th class="text-center">Judul Skripsi yang lama</th>
          <th class="text-center">Judul Skripsi Yang baru</th>
          <th class="text-center">Alasan Judul diubah</th>
          <th class="text-center">Tanggal Perubahan</th>
        </tr>
      </thead>
      <?php
        $qry=$link->query("SELECT * FROM tblubah_judulskripsi WHERE status='Sudah dikonfirmasi' ORDER by updated_at ASC");
        while($ambil=$qry->fetch_array()){
       ?>
      <tbody>
        <tr>
          <td class="text-center"><?php echo $ambil['NIM']; ?></td>
          <td class="text-center"><?php echo $ambil['nm_mahasiswa']; ?></td>
          <td class="text-center" style="background-color: #ffec63;"><?php echo $ambil['judul_skripsi_lama']; ?></td>
          <td class="text-center" style="background-color: #51E871;"><?php echo $ambil['jdul_skripsi_baru']; ?></td>
          <td class="text-center"><?php echo $ambil['alasan_diubah']; ?></td>
          <td class="text-center"><?php echo $ambil['updated_at']; ?></td>  </tr>
      </tbody>
    <?php } ?>
    </table>
  </div>
</div>
