<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Halaman Utama">
    <meta name="author" content="Azhar">
    <link rel="shortcut icon" href="photo/favicon.ico" type="image/x-icon">
    <link rel="icon" href="photo/favicon.ico" type="image/x-icon">
    <title>E-Prodi Sistem Informasi</title>

    <!-- Bootstrap core CSS -->
    <link href="bstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/animate/animate.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="dist/css/home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Belgrano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">

  </head>
<body style="color: black; background-color: #fff;">
<h1 style="text-align: center;">Registrasi Akun Mahasiswa</h1>
<p style="text-align: center;">Isilah data diri anda di bawah ini sebenar benarnya.</p>
<hr />
<div id="dftr">
  <div class="container">
    <?php
    if ( isset($_GET['stat']) && $_GET['stat'] == 'success' )
    {
         // treat the succes case ex:
         echo "<div class='alert alert-success alert-dismissable' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         Data Berhasil Disimpan!
         </div>";
    }
    if ( isset($_GET['stat']) && $_GET['stat'] == 'sama' )
    {
         // treat the succes case ex:
         echo "<div class='alert alert-danger alert-dismissable' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         Ada data yang sama!
         </div>";
    }
    if ( isset($_GET['stat']) && $_GET['stat'] == 'kosong' )
    {
         // treat the succes case ex:
         echo "<div class='alert alert-danger alert-dismissable' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         Isi semua data
         </div>";
    }
   ?>
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center>
            Input data diri
          </center>
        </div>
        <div class="panel-body">
          <form method="POST" action="proses_daftar.php" id="frm-dftr" enctype="multipart/form-data">
            <div class="form-group" autocomplete="off">
              <label>NIM</label>
              <input type="text" class="form-control required" name="_nim" placeholder="Masukkan NIM" maxlength="7" />
            </div>
            <div class="form-group">
              <label>Nama Mahasiswa</label>
              <input type="text" class="form-control required" name="_nm_mahasiswa" placeholder="Masukkan Nama" maxlength="50" />
            </div>
            <div class="form-group" autocomplete="off">
              <label>Password</label>
              <input type="password" class="form-control required" name="_passw" placeholder="Masukkan password" maxlength="20"/>
            </div>
            <div class="form-group">
              <label>E-Mail</label>
              <input type="text" class="form-control required" name="_email" placeholder="Masukkan Email" />
            </div>
            <div class="form-group">
              <label>Nama Dosen Wali</label>
              <select class="form-control required" name="_dosen_wali">
                <option hidden value="">Pilih</option>
                <?php
                  include "dist/koneksi.php";
                  $qry = $link->query("SELECT nm_dosen from tbldosen order by nm_dosen");
                  while ($data = $qry->fetch_array())
                  {
                    echo "<option value='$data[nm_dosen]'>$data[nm_dosen]</option>";
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Upload Foto Bersama dengan Identitas Diri: </label>
              <input type="file" class="form-control required" name="_file" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success">Simpan Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="bstrap/jquery/jquery.min.js"></script>
<script src="bstrap/js/bootstrap.min.js"></script>
<script src="dist/js/JQueryValidation/jquery.validate.js"></script>
<script src="dist/js/JQueryValidation/additional-methods.js"></script>



<!-- Custom scripts for this template -->
<script src="dist/js/validation.js"></script>
<script src="dist/js/drop.js"></script>
<script src="dist/js/drop2.js"></script>
</body>
