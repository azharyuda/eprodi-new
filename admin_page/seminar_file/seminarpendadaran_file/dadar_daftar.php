<section class="main page-header">
  <h4><i class="fa fa-calendar fa-fw" style="color: #9150B4;"></i> Jadwal Seminar Pendadaran</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">Jadwal Seminar Pendadaran</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Jadwal Seminar Pendadaran Skripsi</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul Skripsi</th>
          <th>Dosen Pembimbing 1</th>
          <th>Dosen Pembimbing 2</th>
          <th>Dosen Penguji 1</th>
          <th>Dosen Penguji 2</th>
          <th>Tanggal Maju</th>
          <th>Waktu</th>
          <th>Ruangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_pendadaran.kode_daftar, tblseminar_pendadaran.NIM, tblmahasiswa.nm_mahasiswa, tblmahasiswa.judul_skripsi,
                                    tanggal_maju, waktu, ruangan, hasil_pendadaran, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
                                    tblmahasiswa.dosen_penguji1, tblmahasiswa.dosen_penguji2
                                    FROM tblseminar_pendadaran JOIN tblmahasiswa ON tblseminar_pendadaran.NIM=tblmahasiswa.NIM WHERE hasil_pendadaran='Menunggu selesai seminar' ORDER BY tanggal_maju")
                                    or die (mysqli_error());

            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tanggal_maju']));
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing2']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_penguji1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_penguji2']; ?></td>
          <td class="text-center"><?php echo $tgl; ?></td>
          <td class="text-center"><?php echo $tampil['waktu']; ?></td>
          <td class="text-center"><?php echo $tampil['ruangan']; ?></td>

          <td class="text-center"><a class="btn btn-success" href="index2.php?ke=d4r_hsl&kd=<?php echo $tampil['kode_daftar'];?>"><i class="fa fa-check fa-fw"></i>
            Input Hasil Seminar</td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
