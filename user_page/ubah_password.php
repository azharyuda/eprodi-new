<?php
  error_reporting();
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-plus-square" aria-hidden="true" style="color: #9150B4;"></i> Ubah Password</h2>
</section>

<?php

if ( isset($_GET['stat']) && $_GET['stat'] == 'salah' )
 {
      // treat the succes case ex:
      echo "<div class='alert alert-danger alert-dismissable' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      Password baru dan Konfirmasi Password berbeda!
      </div>";
 }
 if ( isset($_GET['stat']) && $_GET['stat'] == 'sama' )
  {
       // treat the succes case ex:
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
       Password lama dan baru sama! Silahkan input baru
       </div>";
  }
  if ( isset($_GET['stat']) && $_GET['stat'] == 'kosong' )
   {
        // treat the succes case ex:
        echo "<div class='alert alert-danger alert-dismissable' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        Password lama dan baru sama! Silahkan input baru
        </div>";
   }
?>

<h4><h4 style="color: red;">Perhatian: </h4>Harap dijaga kerahasiaan password anda demi menghindari hal hal yang tidak diinginkan</h4>
<div class="panel panel-primary">
  <div class="panel-heading">
     <b><center>Ubah Password</center></b>
  </div>
  <div class="panel-body">
    <form class="form required" action="index.php?ke=passw-smpn" method="POST" id="frm-ubah" enctype="multipart/form-data">
      <div class="form-group">
        <label>Password lama: </label>
        <input type="password" class="form-control required" name='_lama' maxlength='20' Placeholder='Input password lama anda'/>
      </div>
      <div class="form-group">
        <label>Password baru: </label>
        <input type="password" class="form-control required" name='_passw' maxlength='20' Placeholder='Input password baru anda'/>
      </div>
      <div class="form-group">
        <label>Konfirmasi password baru: </label>
        <input type="password" class="form-control required" name='_konf' maxlength='20' Placeholder='Konfirmasi Password baru'/>
      </div>
      <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </form>
    </div>
  </div>
