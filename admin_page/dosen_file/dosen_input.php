<section class="main page-header">
  <h4><i class="fa fa-plus-circle fa-fw" style="color:#9150B4;"></i> Halaman Input Data Dosen</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=d5n">Menu Dosen</a>
    <li class="active">Input Dosen</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Input Data Dosen
      </center>
    </div>
    <br />
    <form class="form-horizontal required" action="index2.php?ke=smpn_dsn" method="POST" id="frm-dsn">
      <div class="form-group">
        <label class="control-label col-sm-2">NIDN</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIDN" placeholder="Masukkan NIDN">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nama Dosen</label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" name="_nm_dosen" placeholder="Masukkan Nama Dosen">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Pembimbing 1</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_pembimbing1" placeholder="Masukkan Kuota Pembimbing 1" maxlength="2">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Pembimbing 2</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_pembimbing2" placeholder="Masukkan Kuota Pembimbing 2" maxlength="2">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 1</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_penguji1" placeholder="Masukkan Kuota Penguji 1" maxlength="2">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 2</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_kuota_penguji2" placeholder="Masukkan Kuota Penguji 2">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 1 KKP/PI</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_penguji1_kkpi" placeholder="Masukkan Kuota Penguji 2">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Kuota Penguji 2 KKP/PI</label>
        <div class="col-xs-3">
          <input type="text" class="form-control required" name="_penguji2_kkpi" placeholder="Masukkan Kuota Penguji 2">
          <br />
          <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>
      </div>
    </form>
  </div>
