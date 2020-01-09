<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Pendaftaran Akun Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Daftar Akun Mahasiswa
    </li>
  </ol>
</section>
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Data Akun Mahasiswa Konfirmasi</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIM</th>
          <th class="text-center">Nama Mahasiswa</th>
          <th class="text-center">E-Mail</th>
          <th class="text-center">Dosen Wali</th>
          <th class="text-center">Foto Mahasiswa</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query ("SELECT * FROM tblmahasiswa where status_akun='Menunggu Konfirmasi' ORDER BY NIM ASC");
            while ($tampil = $ambil->fetch_array()){

          ?>

        <tr>

          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['email']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_wali']; ?></td>
          <td class="text-center"><a class="image-link" href="files_upload/mahasiswa_file/photo_files/<?php echo $tampil['photo_name'];?>"><img src="files_upload/mahasiswa_file/photo_files/<?php echo $tampil['photo_name'] ?>" class="img-thumbnail" width="50" height="50"></td>
          <td class="text-center"><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Akun" href="index2.php?ke=mh5_konf&urut=<?php echo $tampil['id']; ?>"><i class="fa fa-check fa-fw"> </i>Konfirmasi</a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
