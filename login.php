<?php
	error_reporting();
	session_start();
	if(isset($_SESSION['NIM']) and
	isset($_SESSION['passw']))
	{
		header("location: user_page\index.php");
	}else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login">
    <meta name="author" content="Azhar">
		<link rel="shortcut icon" href="photo/favicon.ico" type="image/x-icon">
    <link rel="icon" href="photo/favicon.ico" type="image/x-icon">

    <title>Mahasiswa Login | E-Prodi Sistem Informasi</title>

    <!-- Bootstrap core CSS -->
    <link href="bstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/animate/animate.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="dist/css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Belgrano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">

  </head>
  <body style="background-image: url('photo/Alihossein.jpg')">
    <div class="container">
      <div class="row" style="margin-top:200px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="panel panel-primary animated">
            <div class="panel-body">
              <form action="ceklogin.php" method="POST" autocomplete="new-password">
                <h2 style="color: #000"><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span> Login Mahasiswa</h2>
                <hr>
                <?php
                if ( isset($_GET['stat']) && $_GET['stat'] == 'belum-aktif' )
                {
                     // treat the succes case ex:
                     echo "<div class='alert alert-danger alert-dismissable' role='alert'>
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                     Akun anda belum aktif. Silahkan tunggu 2x24 Jam atau hubungi Ketua Program Studi Sistem Informasi
                     </div>";
                }
                else if ( isset($_GET['stat']) && $_GET['stat'] == 'tidak-terdaftar' )
                {
                     // treat the succes case ex:
                     echo "<div class='alert alert-danger alert-dismissable' role='alert'>
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                     NIM tidak terdaftar. Silahkan daftar terlebih dahulu <a href='daftar.php'>disini</a>
                     </div>";
                }
                if ( isset($_GET['stat']) && $_GET['stat'] == 'salah' )
                {
                     // treat the succes case ex:
                     echo "<div class='alert alert-danger alert-dismissable' role='alert'>
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                     Username atau Password salah
                     </div>";
                }
                 ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                  <input type="text" name="_nim" class="form-control input-lg" placeholder="Masukkan NIM Anda">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" name="_passw" class="form-control input-lg" placeholder="Password">
                </div>
                  <hr>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="submit" class="btn btn-md btn-success btn-block" value="Sign In">
                        <hr class="pemisah" />
                        <a class="btn btn-info btn-md btn-block" href="daftar.php">Daftar Akun Baru</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="bstrap/js/jquery.min.js"></script>
        <script src="bstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
      </body>
    <?php }?>
