<?php
  error_reporting();
  include "dist/koneksi.php";
 ?>
<section class="main page-header">
  <center>
  <div class="alert alert-info" style="margin-top: 50px;">
    <?php echo "<h4>Selamat Datang, $_SESSION[nm_mahasiswa]</h4>"; ?>
  </div>
</center>
</section>

<?php
$ambil5=$link->query("SELECT COUNT('kode_daftar') as sempro FROM tblseminar_proposal WHERE hasil_seminarproposal='Menunggu selesai seminar'");
$take5=$ambil5->fetch_array();
$sempro=$take5['sempro'];

$ambil6=$link->query("SELECT COUNT('kode_daftar') as semhas FROM tblseminar_2 WHERE hasil_seminar2='Menunggu selesai seminar'");
$take6=$ambil6->fetch_array();
$semhas=$take6['semhas'];

$ambil7=$link->query("SELECT COUNT('kode_daftar') as dadar FROM tblseminar_pendadaran WHERE hasil_pendadaran='Menunggu selesai seminar'");
$take7=$ambil7->fetch_array();
$dadar=$take7['dadar'];

$ambil8=$link->query("SELECT COUNT('kode_daftar') as kkp FROM tblseminar_kkp WHERE hasil_seminarkkp='Menunggu selesai seminar'");
$take8=$ambil8->fetch_array();
$kkp=$take8['kkp'];

$ambil9=$link->query("SELECT COUNT('kode_daftar') as pei FROM tblseminar_pi WHERE hasil_seminarpi='Menunggu selesai seminar'");
$take9=$ambil9->fetch_array();
$pi=$take9['pei'];
?>

<div class="col-md-4">
  <div class="well" style="background-color: #F4E661;">
    <h4><center>Jadwal Seminar KKP</center></h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $kkp; ?></span> Seminar KKP akan dilaksanakan</h5>
  </div>
</div>

<div class="col-md-4">
  <div class="well" style="background-color: #F4E661;">
    <h4><center>Jadwal Seminar PI</center></h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $pi; ?></span> Seminar PI akan dilaksanakan</h5>
  </div>
</div>

<div class="col-md-4">
  <div class="well" style="background-color: #F4E661;">
    <h4><center>Jadwal Seminar Proposal</center></h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $sempro; ?></span> Seminar Proposal akan dilaksanakan</h5>
  </div>
</div>

<div class="col-md-4">
  <div class="well" style="background-color: #F4E661;">
    <h4><center>Jadwal Seminar Hasil</center></h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $semhas; ?></span> Seminar Hasil akan dilaksanakan</h5>
  </div>
</div>

<div class="col-md-4">
  <div class="well" style="background-color: #F4E661;">
    <h4><center>Jadwal Pendadaran</center></h4>
    <hr />
    <h5 class="text-light"><span class="label label-danger pull-right"><?php echo $dadar; ?></span> Pendadaran akan dilaksanakan</h5>
  </div>
</div>
