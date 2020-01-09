<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Daftar Skripsi Mahasiswa SI Terdahulu</h2>
</section>

<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Daftar Skripsi Mahasiswa Terdahulu</center></b>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table-data">
          <thead>
          <tr>
            <th class="text-center">NIM</th>
            <th class="text-center">Nama Mahasiswa</th>
            <th class="text-center">Topik Skripsi</th>
            <th class="text-center">Judul Skripsi</th>
          </tr>
      </thead>
          <?php
              include "dist/koneksi.php";

              $ambil = $link->query("SELECT *, tbltopik_skripsi.topik_skripsi FROM tblskripsi_dulu JOIN tbltopik_skripsi ON tblskripsi_dulu.id_topik=tbltopik_skripsi.id_topik ORDER BY NIM");
              while ($tampil=$ambil->fetch_array()){
            ?>
          <tr>
            <td class="text-center"><?php echo $tampil['NIM']; ?></td>
            <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
            <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
            <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>

          </tr>
        <?php }  ?>
        </table>
    </div>
