<section class="main page-header">
  <h4><i class="fa fa-downlo fa-fw" style="color: #9150B4;"></i> Halaman Input Hasil Seminar Hasil</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=semh4s_jdwl">Jadwal Seminar Hasil</a></li>
    <li class="active">Hasil Seminar Hasil</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Input Hasil Seminar 2 Skripsi</center></b>
    </div>
    <br />

    <?php
    include "dist/koneksi.php";
    $nim=htmlspecialchars(addslashes(trim($_GET['kd'])));
    $tanggalskrng=new DateTime();
    $qry=$link->query("SELECT * FROM tblseminar_2 WHERE kode_daftar='$nim'");
    while ($data=$qry->fetch_array()){
    ?>

    <form class="form-horizontal required" action="index2.php?ke=semh4s_smpnhsl" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_daftar" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
        </div>
      </div>

      <?php
        $qr2=$link->query("SELECT nm_mahasiswa, judul_skripsi, email FROM tblmahasiswa WHERE NIM='$data[NIM]'") or die(mysqli_error());
        while ($data2=$qr2->fetch_array())
        {
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data2['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data2['email']; ?>" readonly="readonly" style="display: none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-sm-5">
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
        <label class="control-label col-sm-2">Nilai Pembimbing 1: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai_dosbing1" id="dosbing1" onkeyup="sum();">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nilai Pembimbing 2: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nilai_dosbing2" id="dosbing2" onkeyup="sum();">
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
          <select class="form-control" name="_hasil_seminar2" onchange="ceklulus(this)">
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
      var dosbing1 = document.getElementById('dosbing1').value;
      var dosbing2 = document.getElementById('dosbing2').value;
      var uji1 = document.getElementById('uji1').value;
      var uji2 = document.getElementById('uji2').value;
      var akhir = ((parseInt(dosbing1) + parseInt(dosbing2) + parseInt(uji1) + parseInt(uji2))/4)*(0.2);
      if (!isNaN(akhir)) {
         document.getElementById('akhir').value = akhir;
      }
}
</script>
