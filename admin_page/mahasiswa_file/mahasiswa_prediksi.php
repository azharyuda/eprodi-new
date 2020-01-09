<section class="main page-header">
  <h4><i class="fa fa-calendar fa-fw" style="color: #9150B4;"></i> Halaman Prediksi Jadwal Skripsi Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Halaman Prediksi Jadwal
    </li>
  </ol>
</section>
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Skripsi Mahasiswa</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul Skripsi</th>
          <th>Tanggal Acc Skripsi</th>
          <th>Prediksi Tanggal Seminar 1</th>
          <th>Prediksi Tanggal Seminar 2</th>
          <th>Prediksi Tanggal Seminar Pendadaran</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <?php
          include "dist/koneksi.php";
          $ambil = $link->query("SELECT id, tblproposal_diterima.NIM,  tblmahasiswa.nm_mahasiswa, tblproposal_diterima.judul_skripsi,tgl_diterima,
          DATE_ADD(tgl_diterima, INTERVAL 31 DAY) AS tgl_seminar1,
          DATE_ADD(tgl_diterima, INTERVAL 93 DAY) AS tgl_seminar2,
          DATE_ADD(tgl_diterima, INTERVAL 124 DAY) AS tgl_pendadaran
          FROM tblproposal_diterima JOIN tblmahasiswa ON tblmahasiswa.NIM=tblproposal_diterima.NIM") or die (mysqli_error($link));
          while($tampil = $ambil->fetch_array()){
          $tglterima=date('d F Y', strtotime($tampil['tgl_diterima']));
          $sem1=date('d F Y', strtotime($tampil['tgl_seminar1']));
          $sem2=date('d F Y', strtotime($tampil['tgl_seminar2']));
          $dadar=date('d F Y', strtotime($tampil['tgl_pendadaran']));
        ?>
        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tglterima; ?></td>
          <td class="text-center"><?php echo $sem1; ?></td>
          <td class="text-center"><?php echo $sem2; ?></td>
          <td class="text-center"><?php echo $dadar; ?></td>
          <td class="text-center"><a class="btn btn-success" data-toggle="tooltip" href="index2.php?ke=mh5_alert&kode=<?php echo $tampil['id']; ?>"><i class="fa fa-check fa-fw"></i></a>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
