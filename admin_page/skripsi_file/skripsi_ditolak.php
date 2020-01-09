<?php error_reporting(E_ALL); ?>
<section class="main page-header">
  <h4><i class="fa fa-thumbs-down fa-fw" style="color: #9150B4;"></i> Halaman Proposal yang ditolak</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Halaman Proposal yang ditolak
    </li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Skripsi Mahasiswa yang ditolak</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Topik Skripsi</th>
          <th>Judul Skripsi</th>
          <th>Alasan Ditolak</th>
          <th>Tanggal data diinput</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT no_urut, tblproposal_ditolak.NIM, tblproposal_ditolak.judul_skripsi,
              tblproposal_ditolak.id_topik, alasan_ditolak, tgl_ditolak, tblmahasiswa.nm_mahasiswa, tbltopik_skripsi.topik_skripsi
              FROM tblproposal_ditolak JOIN tblmahasiswa ON tblproposal_ditolak.NIM=tblmahasiswa.NIM
              JOIN tbltopik_skripsi ON tblproposal_ditolak.id_topik=tbltopik_skripsi.id_topik ORDER BY tgl_ditolak DESC") or die (mysqli_error());
            while ($tampil = $ambil->fetch_array()){
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['alasan_ditolak']; ?></td>
          <td class="text-center"><?php echo $tampil['tgl_ditolak']; ?></td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
