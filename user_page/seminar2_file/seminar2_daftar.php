<?php
  error_reporting();
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Seminar Hasil / Seminar 2</h2>
</section>


<?php

  $qry=$link->query("SELECT * from tbldaftarseminar_skripsi WHERE NIM=$_SESSION[NIM] AND pilihan_seminar='Seminar 2'");
  $take=$qry->fetch_array();
  if($take['status']=='Menunggu Konfirmasi'){
    echo "Mohon maaf, pendaftaran anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
  }elseif($take['status']=='Sudah Dikonfirmasi'){
    echo "Pendaftaran anda telah dikonfirmasi! Silahkan cek email anda dan tentukan tanggal seminar anda!";
  }else{

      $qry=$link->query("SELECT judul_skripsi, dosen_penguji2,dosen_penguji1 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
      $take=$qry->fetch_array();
      $qry2=$link->query("SELECT * from tblseminar_2 WHERE NIM=$_SESSION[NIM]");
      $take2=$qry2->fetch_array();
      if($take['judul_skripsi']=='Belum Ada' ){
        echo "Mohon maaf, anda belum memiliki judul skripsi. Silahkan ajukan proposal skripsi terlebih dahulu <a href='index.php?ke=proposal-aju'>disini</a>";
      }elseif($take['dosen_penguji1']=='Belum Ada'){
          echo "Anda belum dapat melakukan pendaftaran seminar hasil";
      }elseif($take2['hasil_seminar2']=='Lulus'){
        echo "Anda sudah menyelesaikan Seminar 2!";
      }elseif($take2['hasil_seminar2']=='Menunggu selesai seminar'){
        echo "Anda sudah terdaftar sebagai peserta seminar 2. Silahkan lihat jadwal seminar 2 <a href='index.php?ke=jdwl-semhas'>disini</a>";
      }elseif($take2['hasil_seminar2']=='Tidak Lulus'){
        echo "Anda tidak lulus seminar 2. Silahkan mendaftar ulang melalui halaman <a href='index.php?ke=semhas-ulang'>disini</a>";
      }elseif($take['dosen_penguji2']!='Belum Ada'){
        echo "Anda sudah memiliki dosen penguji 2. Silahkan mendaftarkan tanggal seminar atau mendaftarkan pendadaran jika sudah melaksanakan seminar hasil";

      }else{
        $qry=$link->query("SELECT * from tblseminar_proposal WHERE NIM=$_SESSION[NIM]");
        $take=$qry->fetch_array();
        if($take['hasil_seminarproposal']=='Ulang'){
          echo "Anda belum dapat mendaftarkan diri untuk seminar 2 karena harus mengulang seminar proposal terlebih dahulu";
        }elseif($take['hasil_seminarproposal']=='Menunggu selesai seminar'){
          echo "Anda belum dapat mendaftarkan diri untuk seminar 2 karena belum menyelesaikan seminar proposal";
        }else{
        $qry2=$link->query("SELECT judul_skripsi, dosen_penguji2,dosen_penguji1 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
        $take2=$qry2->fetch_array();
        $qry3=$link->query("SELECT * from tbldaftarseminar_skripsi WHERE NIM=$_SESSION[NIM] AND pilihan_seminar='Seminar 1'");
        $take3=$qry3->fetch_array();
        if($take2['dosen_penguji1']!='Belum Ada' && $take3['status']=='Sudah Dikonfirmasi'){
          echo "Anda belum melaksanakan seminar proposal";
        }elseif($take2['dosen_penguji1']!='Belum Ada' && $take3['status']==''){
  ?>

<h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Seminar Hasil</center></b>
    </div>
    <div class="panel-body">
      <form class="form required" action="index.php?ke=semhas-smpndaftar" method="POST" id="frm-sempro" enctype="multipart/form-data">
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
        <div class="form-group">
          <label>Pilih usulan dosen penguji 2 anda: </label>
          <select class="form-control required" name="_dosenuji2">
            <option hidden value="">Pilih</option>
            <?php
              $qry = $link->query("SELECT nm_dosen from tbldosen WHERE kuota_penguji2>0 AND nm_dosen!='$take[dosbing1]' AND nm_dosen!='$take[dosbing2]' AND nm_dosen != '$take[dosen_penguji1]' order by nm_dosen");
              while ($data = $qry->fetch_array())
              {
              echo "<option value='$data[nm_dosen]'>$data[nm_dosen]</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Scan Lembar Persetujuan Seminar 2 yang telah ditandatangani 2 Dosen Pembimbing dan Ketua Prodi:  </label>
          <input type="file" class="form-control required" name="_persyaratan[0]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan Lembar Konsultasi Bimbingan Dosen Pembimbing 1: </label>
          <input type="file" class="form-control required" name="_persyaratan[1]" accept="image/jpeg" multiple /><br>
        </div>
        <div class="form-group">
          <label>Scan Lembar Konsultasi Bimbingan Dosen Pembimbing 2: </label>
          <input type="file" class="form-control required" name="_persyaratan[2]" accept="image/jpeg" multiple /><br>
        </div>
        <div class="form-group">
          <label>Scan Formulir Permohonan Ujian Seminar 2 yang telah ditandatangani Ketua Prodi: </label>
          <input type="file" class="form-control required" name="_persyaratan[3]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan Formulir Kehadiran Menonton Seminar Proposal dari Seminaris Lain: </label>
          <input type="file" class="form-control required" name="_persyaratan[4]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan Fotocopy Sertifikat telah melaksanakan dan lulus tes TOEFL dengan skor minimal 400: </label>
          <input type="file" class="form-control required" name="_persyaratan[5]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan Fotocopy Sertifikat Pendidikan Karakter (Misal: ESQ, Bela Negara, dll): </label>
          <input type="file" class="form-control required" name="_persyaratan[6]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Scan Fotocopy Sertifikat Kompetensi(Misal: CISCO, Oracle, dll): </label>
          <input type="file" class="form-control required" name="_persyaratan[7]" accept="image/jpeg" /><br>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }}}} ?>
  </form>
</div>
