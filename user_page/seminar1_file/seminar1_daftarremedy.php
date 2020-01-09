<?php
  error_reporting(E_ALL ^(E_NOTICE));
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Ujian Ulang Seminar Proposal / Seminar 1</h2>
</section>


<?php

$qry=$link->query("SELECT * from tbldaftarseminar_skripsi WHERE NIM=$_SESSION[NIM] and pilihan_seminar='Seminar 1'");
$take=$qry->fetch_array();
if($take['status']=='Menunggu Konfirmasi Ujian Ulang'){
  echo "Mohon maaf, pendaftaran anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
}elseif($take['status']=='Sudah Dikonfirmasi'){
  echo "Pendaftaran anda telah dikonfirmasi! Silahkan cek email anda dan tentukan tanggal seminar anda!";
}else{

    $qry=$link->query("SELECT * from tblseminar_proposal WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();
  $qry2=$link->query("SELECT judul_skripsi from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
  $take2=$qry->fetch_array();
  if($take['hasil_seminarproposal']=='Lulus'){
    echo "Anda sudah Lulus Ujian Seminar Proposal.";}
    elseif($take['hasil_seminarproposal']==''){
      echo "Anda belum mendaftar Ujian Proposal!";}
    elseif($take['hasil_seminarproposal']=='Menunggu selesai seminar'){
      echo "Anda sudah melakukan pendaftaran dan sudah mendapat ruangan seminar. Silahkan lihat <a href='jdwl-sempr0'>Jadwal Seminar Proposal</a>";
    }
  elseif($take['hasil_seminarproposal']=='Menunggu selesai seminar'){
    echo "Anda sudah melakukan pendaftaran dan sudah mendapat ruangan seminar. Silahkan lihat <a href='jdwl-sempr0'>Jadwal Seminar Proposal</a>";
  }    elseif($take['hasil_seminarproposal']=='Tidak Lulus'){
      echo "Mohon maaf, anda tidak lulus ujian seminar proposal. Silahkan melakukan pengajuan proposal yang baru <a href='index.php?ke=proposal-aju'>disini</a>";
    } elseif($take2['judul_skripsi']=='Belum Ada'){
      echo "Mohon Maaf, Anda tidak dapat mendaftar karena belum memiliki proposal. Silahkan ajukan proposal Skripsi yang baru kepada kaprodi dengan klik <a href='index.php?ke=proposal-aju'>disini</a>";
    }else{

    $qry=$link->query("SELECT judul_skripsi, dosen_penguji1, dosen_penguji2 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
    $take=$qry->fetch_array();
    if($take['judul_skripsi']=='Belum Ada'){
      echo "Mohon maaf, anda belum memiliki judul skripsi. Silahkan ajukan proposal skripsi terlebih dahulu <a href='index.php?ke=proposal-aju'>disini</a>";
    }elseif($take['dosen_penguji2']!='Belum Ada'){
      echo "Anda sudah memiliki dosen penguji 2. Silahkan mendaftarkan tanggal seminar hasil/daftar seminar pendadaran";}
      else{
  ?>
<h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Ujian Ulang Seminar Proposal</center></b>
    </div>
    <div class="panel-body">
      <form class="form required" action="index.php?ke=sempr0-remed" method="POST" id="frm-sempro" enctype="multipart/form-data">
        <div class="form-group">
          <?php
            $qry=$link->query("SELECT dosbing1, dosbing2, dosen_penguji1, judul_skripsi FROM tblmahasiswa WHERE NIM=$_SESSION[NIM]");
            $take=$qry->fetch_array();
            $dosbing1=$take['dosbing1'];
            $dosbing2=$take['dosbing2'];
            $uji1=$take['dosen_penguji1'];
            $jdl=$take['judul_skripsi'];
          ?>
          <label>Judul Skripsi: <?php echo $jdl; ?> </label><br />
          <label>Dosen Pembimbing 1: <?php echo $dosbing1; ?> </label><br />
          <label>Dosen Pembimbing 2: <?php echo $dosbing2; ?> </label><br />
          <hr />
          <label>Dosen Penguji 1: <?php echo $uji1; ?> </label>
                    <input type="text" class="form-control required" name="_dosenuji1" value="<?php echo $uji1; ?>" style="display: none;" readonly><br>
          <hr />
        </div><br />
        <div class="form-group">
          <label>Scan/Foto Lembar Persetujuan Seminar 1 yang telah ditandatangani 2 Dosen Pembimbing dan Ketua Prodi:  </label>
          <input type="file" class="form-control required" name="_persyaratan[0]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/Foto Lembar Konsultasi Bimbingan Dengan Dosen Pembimbing 1: </label>
          <input type="file" class="form-control required" name="_persyaratan[1]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/Foto Lembar Konsultasi Bimbingan Dengan Dosen Pembimbing 2: </label>
          <input type="file" class="form-control required" name="_persyaratan[2]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/Foto Formulir Permohonan Ujian Seminar 1 yang telah ditandatangani Ketua Prodi: </label>
          <input type="file" class="form-control required" name="_persyaratan[3]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan/Foto Formulir Kehadiran Menonton Seminar Proposal dari Seminaris Lain: </label>
          <input type="file" class="form-control" name="_persyaratan[4]" accept="image/jpeg" /><br>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <h4 style="color: red;">Diharapkan untuk membawa semua persyaratan saat hendak mengambil undangan seminar</h4>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }}} ?>
  </form>
</div>
