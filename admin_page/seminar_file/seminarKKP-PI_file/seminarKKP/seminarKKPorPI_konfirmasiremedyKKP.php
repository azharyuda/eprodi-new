<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>
<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Pendaftaran Seminar KKP</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=kkP">KKP</a></li>
    <li class="active">
      Konfirmasi Seminar KKP
    </li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Konfirmasi Ujian Ulang Seminar KKP</center></b>
    </div>
    <br />

    <?php
      include "dist/koneksi.php";
      $kode=htmlspecialchars(addslashes(trim($_GET['kode'])));
      $qry=$link->query("SELECT * FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'") or die(mysqli_error());
      while ($data=$qry->fetch_array())
      {
    ?>

    <form class="form-horizontal required" action="index2.php?ke=kkP_smpnremed" method="POST" id="frm-kkpi">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_kode" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
        </div>
      </div>

      <?php
        $qr2=$link->query("SELECT nm_mahasiswa, dosen_wali, email FROM tblmahasiswa WHERE NIM=$data[NIM]") or die(mysqli_error());
        while ($data2=$qr2->fetch_array())
        {
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data2['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data2['email']; ?>"  style="display:none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Pilihan yang diambil</label>
        <div class="col-sm-5">
          <input type="text" name="_pilihan_KKPorPI" class="form-control required" readonly="readonly" value="<?php echo $data['pilihan_KKPorPI']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Judul KKP / PI</label>
        <div class="col-sm-5">
          <textarea name="_judul_KKPorPI" class="form-control required" readonly="readonly"><?php echo $data['judul_KKPorPI']; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Wali</label>
        <div class="col-sm-5">
          <input type="text" name="_dosen_wali" class="form-control required" readonly="readonly" value="<?php echo $data2['dosen_wali']; ?>">
        </div>
      </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Dosen Penguji 1</label>
      <div class="col-sm-5">
        <input type="text" class="form-control required" name="_rekom_dosenuji1" value="<?php echo $data['rekom_dosenuji1']; ?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Dosen Penguji 2</label>
      <div class="col-sm-5">
        <input type="text" class="form-control required" name="_rekom_dosenuji2" value="<?php echo $data['rekom_dosenuji2']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Apakah Persyaratan telah lengkap?</label>
      <div class="col-sm-5">
        <select class="form-control required" name="_cek" onchange="sar(this)">
            <option hidden value="">Pilih</option>
            <option value="yak">Sudah Lengkap</option>
            <option value="nope">Tidak Lengkap</option>
        </select>
      </div>
        <button type="submit" class="btn btn-success" value="update"><i class="fa fa-check-square fa-fw"></i> Konfirmasi</button>
      </div>
        <div class="form-group">
          <label class="control-label col-sm-2" id="syarat" style="display:none;">Syarat yang tidak lengkap: </label>
          <div class="col-sm-5">
            <textarea class="form-control required" name="_syarat" id="sarat" style="display:none;" placeholder="Isikan Alasan"></textarea>
          </div>
        </div>
  <?php }} ?>
  </form>
</div>
