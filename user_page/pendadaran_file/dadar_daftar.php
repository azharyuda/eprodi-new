<?php
  error_reporting();
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Seminar Pendadaran</h2>
</section>


<?php
  $qry=$link->query("SELECT * from tblseminar_pendadaran WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();

  if($take['hasil_pendadaran']=='Lulus'){
    echo "Anda sudah Lulus Ujian Seminar Pendadaran. Silahkan lengkapi berkas untuk keperluan Yudisium anda. Selamat!";}
  elseif($take['hasil_pendadaran']=='Menunggu selesai seminar'){
    echo "Pendaftaran anda telah dikonfirmasi! Silahkan cek E-Mail anda untuk info lebih lanjut atau lihat <a href='index.php?ke=jdwl-dadar'>Jadwal Pendadaran</a>";
  }elseif($take['hasil_pendadaran']=='Tidak Lulus' || $take['hasil_pendadaran']==''){

        $qry=$link->query("SELECT * from tbldaftar_pendadaran WHERE NIM=$_SESSION[NIM]");
        $take=$qry->fetch_array();

        if($take['status']=='Menunggu Konfirmasi'){
          echo "Mohon maaf, pendaftaran anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
        }elseif($take['status']=='Sudah Dikonfirmasi'){
          echo "Pendaftaran anda telah dikonfirmasi! Silahkan cek E-Mail anda untuk info lebih lanjut dan tentukan tanggal pendadaran anda";
        }elseif(empty($take)){

          $qry=$link->query("SELECT judul_skripsi, dosen_penguji1, dosen_penguji2 from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
          $take=$qry->fetch_array();
          $qry2=$link->query("SELECT * from tbldaftarseminar_skripsi WHERE NIM=$_SESSION[NIM]");
          $take2=$qry2->fetch_array();
          $qry3=$link->query("SELECT * from tblseminar_2 WHERE NIM=$_SESSION[NIM]");
          $take3=$qry3->fetch_array();
          if($take['judul_skripsi']=='Belum Ada'){
            echo "Mohon maaf, anda belum memiliki judul skripsi. Silahkan ajukan proposal skripsi terlebih dahulu <a href='index.php?ke=proposal-aju'>disini</a>";
          }elseif($take['dosen_penguji1']=='Belum ada' || $take['dosen_penguji2']=='Belum Ada'){
            echo "Anda belum dapat mendaftar Pendadaran";
          }elseif($take2['status']=='Sudah Dikonfirmasi' || $take2['status']=='Menunggu Konfirmasi'){
            echo "Anda belum melaksanakan seminar hasil";
          }elseif($take3['hasil_seminar2']=='Tidak Lulus'){
            echo "Anda tidak lulus seminar 2. silahkan mendaftar seminar 2 ulang";
          }else{

  ?>

 <?php
 if ( isset($_GET['stat']) && $_GET['stat'] == 'success' )
 {
      // treat the succes case ex:
      echo "<div class='alert alert-success alert-dismissable' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      Data Berhasil Disimpan!
      </div>";
 }
 elseif ( isset($_GET['stat']) && $_GET['stat'] == 'dosen-sama' )
  {
       // treat the succes case ex:
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
       Data Dosen ada yang sama!
       </div>";
  }
  elseif ( isset($_GET['stat']) && $_GET['stat'] == 'pilihan-salah' )
   {
        // treat the succes case ex:
        echo "<div class='alert alert-danger alert-dismissable' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        Pilihan yang diambil tidak tersedia! Silahkan Pilih KKP atau PI!
        </div>";
   }
 ?>
 <h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>

<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Seminar Pendadaran</center></b>
    </div>
    <div class="panel-body">
      <form class="form required" action="index.php?ke=dadar-smpndaftar" method="POST" id='frm-sempro'enctype="multipart/form-data">
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
          <label>Lembar Persetujuan Seminar Pendadaran yang telah ditandatangani 2 Dosen Pembimbing, 2 dosen penguji dan Ketua Prodi:  </label>
          <input type="file" class="form-control required" name="_syarat[0]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Lembar Konsultasi Bimbingan dengan dosen pembimbing 1: </label>
          <input type="file" class="form-control required" name="_syarat[1]" accept="image/jpeg" multiple /><br>
        </div>
        <div class="form-group">
          <label>Lembar Konsultasi Bimbingan dengan dosen pembimbing 2: </label>
          <input type="file" class="form-control required" name="_syarat[2]" accept="image/jpeg" multiple /><br>
        </div>
        <div class="form-group">
          <label>Formulir Permohonan Ujian Seminar Pendadaran yang telah ditandatangani Ketua Prodi: </label>
          <input type="file" class="form-control required" name="_syarat[3]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>File Skripsi yang telah direvisi (upload dalam format ZIP): </label>
          <input type="file" class="form-control required" name="_syarat[4]" accept="application/zip" /><br>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
<?php }}} ?>
  </form>
</div>
