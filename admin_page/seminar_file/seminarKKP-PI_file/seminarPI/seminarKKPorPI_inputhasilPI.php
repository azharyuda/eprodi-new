<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>
<section class="main page-header">
  <h4><i class="fa fa-download fa-fw" style="color: #9150B4;"></i> Halaman Input Hasil Seminar PI</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=pi_jdwl">Jadwal Seminar PI</a></li>
    <li class="active">Hasil Seminar PI</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Input Hasil Seminar PI</center></b>
    </div>
    <br />

    <?php
    include "dist/koneksi.php";
    $urt=htmlspecialchars(addslashes(trim($_GET['kode'])));
    $qry=$link->query("SELECT * FROM tblseminar_pi WHERE kode_daftar='$urt'");
    while ($data=$qry->fetch_array()){
    ?>

    <form class="form-horizontal required" action="index2.php?ke=P1_smpnhsl" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_daftar" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_dosenuji1" value="<?php echo $data['dosen_uji1']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_dosenuji2" value="<?php echo $data['dosen_uji2']; ?>" readonly="readonly" style="display:none;">
        </div>
      </div>

      <?php
        $qr2=$link->query("SELECT nm_mahasiswa, email FROM tblmahasiswa WHERE NIM='$data[NIM]'") or die(mysqli_error());
        while ($data2=$qr2->fetch_array())
        {
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data2['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data2['email']; ?>" readonly="readonly" style="display:none;">
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
        <label class="control-label col-sm-2">Nilai Dosen Wali: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai_dosenwali" id="wali" onkeyup="sum();">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nilai Penguji 1: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai_penguji1" id="uji1" onkeyup="sum();">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nilai Penguji 2: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai_penguji2" id="uji2" onkeyup="sum();">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nilai Akhir: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai_akhir" id="akhir" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Hasil Seminar</label>
        <div class="col-sm-5">
          <select class="form-control" name="_hasil_seminarPI" onchange="ceklulus(this)">
            <option hidden value="">Pilih</option>
            <option value="Lulus">Lulus</option>
            <option value="Tidak Lulus">Tidak Lulus</option>
          </select>
          <br />
          <button type="submit" class="btn btn-success" value="simpan_hasil"><i class="fa fa-floppy-o fa-fw"></i> Simpan Hasil Seminar</button>
        </div>
      </div>
    <?php } ?>
  </form>
</div>
<script>
function sum() {
      var wali = document.getElementById('wali').value;
      var uji1 = document.getElementById('uji1').value;
      var uji2 = document.getElementById('uji2').value;
      var akhir = ((parseInt(wali) + parseInt(uji1) + parseInt(uji2))/3)*(0.2);
      if (!isNaN(akhir)) {
         document.getElementById('akhir').value = akhir;
      }
}
</script>
