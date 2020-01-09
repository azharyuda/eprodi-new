<?php error_reporting(E_ALL); ?>
<section class="main page-header">
  <h4><i class="fa fa-edit fa-fw" style="color:#9150B4;"></i> Halaman Ubah Data Dosen</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=d5n">Menu Dosen</a>
    <li class="active">Menu Ubah Data Dosen</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Ubah Data Dosen
      </center>
    </div>
    <br />

    <?php
    include "dist/koneksi.php";
    $nidn = htmlspecialchars(addslashes(trim($_GET['nidn'])));
    $qry=mysqli_query($link, "SELECT * FROM tbldosen WHERE NIDN='$nidn'");
    while ($data=mysqli_fetch_array($qry))
    {
     ?>
    <form class="form-horizontal required" action="index2.php?ke=smpn_ubhdsn" method="POST" id="frm-dsn">
      <div class="form-group">
        <label class="control-label col-sm-2" style="display: none;">NIDN</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="_NIDN" value="<?php echo $data['NIDN'] ?>" style="display: none;">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nama Dosen</label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" name="_nm_dosen" value="<?php echo $data['nm_dosen'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Pembimbing 1</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_pembimbing1" style="width: 50px;" maxlength="2" value="<?php echo $data['kuota_pembimbing1'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Pembimbing 1</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_pembimbing2" style="width: 50px;" maxlength="2" value="<?php echo $data['kuota_pembimbing2'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 1</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_penguji1" style="width: 50px;" maxlength="2" value="<?php echo $data['kuota_penguji1'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 2</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_penguji2" style="width: 50px;" maxlength="2" value="<?php echo $data['kuota_penguji2'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 1 KKP/PI</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_penguji1_kkpi" style="width: 50px;" maxlength="2" value="<?php echo $data['kuotapenguji1_kkpi'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 2 KKP/PI</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_penguji2_kkpi" style="width: 50px;" maxlength="2" value="<?php echo $data['kuotapenguji2_kkpi'] ?>">
          <br />
          <button type="submit" class="btn btn-success" name="update"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>
      </div>
    <?php } ?>
    </form>
  </div>
