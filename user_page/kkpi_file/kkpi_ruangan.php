<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Tanggal Seminar KKP / PI</h2>
</section>


<?php

$qry=$link->query("SELECT * from tbldaftarseminar_kkporpi WHERE NIM=$_SESSION[NIM]");
$take=$qry->fetch_array();
if($take['status']=='Menunggu Konfirmasi'){
  echo "Mohon maaf, pendaftaran anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi atau Sekprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
}elseif($take['status']==''){
  echo "Mohon maaf, anda belum melakukan pendaftaran awal. Silahkan lakukan pendaftaran pada menu Pendataran Seminar KKP/PI";}
  else{

  $qry=$link->query("SELECT * from tblseminar_pi WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();
  if($take['hasil_seminarpi']=='Lulus'){
    echo "Anda sudah Lulus Ujian PI";}
  elseif($take['hasil_seminarpi']=='Menunggu ruangan seminar'){
    echo "Anda Belum Mendapat Ruangan. Silahkan tunggu maksimal 2x24 jam";
  }elseif($take['hasil_seminarpi']=='Menunggu selesai seminar'){
    echo "Anda sudah terdaftar seminar PI!";
  }else{

    $qry=$link->query("SELECT * from tblseminar_kkp WHERE NIM=$_SESSION[NIM]");
    $take=$qry->fetch_array();
    if($take['hasil_seminarkkp']=='Lulus'){
      echo "Anda sudah Lulus Ujian KKP";}
    elseif($take['hasil_seminarkkp']=='Menunggu ruangan seminar'){
      echo "Anda Belum Mendapat Ruangan. Silahkan tunggu maksimal 2x24 jam";
    }elseif($take['hasil_seminarkkp']=='Menunggu selesai seminar'){
      echo "Anda sudah terdaftar seminar KKP!";
    }else{

?>
 <b><h5 style="color: red;">PASTIKAN TELAH DIKONFIRMASI DENGAN KEDUA DOSEN PENGUJI DAN JUGA DOSEN WALI SEBELUM MENGISI TANGGAL!</h5></b>
 <h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>

<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Tanggal Seminar Kuliah Kerja Praktek / Penulisan Ilmiah</center></b>
    </div>
    <div class="panel-body">
      <h5>Dosen Penguji yang disetujui oleh Ketua Prodi adalah:</h5>
      <?php
      $qry=$link->query("SELECT rekom_dosenuji1, rekom_dosenuji2 from tbldaftarseminar_kkporpi WHERE NIM=$_SESSION[NIM]");
      $take=$qry->fetch_array();
       ?>
      <h5>1. Dosen Penguji 1: <b><?php echo $take['rekom_dosenuji1']; ?></b></h5>
      <h5>2. Dosen Penguji 2: <b><?php echo $take['rekom_dosenuji2']; ?></b></h5>
      <hr />

      <form class="form required" autocomplete="off" action="index.php?ke=kkpi-tglsimpn" method="POST" id="frm-tgl" enctype="multipart/form-data">
        <div class="form-group">
          <label>Hari/Tanggal Seminar: </label>
          <div class="input-group date">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input style="width:20%" class="form-control required" type="text" id="datepicker" name="_tglseminar" placeholder="Input tanggal (dd-mm-yyyy)" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label>Waktu/Jam Seminar: (Jam:Menit:AM/PM)</label>
          <div class="input-group date">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            <input style="width:20%" class="form-control required" type="time" name="_jam" >
          </div>
        </div>
        <div class="form-group">
          <label>Scan/foto Fotocopy BPP: </label>
          <input type="file" class="form-control required" name="_persyaratan[0]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/foto Fotocopy SKS: </label>
          <input type="file" class="form-control required" name="_persyaratan[1]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/foto KRS asli (Dibawa juga ketika pelaksanaan seminar): </label>
          <input type="file" class="form-control required" name="_persyaratan[2]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/foto Fotocopy Transkrip Nilai yang telah dilegaliris (upload 1 lembar, bawa 4 lembar untuk lampiran di dalam naskah): </label>
          <input type="file" class="form-control required" name="_persyaratan[3]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/foto Nilai dari tempat penelitian: </label>
          <input type="file" class="form-control required" name="_persyaratan[4]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/foto Absensi Penelitian: </label>
          <input type="file" class="form-control required" name="_persyaratan[5]" accept="image/jpeg" /><br>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }}} ?>
  </form>
</div>
