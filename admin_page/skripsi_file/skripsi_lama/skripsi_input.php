<?php error_reporting(E_ALL ^ (E_NOTICE));
include "dist/koneksi.php";

if ( isset($_GET['success']) && $_GET['success'] == 'kosong' )
{
    // treat the succes case ex:
    echo "<div class='alert alert-success alert-dismissable' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    data kosong!
    </div>";
  }
  else if ( isset($_GET['success']) && $_GET['success'] == 'sama' )
  {
      // treat the succes case ex:
      echo "<div class='alert alert-success alert-dismissable' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      data sama!!
      </div>";
    }
  ?>

<section class="main page-header">
  <h4><i class="fa fa-plus-circle fa-fw" style="color:#9150B4;"></i> Halaman Input Data Skripsi Terdahulu</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=skrP">Menu Skripsi Terdahulu</a>
    <li class="active">Input Skripsi</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Input Data Skripsi Terdahulu
      </center>
    </div>
    <br />
    <form class="form-horizontal required" action="index2.php?ke=smpn_skrp" method="POST" id="skrip-lama">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" placeholder="Masukkan NIM" maxlength"7">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" name="_nm_mhs" placeholder="Masukkan Nama Mahasiswa" maxlength="50">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-xs-3">
          <select class="form-control required" name="_tpk">
              <option hidden value="">Pilih Topik Skripsi</option>
              <?php
              $ambil=$link->query("SELECT * from tbltopik_skripsi");
              while($tampil=$ambil->fetch_array()){
                echo "<option value='$tampil[id_topik]'>
                $tampil[topik_skripsi]
                </option>";
              }
               ?>

          </select></div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-xs-8">
          <textarea class="form-control required" name="_judul" placeholder="Masukkan Judul Skripsi"></textarea>
          <br />
          <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>
      </div>
    </form>
  </div>
