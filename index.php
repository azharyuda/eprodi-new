<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Halaman Utama">
    <meta name="author" content="">
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
    <link href="dist/js/datatables/datatables.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Belgrano" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">

  </head>
  <body>

    <!-- Navigation Bar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="parallax">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#home" class="navbar-brand">E-Prodi Sistem Informasi</a>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="nav navbar-nav pull-right">
              <li><a href="#tentang">Tentang</a></li>
              <li><a href="#layanan">Layanan</a></li>
              <li><a href="#jadwal">Jadwal Seminar</a></li>
              <li><a href="daftar.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
          </div>
        </div>
        </div>
      </nav>

      <!--Landing Page -->
      <div class="jumbotron" id="home" style="background-image: url('photo/slide4.jpg');">
        <div class="container animated fadeIn">
          <h1><center>E-Prodi Sistem Informasi</center></h1>
          <p><center>Selamat Datang di Sistem Pelayanan Akademik Program Studi Sistem Informasi STMIK Widya Cipta Dharma</center></p>
        </div>
      </div>
      </div>

      <!--Tentang E-Prodi -->
      <div id="tentang">
        <div class="container">
          <div class="page-header test">
            <h1><center>Apa Itu E-Prodi?</center></h1>
          </div>
          <div class="isi test">
            <h5><center>E-Prodi adalah sebuah sistem pelayanan akademik untuk mahasiswa pada Program Studi Sistem Informasi
            STMIK Widya Cipta Dharma.</center></h5>
          </div>
        </div>
      </div>

      <!--Layanan -->
      <div id="layanan">
        <div class="container">
          <div class="page-header test">
            <h1><center>Layanan yang ditawarkan</center></h1>
            <h5><center>Layanan Akademik yang ditawarkan kepada mahasiswa Program Studi Sistem Informasi STMIK Widya Cipta Dharma meliputi:</center></h5>
          </div>
          <div class="row">
            <div class="col-md-3 test">
              <h3><center>Pendaftaran Seminar KKP/PI</center></h3>
              <h5><center>Mahasiswa dapat melakukan pendaftaran seminar Kuliah Kerja Praktek (KKP) ataupun Seminar
              Penulisan Ilmiah (PI) melalui sistem ini</center></h5>
            </div>
            <div class="col-md-3 test">
              <h3><center>Pengajuan Proposal Skripsi</center></h3>
              <h5><center>Pengajuan proposal skripsi kepada Ketua Prodi dapat dilakukan melalui sistem ini</center></h5>
            </div>
            <div class="col-md-3 test">
              <h3><center>Pendaftaran Seminar Skripsi</center></h3>
              <h5><center>Mahasiswa dapat melakukan pendaftaran seminar skripsi (seminar proposal, hasil, dan atau pendadaran) melalui website ini.</center></h5>
            </div>
            <div class="col-md-3 test">
              <h3><center>Jadwal Seminar</center></h3>
              <h5><center>Mahasiswa dapat melihat jadwal seminar KKP, PI, dan seminar Skripsi (Proposal, Hasil, dan Pendadaran) Melalui Website ini.</center></h5>
            </div>
          </div>
        </div>
      </div>

      <div id="jadwal">
        <div class="container">
          <div class="page-header test">
            <h1><center>Jadwal Seminar Mahasiswa Prodi SI</center></h1>
            <h5><center>Berikut ini adalah jadwal seminar mahasiswa Program Studi Sistem Informasi</center></h5>
          </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#kkp" data-toggle="tab">KKP</a></li>
              <li><a href="#PI" data-toggle="tab">PI</a></li>
              <li><a href="#sempro" data-toggle="tab">Seminar Proposal</a></li>
              <li><a href="#semhas" data-toggle="tab">Seminar Hasil</a></li>
              <li><a href="#dadar" data-toggle="tab">Seminar Pendadaran</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="kkp">
                <?php include "home_page/kkp.php"; ?>
              </div>
              <div class="tab-pane" id="PI">
                <?php include "home_page/pi.php"; ?>
              </div>
              <div class="tab-pane" id="sempro">
                <?php include "home_page/sempro.php"; ?>
              </div>

              <div class="tab-pane" id="semhas">
                <?php include "home_page/semhas.php"; ?>
              </div>

              <div class="tab-pane" id="dadar">
                <?php include "home_page/dadar.php"; ?>
              </div>
            </div>
        </div>
      </div>

      <!--Register -->
      <div id="daftar">
        <div class="container">
          <div class="page-header">
            <h2><center>
              Belum Punya Akun? Segera Daftar!
            </center></h2>
            <div class="isi">
              <h5><center>
                <a class="btn btn-primary" href="daftar.php">Klik Tombol untuk Daftar!</a>
              </center></h5>
            </div>
          </div>
        </div>
      </div>

        <!--footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="bstrap/js/jquery.min.js"></script>
    <script src="bstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/datatables/datatables.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>


    <!-- Custom scripts for this template -->
    <script src="dist/js/home.js"></script>
    <script src="dist/js/table.js"></script>
    <script>
      function cek_proposal(obj){
        var value=obj.value;
      if(value=="sem1"){
          $("#dosenuji1").css('display','block');
          $("#uji1").css('display','block');
          $("#usul_uji2").css('display','block');
          $("#usul_dosenuji2").css('display','block');
          $("#dosenuji2").css('display','none');
          $("#uji2").css('display','none');
          $("#usul_uji1").css('display','none');
          $("#usul_dosenuji1").css('display','none');
        }
        else if(value=="sem2"){
          $("#dosenuji1").css('display','block');
          $("#uji1").css('display','block');
          $("#dosenuji2").css('display','block');
          $("#uji2").css('display','block');
          $("#usul_uji1").css('display','none');
          $("#usul_dosenuji1").css('display','none');
          $("#usul_uji2").css('display','none');
          $("#usul_dosenuji2").css('display','none');
        }
        else if(value=="blm"){
          $("#dosenuji1").css('display','none');
          $("#uji1").css('display','none');
          $("#dosenuji2").css('display','none');
          $("#uji2").css('display','none');
          $("#usul_uji1").css('display','block');
          $("#usul_dosenuji1").css('display','block');
          $("#usul_uji2").css('display','block');
          $("#usul_dosenuji2").css('display','block');
        }
    }
    </script>
    <script>
      window.sr=ScrollReveal();
      sr.reveal('.test');
    </script>
  </body>

</html>
