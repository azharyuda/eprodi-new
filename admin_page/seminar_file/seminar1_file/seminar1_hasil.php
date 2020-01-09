<?php
error_reporting(E_ALL ^ (E_NOTICE));
include "dist/koneksi.php";
$nim=htmlspecialchars(addslashes(trim($_GET['kd'])));

$qry=$link->query("SELECT * FROM tblseminar_proposal WHERE kode_daftar='$nim'");
while ($data=$qry->fetch_array()){
 ?>
<section class="main page-header">
  <h4><i class="fa fa-download fa-fw" style="color: #9150B4;"></i> Halaman Input Hasil Seminar Proposal</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=sempr0_jdwl">Jadwal Seminar Proposal</a></li>
    <li class="active">Hasil Seminar Proposal</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Input Hasil Seminar 1 Skripsi</center></b>
    </div>
    <br />


    <form class="form-horizontal required" action="index2.php?ke=sempr0_smpnhsl" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_daftar" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
        </div>
      </div>

      <?php
        $qr2=$link->query("SELECT * FROM tblmahasiswa WHERE NIM='$data[NIM]'") or die(mysqli_error());
        while ($data2=$qr2->fetch_array())
        {
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data2['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data2['email']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_dosbing1" value="<?php echo $data2['dosbing1']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_dosbing2" value="<?php echo $data2['dosbing2']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_uji1" value="<?php echo $data2['dosen_penguji1']; ?>" readonly="readonly" style="display:none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_tpk" value="<?php echo $data2['id_topik']; ?>" readonly="readonly" style="display:none;">
          <textarea name="_judul_skripsi" class="form-control" readonly="readonly"><?php echo $data2['judul_skripsi']; ?></textarea>
        </div>
      </div>
    <?php } ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Tanggal Maju</label>
        <div class="col-sm-5">
          <input type="date" class="form-control required" name="_tanggal_maju" value="<?php echo $data['tanggal_maju']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Ruangan</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_ruangan" value="<?php echo $data['ruangan']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Hasil Seminar</label>
        <div class="col-sm-5">
          <select class="form-control" name="_hasil_seminarproposal" onchange="ceklulus(this)">
            <option hidden value="">Pilih</option>
            <option value="Lulus">Lulus</option>
            <option value="Tidak Lulus">Tidak Lulus</option>
            <option value="Ulang">Mengulang</option>
          </select>
          <br />
          <button type="submit" class="btn btn-success" value="simpan_hasil"><i class="fa fa-floppy-o fa-fw"></i> Simpan Hasil Seminar</button>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" id="lblnilai" style="display: none;">Nilai: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai" id="nilai" style="display: none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" id="lblgrade" style="display: none;">Grade Nilai: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_grade" id="grade" style="display: none;">
        </div>
      </div>
    <?php  }  ?>
  </form>
</div>
