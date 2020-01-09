<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
 ?>

<section class="main page-header">
  <h4><i class="fa fa-thumbs-up fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Perubahan Judul Skripsi Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Halaman Daftar Skripsi Mahasiswa yang ingin dirubah
    </li>
  </ol>
</section>
<?php
if ( isset($_GET['stat']) && $_GET['stat'] == 'success' )
{
     // treat the succes case ex:
     echo "<div class='alert alert-success alert-dismissable' role='alert'>
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
     Judul berhasil diubah
     </div>";
}
 ?>
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
        Daftar Skripsi Mahasiswa yang ingin dirubah</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIM</th>
          <th class="text-center">Nama Mahasiswa</th>
          <th class="text-center">Judul Skripsi yang lama</th>
          <th class="text-center">Judul Skripsi yang Baru</th>
          <th class="text-center">Alasan Judul diubah</th>
          <th class="text-center">Tanggal Input</th>
          <th class="text-center">Status</th>
          <th class="text-center">Konfirmasi</th>
        </tr>
      </thead>
      <?php
        $qry=$link->query("SELECT * FROM tblubah_judulskripsi WHERE status='Menunggu konfirmasi' ORDER by tgl_input ASC");
        while($ambil=$qry->fetch_array()){
       ?>
      <tbody>
        <tr>
          <td class="text-center"><?php echo $ambil['NIM']; ?></td>
          <td class="text-center"><?php echo $ambil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $ambil['judul_skripsi_lama']; ?></td>
          <td class="text-center"><?php echo $ambil['jdul_skripsi_baru']; ?></td>
          <td class="text-center"><?php echo $ambil['alasan_diubah']; ?></td>
          <td class="text-center"><?php echo $ambil['tgl_input']; ?></td>
          <td class="text-center"><?php echo $ambil['status']; ?></td>
          <td class="text-center"><a class="btn btn-success" href="index2.php?ke=ubahjdl_konf&urut=<?php echo $ambil['no_urut']; ?>"><i class="fa fa-edit fa-fw">&nbsp;</i> Konfirmasi</a>
        </tr>
      </tbody>
    <?php } ?>
    </table>
  </div>
</div>
