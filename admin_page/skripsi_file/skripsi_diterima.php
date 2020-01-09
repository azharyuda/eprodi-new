<?php error_reporting(E_ALL); ?>
<section class="main page-header">
  <h4><i class="fa fa-thumbs-up fa-fw" style="color: #9150B4;"></i> Halaman Daftar Proposal Skripsi yang diterima</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Halaman Daftar Proposal Diterima
    </li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Proposal Skripsi Mahasiswa</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIM</th>
          <th class="text-center">Nama Mahasiswa</th>
          <th class="text-center">Topik Skripsi</th>
          <th class="text-center">Judul Skripsi</th>
          <th class="text-center">Tanggal Acc Skripsi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblproposal_diterima.no_urut, tblproposal_diterima.NIM,
              tblproposal_diterima.judul_skripsi,
              tgl_diterima,
              tbltopik_skripsi.id_topik,
              tbltopik_skripsi.topik_skripsi,
              tblmahasiswa.nm_mahasiswa
              FROM tblproposal_diterima JOIN tbltopik_skripsi
              ON tblproposal_diterima.id_topik=tbltopik_skripsi.id_topik
              JOIN tblmahasiswa ON tblproposal_diterima.NIM=tblmahasiswa.NIM") OR die(mysqli_error());
            while ($tampil = $ambil->fetch_array()){
          ?>
        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['tgl_diterima']; ?></td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
