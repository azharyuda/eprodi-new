<?php
  error_reporting();
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Daftar Dosen untuk Menjadi Pembimbing / Penguji</h2>
</section>

<div class="panel panel-primary">
    <div class="panel-heading">
    <b><center>
      Daftar Data Dosen
    </center></b>
    </div>
    <br />
    <div class="panel-body">

    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">Nama</th>
          <th class="text-center">Kuota Pembimbing 1</th>
          <th class="text-center">Kuota Pembimbing 2</th>
          <th class="text-center">Kuota Penguji 1 Skripsi</th>
          <th class="text-center">Kuota Penguji 2 Skripsi</th>
          <th class="text-center">Kuota Penguji 1 KKP/PI</th>
          <th class="text-center">Kuota Penguji 2 KKP/PI</th>
        </tr>
</thead>
        <?php
            include "dist\koneksi.php";

            $ambil = $link->query("SELECT * FROM tbldosen ORDER BY NIDN");
            while ($tampil = $ambil->fetch_array()){
          ?>
        <tr>
          <td class="text-center"><?php echo $tampil['nm_dosen']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_pembimbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_pembimbing2']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_penguji1']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_penguji2']; ?></td>
          <td class="text-center"><?php echo $tampil['kuotapenguji1_kkpi']; ?></td>
          <td class="text-center"><?php echo $tampil['kuotapenguji2_kkpi']; ?></td>
        </tr>
      <?php }  ?>
      </table>
    </div>
  </div>
  </div>
