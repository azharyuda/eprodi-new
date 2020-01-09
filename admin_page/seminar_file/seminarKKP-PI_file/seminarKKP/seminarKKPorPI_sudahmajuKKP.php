<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>

<section class="main page-header">
  <h4><i class="fa fa-clipboard fa-fw" style="color: #9150B4;"></i> Halaman Daftar Mahasiswa yang telah melaksanakan Seminar KKP</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">Hasil Seminar KKP</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Mahasiswa yang telah melaksanakan seminar KKP</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul KKP</th>
          <th>Hasil</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_kkp.kode_daftar, tblseminar_kkp.NIM, tblmahasiswa.nm_mahasiswa,tblmahasiswa.dosen_wali,
                                    judul_kkp, hasil_seminarkkp
                                    FROM tblseminar_kkp JOIN tblmahasiswa ON tblseminar_kkp.NIM=tblmahasiswa.NIM WHERE hasil_seminarkkp='Lulus' or hasil_seminarkkp='Tidak Lulus' ORDER BY NIM ASC")
                                    or die (mysqli_error());
            while ($tampil = $ambil->fetch_array()){
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_kkp']; ?></td>
          <?php
            if($tampil['hasil_seminarkkp']=='Lulus'){
          ?>
            <td class="text-center success"><?php echo $tampil['hasil_seminarkkp']; ?></td>
          <?php } else { ?>
            <td class="text-center danger"><?php echo $tampil['hasil_seminarkkp']; ?></td>
          <?php } ?>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
