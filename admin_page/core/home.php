
<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
 ?>
<section class="main page-header">
  <h4><i class="fa fa-dashboard fa-fw" style="color: #9150B4;"></i> Dashboard (Pemberitahuan / Notifikasi data baru masuk)</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li>
      Home
    </li>
  </ol>
</section>
<div class="main main-utama-page">
<?php
$ambil=$link->query("SELECT COUNT('kode_daftar') as kkpi FROM tbldaftarseminar_kkporpi WHERE status='Menunggu Konfirmasi' AND pilihan_KKPorPI='KKP'");
$take1=$ambil->fetch_array();
$kkpi=$take1['kkpi'];

$ambil2=$link->query("SELECT COUNT('kode_daftar') as skripsi FROM tbldaftarseminar_skripsi WHERE status='Menunggu Konfirmasi' AND pilihan_seminar='Seminar 1'");
$take2=$ambil2->fetch_array();
$skrip=$take2['skripsi'];

$ambil3=$link->query("SELECT COUNT('no_urut') as urut FROM tblpengajuan_proposal WHERE status_proposal='Menunggu Konfirmasi'");
$take3=$ambil3->fetch_array();
$proposal=$take3['urut'];

$ambil4=$link->query("SELECT COUNT('kode_daftar') as dadarkonf FROM tbldaftar_pendadaran WHERE status='Menunggu Konfirmasi'");
$take4=$ambil4->fetch_array();
$dadarkonf=$take4['dadarkonf'];

$ambil5=$link->query("SELECT COUNT('kode_daftar') as sempro FROM tblseminar_proposal WHERE hasil_seminarproposal='Menunggu ruangan seminar' AND ruangan='0'");
$take5=$ambil5->fetch_array();
$semproruang=$take5['sempro'];

$ambil6=$link->query("SELECT COUNT('kode_daftar') as semhas FROM tblseminar_2 WHERE hasil_seminar2='Menunggu ruangan seminar'");
$take6=$ambil6->fetch_array();
$semhasruang=$take6['semhas'];

$ambil7=$link->query("SELECT COUNT('kode_daftar') as dadar FROM tblseminar_pendadaran WHERE hasil_pendadaran='Menunggu ruangan seminar'");
$take7=$ambil7->fetch_array();
$dadarruang=$take7['dadar'];

$ambil8=$link->query("SELECT COUNT('kode_daftar') as kkp FROM tblseminar_kkp WHERE hasil_seminarkkp='Menunggu ruangan seminar'");
$take8=$ambil8->fetch_array();
$kkpruang=$take8['kkp'];

$ambil9=$link->query("SELECT COUNT('kode_daftar') as pei FROM tblseminar_pi WHERE hasil_seminarpi='Menunggu ruangan seminar'");
$take9=$ambil9->fetch_array();
$piruang=$take9['pei'];

$ambil10=$link->query("SELECT COUNT('kode_daftar') as hasil FROM tbldaftarseminar_skripsi WHERE status='Menunggu Konfirmasi' and pilihan_seminar='Seminar 2'");
$take10=$ambil10->fetch_array();
$hasil=$take10['hasil'];

$ambil11=$link->query("SELECT COUNT('kode_daftar') as pidaftar FROM tbldaftarseminar_kkporpi WHERE status='Menunggu Konfirmasi' AND pilihan_KKPorPI='PI'");
$take11=$ambil11->fetch_array();
$pidaftar=$take11['pidaftar'];

$ambil12=$link->query("SELECT COUNT('no_urut') as ubahubah FROM tblubah_judulskripsi WHERE status='Menunggu konfirmasi'");
$take12=$ambil12->fetch_array();
$judul=$take12['ubahubah'];

$ambil13=$link->query("SELECT COUNT('no_urut') as urutanprop FROM tblubah_proposal WHERE status='Menunggu konfirmasi'");
$take13=$ambil13->fetch_array();
$pro=$take13['urutanprop'];

$ambil14=$link->query("SELECT COUNT('id') as akun FROM tblmahasiswa WHERE status_akun='Menunggu Konfirmasi'");
$take14=$ambil14->fetch_array();
$akun=$take14['akun'];

if($_SESSION['level']=='Ketua Prodi'){

?>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Mahasiswa</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $akun; ?></span>Akun Mahasiswa yang menunggu untuk diaktifkan</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well" style="background-color: #F4E661;">
    <h4>Seminar KKP</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $kkpi; ?></span>Pendaftar Seminar KKP yang belum dikonfirmasi</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well" style="background-color: #F4E661;">
    <h4>Seminar PI</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $pidaftar; ?></span>Pendaftar seminar PI yang belum dikonfirmasi</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Seminar Proposal</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $skrip; ?></span>Pendaftar Seminar Proposal yang belum dikonfirmasi</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Seminar Hasil</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $hasil; ?></span>Pendaftar Seminar Hasil yang belum dikonfirmasi</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Pendadaran</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $dadarkonf; ?></span>Pendaftar Pendadaran yang belum dikonfirmasi</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ruang Seminar Proposal</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $semproruang; ?></span>Pendaftar Seminar Proposal yang Menunggu Ruangan</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ruang Seminar Hasil</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $semhasruang; ?></span>Pendaftar Seminar Hasil yang Menunggu Ruangan</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ruang Pendadaran</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $dadarruang; ?></span>Pendaftar Pendadaran yang Menunggu Ruangan</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ruang Seminar KKP</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $kkpruang; ?></span>Pendaftar Seminar KKP yang Menunggu Ruangan</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ruang Seminar PI</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $piruang; ?></span>Pendaftar Seminar PI yang Menunggu Ruangan</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ubah Judul Skripsi</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $judul; ?></span>Mahasiswa yang ingin merubah judul skripsi</h5>
  </div>
</div>
<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Ubah Skripsi</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $pro; ?></span>Mahasiswa yang ingin mengganti keseluruhan skripsi</h5>
  </div>
</div>


<div class="col-md-3">
  <div class="well dash-box" style="background-color: #F4E661;">
    <h4>Pengajuan Proposal</h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $proposal; ?></span>Mahasiswa yang Menunggu ACC Proposal skripsi</h5>
  </div>
</div>
<?php }elseif($_SESSION['level']=='Sekretaris Prodi'){ ?>
  <div class="col-md-3">
    <div class="well dash-box" style="background-color: #F4E661;">
      <h4>Mahasiswa</h4>
      <hr />
      <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $akun; ?></span>Akun Mahasiswa yang menunggu untuk diaktifkan</h5>
    </div>
  </div>
  <div class="col-md-3">
    <div class="well dash-box" style="background-color: #F4E661;">
      <h4>Ruang Seminar Proposal</h4>
      <hr />
      <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $semproruang; ?></span>Pendaftar Seminar Proposal yang Menunggu Ruangan</h5>
    </div>
  </div>
  <div class="col-md-3">
    <div class="well dash-box" style="background-color: #F4E661;">
      <h4>Ruang Seminar Hasil</h4>
      <hr />
      <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $semhasruang; ?></span>Pendaftar Seminar Hasil yang Menunggu Ruangan</h5>
    </div>
  </div>
  <div class="col-md-3">
    <div class="well dash-box" style="background-color: #F4E661;">
      <h4>Ruang Pendadaran</h4>
      <hr />
      <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $dadarruang; ?></span>Pendaftar Pendadaran yang Menunggu Ruangan</h5>
    </div>
  </div>
  <div class="col-md-3">
    <div class="well dash-box" style="background-color: #F4E661;">
      <h4>Ruang Seminar KKP</h4>
      <hr />
      <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $kkpruang; ?></span>Pendaftar Seminar KKP yang Menunggu Ruangan</h5>
    </div>
  </div>
  <div class="col-md-3">
    <div class="well dash-box" style="background-color: #F4E661;">
      <h4>Ruang Seminar PI</h4>
      <hr />
      <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $piruang; ?></span>Pendaftar Seminar PI yang Menunggu Ruangan</h5>
    </div>
  </div>
<?php } else{ echo "error!"; echo "<meta http-equiv='refresh' content='0; url=../admin_page/login.php' />"; }?>
</div>
