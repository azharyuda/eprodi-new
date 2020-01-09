<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>

<section class="main page-header">
  <h4><i class="fa fa-calendar fa-fw" style="color: #9150B4;"></i> Jadwal Seminar Penulisan Ilmiah</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">Jadwal Seminar Penulisan Ilmiah</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Jadwal Seminar Penulisan Ilmiah </center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul PI</th>
          <th>Dosen Wali (Pembimbing)</th>
          <th>Dosen Penguji 1</th>
          <th>Dosen Penguji 2</th>
          <th>Tanggal Maju</th>
          <th>Waktu</th>
          <th>Ruangan</th>
          <th>Cetak Undangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_pi.kode_daftar, tblseminar_pi.NIM, tblmahasiswa.nm_mahasiswa,tblmahasiswa.dosen_wali,
                                    judul_pi, dosen_uji1, dosen_uji2, tanggal_maju, waktu, hasil_seminarpi, ruangan
                                    FROM tblseminar_pi JOIN tblmahasiswa ON tblseminar_pi.NIM=tblmahasiswa.NIM WHERE hasil_seminarpi='Menunggu selesai seminar' ORDER BY tanggal_maju ASC")
                                    or die (mysqli_error());

            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tanggal_maju']));
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_pi']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_wali']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_uji1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_uji2']; ?></td>
          <td class="text-center"><?php echo $tgl; ?></td>
          <td class="text-center"><?php echo $tampil['waktu']; ?></td>
          <td class="text-center"><?php echo $tampil['ruangan']; ?></td>
            <td><a class="btn btn-success" data-toggle="tooltip" title="Input Hasil Seminar" href="index2.php?ke=P1_undang&kode=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i>Print Undangan</a>
            <td><a class="btn btn-success" data-toggle="tooltip" href="index2.php?ke=P1_hsl&kode=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i>Konfirmasi</a>
          </td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
