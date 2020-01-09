<?php error_reporting(E_ALL);
include "dist/koneksi.php";

  ?>

<section class="main page-header">
  <h4><i class="fa fa-plus-circle fa-fw" style="color:#9150B4;"></i> Halaman Ubah Password</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Ubah Password</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Ubah Password
      </center>
    </div>
    <br />
    <form class="form-horizontal required" action="index2.php?ke=smpn-pass" method="POST" id="ubah-pass">
      <div class="form-group">
        <label class="control-label col-sm-2">Password lama: </label>
        <div class="col-sm-5">
          <input type="password" class="form-control required" name="_lama" id="passlama" maxlength='20' placeholder="Password Lama Anda">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Password baru: </label>
        <div class="col-sm-7">
          <input type="password" class="form-control required" name="_passw" id="passbaru" maxlength='20' placeholder="Password Baru">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Konfirmasi Password baru: </label>
        <div class="col-sm-7">
          <input type="password" class="form-control required" name="_konf" maxlength='20' placeholder="Konfirmasi Password baru">
          <br />
            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>
      </div>
        </div>
      </div>
    </form>
  </div>
