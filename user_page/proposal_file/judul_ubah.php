<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
?>
<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Perubahan Judul Skripsi Mahasiswa</h2>
</section>
<?php
$qry=$link->query("SELECT * FROM tblubah_judulskripsi WHERE NIM='$_SESSION[NIM]'");
$take=$qry->fetch_array();
if($take['status']=='Menunggu konfirmasi'){
  echo "Mohon maaf, perubahan judul skripsi anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";

}else{
  $qry=$link->query("SELECT judul_skripsi FROM tblmahasiswa WHERE NIM='$_SESSION[NIM]'");
  $take=$qry->fetch_array();
  if($take['judul_skripsi']=='Belum Ada'){
    echo "Anda tidak dapat merubah judul skripsi karena anda belum memiliki judul skripsi. Silahkan ajukan proposal skripsi terlebih dahulu";

  }else{
    $qry=$link->query("SELECT * FROM tblseminar_proposal WHERE NIM='$_SESSION[NIM]'");
    $hslprop=$qry->fetch_array();
    if($hslprop['hasil_seminarproposal']=='Menunggu selesai seminar' || $hslprop['hasil_seminarproposal']=='Menunggu ruangan seminar'){
      echo "Anda tidak dapat mengubah Judul saat ini dikarenakan sudah mendaftar seminar proposal";
    }else{
      $qry=$link->query("SELECT * FROM tblseminar_2 WHERE NIM='$_SESSION[NIM]'");
      $hsl=$qry->fetch_array();
      if($hsl['hasil_seminar2']=='Lulus'){
        echo "Anda tidak dapat mengubah Judul karena sudah melaksanakan seminar 2 dan lulus!";
      }elseif($hsl['hasil_seminar2']=='Menunggu selesai seminar'){
        echo "Anda tidak dapat mengubah Judul saat ini dikarenakan sudah mendaftar seminar 2";
      }else{
 ?>
<?php
$qry=$link->query("SELECT judul_skripsi FROM tblmahasiswa WHERE NIM='$_SESSION[NIM]'");
$take=$qry->fetch_array();
$judul=$take['judul_skripsi'];

 ?>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Perubahan Judul Skripsi</center></b>
    </div>
    <div class="panel-body">
      <h5>Judul Skripsi Anda saat ini: <b><?php echo $judul; ?></b></h5>
      <hr />
      <form class="form required" action="index.php?ke=smpn-jdlbaru" method="POST" id="frm-ubah" enctype="multipart/form-data">
        <div class="form-group">
          <label>Judul Skripsi anda yang baru: </label>
          <input type="text" name="_judul" class="form-control required" placeholder="Input Judul Skripsi anda yang baru" />
        </div>
        <div class="form-group">
          <label>Alasan Perubahan Judul: </label>
          <textarea name="_alasan" class="form-control required" placeholder="Masukkan Alasan Anda"></textarea>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
      </form>
    </div>
</div>
<?php }}}} ?>
