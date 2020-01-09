<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Pendaftaran Akun Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=mh5_dftr">Mahasiswa</a></li>
    <li class="active">
      Konfirmasi Pendaftaran
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
       <b><center>Konfirmasi Pendaftaran Akun Mahasiswa</center></b>
    </div>
    <br />

    <?php
      include "dist/koneksi.php";
      $kod=$_GET['urut'];
      $qry=$link->query("SELECT * FROM tblmahasiswa WHERE id='$kod'");
      while ($data=$qry->fetch_array())
      {
    ?>

    <form class="form-horizontal required" action="index2.php?ke=mh5_smpnkonf" method="POST" id="konf-akun">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_id" value="<?php echo $data['id']; ?>" style="display: none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data['nm_mahasiswa']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">E-Mail</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data['email']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Apakah Mahasiswa Diberikan Akses?</label>
        <div class="col-sm-5">
          <select class="form-control required" name="_status_akun" id="konf" onchange="cek_konf(this);">
            <option hidden value="">Pilih</option>
            <option value="y4">Ya</option>
            <option value="tdK">Tidak</option>
          </select>
        </div>
        <button class="btn btn-success " type="submit" name="simpan" value="sempr0_konf"><i class= "fa fa-check-square fa-fw"></i> Konfirmasi Data</button>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" id="lbl_alasan"  style="display: none;" >Alasan Tidak Diterima</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" id="alasan" name="_kurang" placeholder="Masukkan Alasan" style="display: none;">""
          <br />

        </div>
      </div>

  </form>
  <?php } ?>
</div>
