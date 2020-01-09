<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pendaftaran Seminar Kuliah Kerja Praktek/Penulisan Ilmiah</h2>
</section>


<?php
 /*Cek data pendaftar pada tabel daftar seminar */
  $qry=$link->query("SELECT * from tbldaftarseminar_kkporpi WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();
  if($take['status']=='Sudah Dikonfirmasi'){
    echo "Pendaftaran Anda sudah Dikonfirmasi! Silahkan melakukan Pengajuan tanggal seminar!";}
  elseif($take['status']=='Menunggu Konfirmasi'){
    echo "Mohon maaf, pendaftaran anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
  }else{
    $qry=$link->query("SELECT dosbing1 FROM tblmahasiswa WHERE NIM=$_SESSION[NIM]");
    $take=$qry->fetch_array();
    if($take['dosbing1']!='Belum Ada'){
      echo "Anda sudah melaksaakan seminar KKP/PI";
    }else{

       /*Cek data pendaftar pada tabel seminar pi */
    $qry=$link->query("SELECT * from tblseminar_pi WHERE NIM=$_SESSION[NIM]");
    $take=$qry->fetch_array();
    if($take['hasil_seminarpi']=='Lulus'){
      echo "Anda sudah Lulus Ujian PI";
    }elseif($take['hasil_seminarpi']=='Tidak Lulus'){
      echo "Anda Tidak Lulus Ujian PI. Silahkan melakukan pendaftaran pada menu Ujian Ulang Seminar KKP/PI";
    }else{

       /*Cek data pendaftar pada tabel seminar KKP */
      $qry=$link->query("SELECT * from tblseminar_kkp WHERE NIM=$_SESSION[NIM]");
      $take=$qry->fetch_array();
      if($take['hasil_seminarkkp']=='Lulus'){
        echo "Anda sudah Lulus Ujian KKP";
      }elseif($take['hasil_seminarkkp']=='Tidak Lulus'){
        echo "Anda Tidak Lulus Ujian KKP. Silahkan melakukan pendaftaran pada menu Ujian Ulang Seminar KKP/PI";
      }else{


 ?>
<h4><h4 style="color: red;">Perhatian: </h4>Sebelum melakukan pendaftaran, pastikan seluruh persyaratan telah lengkap.</h4>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pendaftaran Seminar Kuliah Kerja Praktek</center></b>
    </div>
    <div class="panel-body">
      <form class="form required" action="index.php?ke=kkpi-smpndaftar" method="POST" id="frm-kkpi" enctype="multipart/form-data">
        <div class="form-group">
          <label>Pilihan Yang Diambil: </label>
          <select class="form-control required" name="_pilihan">
            <option hidden value="">
               Pilih
            </option>
            <option value="kkP">Kuliah Kerja Praktek</option>
            <option value="p1">Penulisan Ilmiah</option>
          </select>
        </div><br />
        <div class="form group">
          <label>Judul Yang telah Disetujui</label>
          <textarea class=" form-control required" name="_judul" placeholder="Isi Judul KKP/PI Anda"></textarea>
        </div><br />
        <div class="form-group">
          <label>Usulan Nama Dosen Penguji 1 (Nama Dosen dapat berubah sesuai dengan yang disetujui oleh Kaprodi): </label>
          <select class="form-control required" name="_dosenuji1" id="uji1">
            <option hidden value="">Pilih</option>
            <?php
              $qry = $link->query("SELECT nm_dosen from tbldosen where nm_dosen!='$_SESSION[dosen_wali]' order by nm_dosen");
              while ($data = $qry->fetch_array())
              {
              echo "<option value='$data[nm_dosen]'>$data[nm_dosen]</option>";
              }
            ?>
          </select>
        </div><br />
        <div class="form-group">
          <label>Usulan Nama Dosen Penguji 2 (Nama Dosen dapat berubah sesuai dengan yang disetujui oleh Kaprodi): </label>
          <select class="form-control required" name="_dosenuji2" id="uji2">
            <option hidden value="">Pilih</option>
            <?php
              $qry = $link->query("SELECT nm_dosen from tbldosen where nm_dosen!='$_SESSION[dosen_wali]' order by nm_dosen");
              while ($data = $qry->fetch_array())
              {
              echo "<option value='$data[nm_dosen]'>$data[nm_dosen]</option>";
              }
            ?>
          </select>
        </div><br />
        <div class="form-group">
          <label>Lembar persetujuan maju ujian yang ditandatangani oleh Dosen Wali dan Kaprodi: </label>
          <input type="file" class="form-control required" name="_file_persyaratan[0]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Lembar bimbingan KKP/PI yang dilakukan dengan Dosen Wali: </label>
          <input type="file" class="form-control required" name="_file_persyaratan[1]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Daftar hadir menonton seminar KKP/PI: </label>
          <input type="file" class="form-control" name="_file_persyaratan[2]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Surat keterangan penelitian yang distempel oleh tempat penelitian: </label>
          <input type="file" class="form-control required" name="_file_persyaratan[3]" accept="image/jpeg" /><br>
        </div>
        <div class="form-group">
          <label>Daftar wawancara yang ditandatangani oleh Responden dan distempel (Upload gambar di dalam ZIP): </label>
          <input type="file" class="form-control required" name="_file_persyaratan[4]" accept="application/zip" multiple /><br>
        </div>
        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }}}}?>
  </form>
</div>
