<?php error_reporting(E_ALL ^(E_NOTICE)); ?>

<section class="main page-header">
  <h4><i class="fa fa-downlo fa-fw" style="color: #9150B4;"></i> Halaman Input Nomor Surat Seminar Hasil</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=semh4s_jdwl">Jadwal Seminar Hasil</a></li>
    <li class="active">Input Nomor Surat Seminar Hasil</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Input Nomor Surat Seminar Hasil</center></b>
    </div>
    <br />

    <?php
    include "dist/koneksi.php";
    $nim=htmlspecialchars(addslashes(trim($_GET['kd'])));
    $qry=$link->query("SELECT * FROM tblseminar_pendadaran WHERE kode_daftar='$nim'");
    while ($data=$qry->fetch_array()){
    ?>

    <form class="form-horizontal required" action="../admin_page/undangan/undanganDADAR.php" method="POST" id="frm-surat">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nosurat" placeholder="Masukkan Kode Surat">
          <input type="text" class="form-control required" name="_daftar" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
        </div>
      </div>


          <br />
          <button type="submit" class="btn btn-success" value="simpan_hasil"><i class="fa fa-floppy-o fa-fw"></i> Simpan Hasil Seminar</button>
    <?php } ?>
  </form>
</div>
