<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Pendaftaran Tanggal Maju Seminar 1</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=sempr0">Seminar 1</a></li>
    <li class="active">
      Konfirmasi Tanggal Maju dan Ruangan Seminar 1
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
       <b><center>Konfirmasi Seminar 1 Skripsi</center></b>
    </div>
    <br />

    <?php
      include "dist/koneksi.php";
      $kod=htmlspecialchars(addslashes(trim($_GET['kd'])));
      $qry=$link->query("SELECT * FROM tblseminar_proposal WHERE kode_daftar='$kod'") or die(mysqli_error());
      while ($data=$qry->fetch_array())
      {
    ?>

    <form class="form-horizontal required" action="index2.php?ke=sempr0_smpn" method="POST" id="frm-tgl">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_kod" value="<?php echo $data['kode_daftar']; ?>"style="display: none;">
        </div>
      </div>

      <?php
        $qr2=$link->query("SELECT nm_mahasiswa, judul_skripsi, email FROM tblmahasiswa WHERE NIM=$data[NIM]") or die(mysqli_error());
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
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-sm-5">
          <textarea name="_judul_skripsi" class="form-control" readonly="readonly"><?php echo $data2['judul_skripsi']; ?></textarea>
        </div>
      </div>
    <?php } ?>

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
          <input type="text" class="form-control required" id="kurang" name="_kurang" placeholder="Masukkan Syarat yang Kurang" style="display: none;">
          <br />
          <button class="btn btn-success " type="submit" name="simpan" value="sempr0_konf"><i class= "fa fa-check-square fa-fw"></i> Konfirmasi Data</button>
        </div>
      </div>
    <?php } ?>
  </form>
</div>
