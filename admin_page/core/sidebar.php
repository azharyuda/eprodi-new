
<div class="col-sm-3 col-md-2 sidebar" id="sidebar">
  <div class="header">
    <h5><center>
      Admin Main Menu
    </center></h5>
  </div>
  <?php
  if($_SESSION['level']=='Ketua Prodi'){
  ?>
  <ul class="nav nav-sidebar">
    <li class="parentmenu"><a href="#mhs" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-user-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Mahasiswa</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="mhs">
      <li><a href="index2.php?ke=mh5_dftr"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Akun</a></li>
      <li><a href="index2.php?ke=mh5_aktif"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa yang telah terdaftar di e-Prodi</a></li>
      <li><a href="index2.php?ke=mh5_predik"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Lihat Jadwal Prediksi Skripsi</a></li>
  </ul>
    <li class="parentmenu"><a href="#KKP" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar KKP</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="KKP">
      <li><a href="index2.php?ke=kkP_dftr"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Seminar KKP</a></li>
      <li><a href="index2.php?ke=kkP_ruang"><i class="fa fa-plus-square-o fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar KKP</a></li>
      <li><a href="index2.php?ke=kkP_jdwl"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Mahasiswa maju seminar KKP</a></li>
      <li><a href="index2.php?ke=kkP_sdhmju"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa Yang telah melaksanakan seminar KKP</a></li>
      <li><a href="index2.php?ke=kkP_remed"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Ujian Ulang Seminar KKP</a></li>
    </ul>

    <li class="parentmenu"><a href="#PI" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar PI</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="PI">
      <li><a href="index2.php?ke=P1_dftr"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Seminar PI</a></li>
      <li><a href="index2.php?ke=P1_ruang"><i class="fa fa-plus-square-o fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar PI</a></li>
      <li><a href="index2.php?ke=P1_jdwl"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Mahasiswa maju seminar PI</a></li>
      <li><a href="index2.php?ke=P1_sdhmju"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa Yang telah melaksanakan seminar PI</a></li>
      <li><a href="index2.php?ke=P1_remed"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Ujian Ulang Seminar PI</a></li>
    </ul>
    <li class="parentmenu"><a href="#ProposalSkripsi" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Proposal Skripsi</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="ProposalSkripsi">
      <li><a href="index2.php?ke=pr0p"><i class="fa fa-plus-square-o fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Proposal Mahasiswa</a></li>
      <li><a href="index2.php?ke=jdl_ubah">Konfirmasi Penggantian Judul Skripsi Mahasiswa</a></li>
      <li><a href="index2.php?ke=pr0p_ubahutama"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Penggantian Keseluruhan Skripsi</a></li>
      <li><a href="index2.php?ke=prop_ok"><i class="fa fa-thumbs-up fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar proposal mahasiswa yang diterima</a></li>
      <li><a href="index2.php?ke=prop_no"><i class="fa fa-thumbs-down fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar proposal mahasiswa yang ditolak</a></li>
      <li><a href="index2.php?ke=skr1p_history">History Penggantian Judul Skripsi Mahasiswa</a></li>
    </ul>
    <li class="parentmenu"><a href="#Seminar1" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar Proposal</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="Seminar1">
      <li><a href="index2.php?ke=sempr0"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Seminar Proposal</a></li>
      <li><a href="index2.php?ke=sempr0_utamaruang"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar Proposal</a></li>
      <li><a href="index2.php?ke=sempr0_jdwl"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Seminar Proposal Mahasiswa</a></li>
      <li><a href="index2.php?ke=sempr0_sudahmaju"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa yang telah melaksanakan Seminar Proposal</a></li>
      <li><a href="index2.php?ke=sempr0_remedy"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Ujian Ulang Seminar Proposal</a></li>
    </ul>
    <li class="parentmenu"><a href="#Seminar2" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar 2</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="Seminar2">
      <li><a href="index2.php?ke=semh4s"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Seminar 2</a></li>
      <li><a href="index2.php?ke=semh4s-remedy"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Ujian Ulang Seminar 2</a></li>
      <li><a href="index2.php?ke=semh4s_utamaruang"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar Hasil</a></li>
      <li><a href="index2.php?ke=semh4s_jdwl"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Seminar 2 Mahasiswa</a></li>
      <li><a href="index2.php?ke=semh4s_sudahmaju"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa yang telah melaksanakan Seminar 2</a></li>
    </ul>
    <li class="parentmenu"><a href="#Pendadaran" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Pendadaran</a></li>
    <ul class="collapse nav nav-sidebar hide-menu" id="Pendadaran">
      <li><a href="index2.php?ke=d4r"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Seminar Pendadaran</a></li>
      <li><a href="index2.php?ke=d4r_utamaruang"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar Pendadaran</a></li>
      <li><a href="index2.php?ke=d4r_jdwl"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Seminar Pendadaran</a></li>
      <li><a href="index2.php?ke=d4r_sudahmaju"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa yang telah melaksanakan Seminar Pendadaran</a></li>
    </ul>
    <li class="parentmenu"><a href="index2.php?ke=d5n" style="font-size: 12px;"><i class="fa fa-mortar-board fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Dosen</a></li>
    <li class="parentmenu"><a href="index2.php?ke=tpK" style="font-size: 12px;"><i class="fa fa-book fa-fw" style="color: #9150B4; font-size: 15px;"></i> Topik Skripsi Mahasiswa</a></li>
    <li class="parentmenu"><a href="index2.php?ke=skrP" style="font-size: 12px;"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Skripsi Mahasiswa Terdahulu</a></li>
    <li class="parentmenu"><a href="index2.php?ke=grafik" style="font-size: 12px;"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Grafik</a></li>
  </ul>
<?php }elseif($_SESSION['level']=='Sekretaris Prodi'){
?>

<ul class="nav nav-sidebar">
  <li class="parentmenu"><a href="#mhs" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-user-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Mahasiswa</a></li>
  <ul class="collapse nav nav-sidebar hide-menu" id="mhs">
    <li><a href="index2.php?ke=mh5_dftr"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Konfirmasi Pendaftaran Akun</a></li>
  </ul>
  <li class="parentmenu"><a href="#KKP" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar KKP</a></li>
  <ul class="collapse nav nav-sidebar hide-menu" id="KKP">
    <li><a href="index2.php?ke=kkP_ruang"><i class="fa fa-plus-square-o fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar KKP</a></li>
    <li><a href="index2.php?ke=kkP_jdwl"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Mahasiswa maju seminar KKP</a></li>
  </ul>
  <li class="parentmenu"><a href="#PI" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar PI</a></li>
  <ul class="collapse nav nav-sidebar hide-menu" id="PI">
    <li><a href="index2.php?ke=P1_ruang"><i class="fa fa-plus-square-o fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar PI</a></li>
    <li><a href="index2.php?ke=P1_jdwl"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Mahasiswa maju seminar PI</a></li>
  </ul>
  <li class="parentmenu"><a href="#Seminar1" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar Proposal</a></li>
  <ul class="collapse nav nav-sidebar hide-menu" id="Seminar1">
    <li><a href="index2.php?ke=sempr0_utamaruang"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar Proposal</a></li>
    <li><a href="index2.php?ke=sempr0_jdwl"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Seminar Proposal Mahasiswa</a></li>
  </ul>
  <li class="parentmenu"><a href="#Seminar2" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Seminar 2</a></li>
  <ul class="collapse nav nav-sidebar hide-menu" id="Seminar2">
    <li><a href="index2.php?ke=semh4s_utamaruang"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar Hasil</a></li>
    <li><a href="index2.php?ke=semh4s_jdwl"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Seminar 2 Mahasiswa</a></li>
  </ul>
  <li class="parentmenu"><a href="#Pendadaran" data-toggle="collapse" aria-expanded="false" style="font-size: 12px;"><i class="fa fa-circle fa-fw" style="color: #9150B4; font-size: 15px;"></i> Pendadaran</a></li>
  <ul class="collapse nav nav-sidebar hide-menu" id="Pendadaran">
    <li><a href="index2.php?ke=d4r_utamaruang"><i class="fa fa-check-square fa-fw" style="color: #9150B4; font-size: 15px;"></i> Input Ruangan Seminar Pendadaran</a></li>
    <li><a href="index2.php?ke=d4r_jdwl"><i class="fa fa-calendar fa-fw" style="color: #9150B4; font-size: 15px;"></i> Jadwal Seminar Pendadaran</a></li>
    <li><a href="index2.php?ke=d4r_sudahmaju"><i class="fa fa-list-alt fa-fw" style="color: #9150B4; font-size: 15px;"></i> Daftar Mahasiswa yang telah melaksanakan Seminar Pendadaran</a></li>
  </ul>
</ul>
<?php } ?>
</div>
