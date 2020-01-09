<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Tanggal dan Input Ruanga Seminar Pendadaran</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Halaman Konfirmasi Seminar Pendadaran</li>
  </ol>
</section>


<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Data Pendaftar Seminar Pendadaran Skripsi</center></b>
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
          <th>Status</th>
          <th>Persyaratan</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_pendadaran.kode_daftar,
              tblseminar_pendadaran.NIM,
              tblmahasiswa.nm_mahasiswa,
              tblmahasiswa.judul_skripsi,
                                    tanggal_maju,
                                    waktu,
                                    tgl_input,
                                    tbldaftar_pendadaran.file_persyaratan2,
                                    hasil_pendadaran,
                                    tbldaftar_pendadaran.dir_persyaratan,
                                    tblmahasiswa.dosbing1,
                                    tblmahasiswa.dosbing2,
                                    tblmahasiswa.dosen_penguji1,
                                    tblmahasiswa.dosen_penguji2
                                    FROM tblseminar_pendadaran JOIN tblmahasiswa ON tblseminar_pendadaran.NIM=tblmahasiswa.NIM
                                    JOIN tbldaftar_pendadaran ON tblseminar_pendadaran.kode_daftar=tbldaftar_pendadaran.kode_daftar
                                    WHERE hasil_pendadaran='Menunggu ruangan seminar' ORDER BY tgl_input")
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
          <td class="text-center"><?php echo $tampil['hasil_pendadaran']; ?></td>
          <td><a class="btn btn-primary" data-toggle="tooltip" title="Download Persyaratan" href="<?php echo $tampil['dir_persyaratan'],'untuk_sekprod/',$tampil['file_persyaratan2']; ?>"><i class="fa fa-file-word-o fa-fw"> </i></a>
          <td><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Pendaftaran" href="index2.php?ke=d4r_konf&kd=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i></a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
