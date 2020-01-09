<?php error_reporting(E_ALL); ?>

<section class="main page-header">
  <h4><i class="fa fa-mortar-board fa-fw" style="color:#9150B4;"></i> Halaman Dosen</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Menu Dosen</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <a class="btn btn-success" href="index2.php?ke=inpt_dsn"><i class="fa fa-plus-square fa-fw">&nbsp; </i>Tambah Data</a>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>Daftar Data Dosen</b>
      <a class="btn btn-success pull-right" href="index2.php?ke=reset_dsn"><i class="fa fa-plus-square fa-fw">&nbsp; </i>Reset semua kuota dosen</a>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIDN</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Kuota Pembimbing 1</th>
          <th class="text-center">Kuota Pembimbing 2</th>
          <th class="text-center">Kuota Penguji 1</th>
          <th class="text-center">Kuota Penguji 2</th>
          <th class="text-center">Kuota Penguji 1 KKP/PI</th>
          <th class="text-center">Kuota Penguji 2 KKP/PI</th>
          <th class="text-center">Aksi</th>
        </tr>
</thead>
        <?php
            include "dist/koneksi.php";

            $ambil = mysqli_query($link, "SELECT * FROM tbldosen ORDER BY NIDN");
            while ($tampil = mysqli_fetch_array($ambil)){
          ?>
        <tr>
          <td class="text-center"><?php echo $tampil['NIDN']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_dosen']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_pembimbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_pembimbing2']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_penguji1']; ?></td>
          <td class="text-center"><?php echo $tampil['kuota_penguji2']; ?></td>
          <td class="text-center"><?php echo $tampil['kuotapenguji1_kkpi']; ?></td>
          <td class="text-center"><?php echo $tampil['kuotapenguji2_kkpi']; ?></td>
          <td class="text-center"><a class="btn btn-success" href="index2.php?ke=ubh_dsn&nidn=<?php echo $tampil['NIDN']; ?>"><i class="fa fa-edit fa-fw">&nbsp;</i> Edit</a>
              <a class="btn btn-danger" href="index2.php?ke=hps_dsn&nidn=<?php echo $tampil['NIDN']; ?>" onclick='return konf()'><i class="fa fa-trash fa-fw">&nbsp;</i> Hapus
          </td>

        </tr>
      <?php }  ?>
      </table>
    </div>
  </div>
