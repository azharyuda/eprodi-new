<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>
<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Pendaftaran Seminar KKP atau PI</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=kkP-P1">KKP/PI</a></li>
    <li class="active">
      Input Ruangan Seminar KKP / PI
    </li>
  </ol>
</section>

<?php
  if(isset($_GET['num'])==1){echo "<div class='alert alert-danger alert-dismissable' role='alert'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ruangan sudah terisi</div>";}

  else if(isset($_GET['num'])==2){ echo "<div class='alert alert-danger alert-dismissable' role='alert'>Email Gagal dikirim</div>";}
  else if(isset($_GET['num'])==3){ echo "<div class='alert alert-danger alert-dismissable' role='alert'>Data gagal tersimpan dan Email Gagal dikirim</div>";}
?>
<br />
<br />
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Konfirmasi Seminar Penulisan Ilmiah</center></b>
    </div>
    <br />

    <?php
      include "dist/koneksi.php";
      $kode=htmlspecialchars(addslashes(trim($_GET['kode'])));
      $qry=$link->query("SELECT * FROM tblseminar_pi WHERE kode_daftar='$kode'") or die(mysqli_error());
      while ($data=$qry->fetch_array())
      {
    ?>

    <form class="form-horizontal required" action="index2.php?ke=P1_ruangsmpn" method="POST" id="frm-tgl">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_kode" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
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
        <label class="control-label col-sm-2">Judul KKP / PI</label>
        <div class="col-sm-5">
          <textarea name="_judul_KKPorPI" class="form-control" readonly="readonly"><?php echo $data['judul_pi']; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Wali</label>
        <div class="col-sm-5">
          <input type="text" name="_dosen_wali" class="form-control" readonly="readonly" value="<?php echo $data2['dosen_wali']; ?>">
        </div>
      </div>
    <?php } ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Penguji 1</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" readonly="readonly" name="_dosenuji1" value="<?php echo $data['dosen_uji1']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Penguji 2</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" readonly="readonly" name="_dosenuji2"  value="<?php echo $data['dosen_uji2']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Tanggal Maju</label>
        <div class="col-sm-5">
          <input type="date" class="form-control required" name="_tanggal_maju" value="<?php echo $data['tanggal_maju']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Waktu</label>
        <div class="col-sm-5">
          <input type="time" class="form-control required" name="_waktu" value="<?php echo $data['waktu']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Apakah Persyaratan sudah lengkap dan terpenuhi?</label>
        <div class="col-sm-5">
          <select class="form-control required" name="_konf" id="konf" onchange="cek_syarat(this);">
            <option hidden value="">Pilih</option>
            <option value="y4">Ya</option>
            <option value="tdK">Tidak</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" id="lbl_ruang"  style="display: none;" >Ruangan</label>
        <label class="control-label col-sm-2" id="lbl_syarat"  style="display: none;" >Persyaratan yang kurang (Tulis dengan detail)</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" id="ruang" name="_ruangan" placeholder="Masukkan Ruangan" style="display: none;" maxlength="2">
          <textarea class="form-control required" id="kurang" name="_kurang" placeholder="Masukkan Syarat yang Kurang" style="display: none;"></textarea>
          <br />
          <button class="btn btn-success " type="submit" name="simpan" value="sempr0_konf"><i class= "fa fa-check-square fa-fw"></i> Konfirmasi Data</button>
        </div>
      </div>
    <?php } ?>
  </form>
</div>
