<?php
  error_reporting();
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Seminar Proposal/Seminar 1 Skripsi</h2>
</section>


<?php

$qry=$link->query("SELECT * from tbldaftarseminar_skripsi WHERE NIM=$_SESSION[NIM] AND pilihan_seminar='Seminar 1'");
$take=$qry->fetch_array();
if($take['status']=='Menunggu Konfirmasi'){
  echo "Mohon maaf, pendaftaran anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi atau Sekprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
}elseif($take['status']==''){
  echo "Anda tidak dapat mendaftarkan tanggal dan waktu seminar karena belum mendapat dosen penguji! silahkan mendaftar terlebih dahulu";
}else{
  $qry=$link->query("SELECT * from tblseminar_proposal WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();

  if($take['hasil_seminarproposal']=='Lulus'){
    echo "Anda sudah Lulus Ujian Seminar Proposal.";
  }elseif($take['hasil_seminarproposal']=='Menunggu ruangan seminar'){
    echo "Anda belum mendapat ruangan seminar. Silahkan menunggu maksimal 1x24 jam. ";
  }elseif($take['hasil_seminarproposal']=='Menunggu selesai seminar'){
    echo "Pendaftaran anda telah dikonfirmasi! Silahkan cek E-Mail anda untuk info lebih lanjut atau lihat <a href='index.php?ke=jdwl-sempr0'>Jadwal Seminar Proposal</a>";
  }else{

    $qry=$link->query("SELECT judul_skripsi, dosen_penguji1, dosen_penguji2 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
    $take=$qry->fetch_array();
    if($take['judul_skripsi']=='Belum Ada'){
      echo "Mohon maaf, anda belum memiliki judul skripsi. Silahkan ajukan proposal skripsi terlebih dahulu <a href='index.php?ke=proposal-aju'>disini</a>";
    }else{
  ?>
 <b><h5 style="color: red;">PASTIKAN TELAH DIKONFIRMASI DENGAN DOSEN PENGUJI DAN JUGA KEDUA DOSEN PEMBIMBING SEBELUM MENGISI TANGGAL!</h5></b>
<h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>

<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Seminar Proposal / Seminar 1 Skripsi</center></b>
    </div>
    <div class="panel-body">
      <h5>Dosen Pembimbing dan Penguji anda: </h5>
      <hr />
      <?php
      $qry=$link->query("SELECT dosbing1, dosbing2, dosen_penguji1 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
      $take=$qry->fetch_array();
       ?>
      <h5><b>Dosen Pembimbing: </b></h5>
      <h5>1. Dosen Pembimbing 1: <b><?php echo $take['dosbing1']; ?></b></h5>
      <h5>2. Dosen Pembimbing 2: <b><?php echo $take['dosbing2']; ?></b></h5>
      <hr />
      <h5><b>Dosen Penguji: </b></h5>
      <h5>1. Dosen Penguji/Pembahas 1: <b><?php echo $take['dosen_penguji1']; ?></b></h5>
      <hr />

      <form class="form required" autocomplete="off" action="index.php?ke=sempr0-tglsimpn" method="POST" id="frm-tgl" enctype="multipart/form-data">
        <div class="form-group">
          <label>Hari/Tanggal Seminar: </label>
          <div class="input-group date">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input style="width:20%" class="form-control required" type="text" id="datepicker" name="_tglseminar" placeholder="Input tanggal (dd-mm-yyyy)" readonly>
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
          <label>Fotocopy Transkrip Nilai yang telah dilegalisir BAAK:  </label>
          <input type="file" class="form-control required" name="_persyaratan[0]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Fotocopy Kwitansi Pembayaran Seminar 1:  </label>
          <input type="file" class="form-control required" name="_persyaratan[1]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Fotocopy Slip BPP (Semester saat ini): </label>
          <input type="file" class="form-control required" name="_persyaratan[2]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Fotocopy Slip SKS (Semester saat ini): </label>
          <input type="file" class="form-control required" name="_persyaratan[3]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Fotocopy KRS Sementara (Semester Saat Seminar Dilaksanakan): </label>
          <input type="file" class="form-control required" name="_persyaratan[4]" accept="image/jpeg" /><br>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }}} ?>
  </form>
</div>
