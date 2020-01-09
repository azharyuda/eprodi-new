  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?ke=home"><b>E-Prodi Sistem Informasi</b></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
              <a class="dropdown" data-toggle="dropdown" href="#"> Kuliah Kerja Praktek/Penulisan Ilmiah <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="index.php?ke=kkpi-daftar">Daftar Seminar KKP atau PI</a></li>
                <li><a href="index.php?ke=kkpi-ruang">Input Tanggal Seminar KKP atau PI</a></li>
                <li><a href="index.php?ke=jdwl-KKp">Jadwal Seminar Kuliah Kerja Praktek</a></li>
                <li><a href="index.php?ke=jdwl-p1">Jadwal Seminar Penulisan Ilmiah</a></li>
                <li><a href="index.php?ke=kkpi-remedy">Daftar Ujian Ulang Seminar KKP atau PI</a></li>
              </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown" data-toggle="dropdown" href="#">Proposal Skripsi <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?ke=proposal-aju">Pengajuan Proposal Skripsi</a></li>
                  <li><a href="index.php?ke=ubah-jdl">Ubah Judul Skripsi</a></li>
                  <li><a href="index.php?ke=proposal-ganti">Ubah Proposal Skripsi</a></li>
                  <li><a href="index.php?ke=daftar">Lihat Daftar Skripsi Terdahulu</a></li>
                </ul>
              </li>
              <li class="dropdown">
                  <a class="dropdown" data-toggle="dropdown" href="#">Seminar Proposal <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?ke=sempr0-dftr">Daftar Seminar Proposal</a></li>
                    <li><a href="index.php?ke=sempr0-ruang">Input Tanggal Seminar Proposal</a></li>
                    <li><a href="index.php?ke=jdwl-sempr0">Jadwal Seminar Proposal Mahasiswa SI</a></li>
                    <li><a href="index.php?ke=sempr0-ulang">Daftar Seminar Proposal</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown" data-toggle="dropdown" href="#">Seminar Hasil <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="index.php?ke=semhas-dftr">Daftar Seminar Hasil</a></li>
                      <li><a href="index.php?ke=semhas-ruang">Input Tanggal Seminar Hasil</a></li>
                      <li><a href="index.php?ke=jdwl-semhas">Jadwal Seminar Hasil Mahasiswa SI</a></li>
                      <li><a href="index.php?ke=semhas-ulang">Daftar Ujian Ulang Seminar Hasil</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown" data-toggle="dropdown" href="#">Pendadaran <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="index.php?ke=dadar-dftr">Daftar Pendadaran</a></li>
                        <li><a href="index.php?ke=dadar-ruang">Input Tanggal Seminar Pendadaran</a></li>
                        <li><a href="index.php?ke=jdwl-dadar">Jadwal Pendadaran Mahasiswa SI</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">Dosen <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="index.php?ke=dosen-list">Daftar Dosen</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                          <a class="dropdown" data-toggle="dropdown" href="#">Penggunaan <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="index.php?ke=petunjuk">Petunjuk Penggunaan Sistem</a></li>
                          </ul>
                        </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a class="dropdown" data-toggle="dropdown" href="#">Halo, <?php echo $_SESSION['nm_mahasiswa']; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="index.php?ke=passw-gnti">Ubah Password</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </nav>
