<?php error_reporting(E_ALL); ?>

<section class="main page-header">
  <h4><i class="fa fa-location-arrow fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Seminar KKP</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Halaman Konfirmasi Seminar KKP</li>
  </ol>
</section>


<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Data Seminar KKP Menunggu Ruangan</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul KKP</th>
          <th>Dosen Wali (Pembimbing)</th>
          <th>Dosen Penguji 1</th>
          <th>Dosen Penguji 2</th>
          <th>Tanggal Maju</th>
          <th>Waktu</th>
          <th>Status</th>
                   <th>Persyaratan</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_kkp.kode_daftar, tblseminar_kkp.NIM, tblmahasiswa.nm_mahasiswa,tblmahasiswa.dosen_wali,
                                    judul_kkp, dosen_uji1, dosen_uji2, tanggal_maju, waktu, hasil_seminarkkp, tbldaftarseminar_kkporpi.dir_persyaratan, tbldaftarseminar_kkporpi.file_persyaratan2
                                    FROM tblseminar_kkp JOIN tbldaftarseminar_kkporpi ON tblseminar_kkp.kode_daftar=tbldaftarseminar_kkporpi.kode_daftar JOIN tblmahasiswa ON tblseminar_kkp.NIM=tblmahasiswa.NIM WHERE hasil_seminarkkp='Menunggu ruangan seminar' ORDER BY tanggal_maju ASC");
            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tanggal_maju']));
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_kkp']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_wali']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_uji1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_uji2']; ?></td>
          <td class="text-center"><?php echo $tgl; ?></td>
          <td class="text-center"><?php echo $tampil['waktu']; ?></td>
          <td class="text-center"><?php echo $tampil['hasil_seminarkkp']; ?> </td>
                      <td class="text-center"><a class="btn btn-primary" data-toggle="tooltip" title="Download Persyaratan" href="<?php echo $tampil['dir_persyaratan'], 'untuk_sekprod/', $tampil['file_persyaratan2']; ?> "><i class="fa fa-file-word-o fa-fw"> </i></a></td>
            <td><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Ruangan" href="index2.php?ke=kkP_konfruang&kode=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i>Konfirmasi</a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
