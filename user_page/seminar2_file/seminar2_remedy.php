<?php
  error_reporting();
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Ujian Ulang Seminar Hasil / Seminar 2</h2>
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
        echo "Anda belum melaksanakan Ujian Proposal!";
      }elseif($take['dosen_penguji2']=='Belum Ada'){
        echo "Anda belum pernah melaksanakan seminar 2";
      }elseif($take['dosen_penguji2']!='Belum Ada' && $take2['hasil_seminar2']=='' || $take2['hasil_seminar2']=='Lulus'){
          echo "Anda sudah lulus seminar 2";
      }elseif($take2['hasil_seminar2']=='Tidak Lulus'){

  ?>

<h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Seminar Hasil</center></b>
    </div>
    <div class="panel-body">
      <form class="form required" action="index.php?ke=semhas-remed" method="POST" id="frm-sempro" enctype="multipart/form-data">
          <h5>Dosen Pembimbing dan Penguji anda: </h5>
          <hr />
          <?php
          $qry=$link->query("SELECT dosbing1, dosbing2, dosen_penguji1, dosen_penguji2 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
          $take=$qry->fetch_array();
           ?>
          <h5><b>Dosen Pembimbing: </b></h5>
          <h5>1. Dosen Pembimbing 1: <b><?php echo $take['dosbing1']; ?></b></h5>
          <h5>2. Dosen Pembimbing 2: <b><?php echo $take['dosbing2']; ?></b></h5>
          <hr />
          <h5><b>Dosen Penguji: </b></h5>
          <h5>1. Dosen Penguji/Pembahas 1: <b><?php echo $take['dosen_penguji1']; ?></b></h5>
          <h5>1. Dosen Penguji/Pembahas 2: <b><?php echo $take['dosen_penguji2']; ?></b></h5>
          <hr />
        <div class="form-group">
          <select class="form-control required" name="_dosenuji2" style="display: none;">
            <?php
              $qry = $link->query("SELECT dosen_penguji2 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
              while ($data = $qry->fetch_array())
              {
              echo "<option value='$data[dosen_penguji2]'>$data[dosen_penguji2]</option>";
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
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }} ?>
  </form>
</div>
