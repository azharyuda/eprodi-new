<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Seminar Pendadaran</h4>
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
          <th>Tanggal Input Data</th>
          <th>Status</th>
          <th>Download</th>
          <th>Konfirmasi Pendaftaran</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tbldaftar_pendadaran.kode_daftar, tbldaftar_pendadaran.NIM, tblmahasiswa.nm_mahasiswa, tblmahasiswa.judul_skripsi,
                                    tgl_input, status, dir_persyaratan, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
                                    tblmahasiswa.dosen_penguji1, tblmahasiswa.dosen_penguji2, file_persyaratan
                                    FROM tbldaftar_pendadaran JOIN tblmahasiswa ON tbldaftar_pendadaran.NIM=tblmahasiswa.NIM WHERE status='Menunggu Konfirmasi' ORDER BY tgl_input")
                                    or die (mysqli_error());

            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tgl_input']));
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
          <td class="text-center"><?php echo $tampil['status']; ?></td>
          <td><a class="btn btn-primary" data-toggle="tooltip" title="Download Persyaratan" href="<?php echo $tampil['dir_persyaratan'], 'untuk_kaprodi/', $tampil['file_persyaratan'] ; ?>"><i class="fa fa-file-word-o fa-fw"> </i></a>
          <td><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Pendaftaran" href="index2.php?ke=d4r_konfdaftar&kd=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i></a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
