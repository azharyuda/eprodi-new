<?php
error_reporting(E_ALL);
include "dist/koneksi.php";
 ?>

<section class="main page-header">
  <h4><i class="fa fa-plus-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Perubahan Judul</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=tpK">Menu Topik</a>
    <li class="active">Input Topik</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Input Data Topik Skripsi Mahasiswa
      </center>
    </div>
    <br />
    <form class="form-horizontal required" action="index2.php?ke=ubahjdl_smpn" method="POST" id="frm-ubahjdl">
      <?php
      $nim=htmlspecialchars(addslashes(trim($_GET['urut'])));
      $ambil=$link->query("SELECT * FROM tblubah_judulskripsi WHERE no_urut='$nim'");
      while($take=$ambil->fetch_array()){

       ?>
        <div class="form-group">
          <label class="control-label col-sm-2">NIM: </label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" name="_NIM" value="<?php echo $take['NIM']; ?>" readonly="readonly">
            <input type="text" class="form-control required" name="_urut" value="<?php echo $take['no_urut']; ?>" style="display: none;">
          </div>
        </div>
        <?php
        $ambil2=$link->query("SELECT email FROM tblmahasiswa WHERE NIM='$take[NIM]'");
        while($take2=$ambil2->fetch_array()){
         ?>
        <div class="form-group">
          <label class="control-label col-sm-2">Nama Mahasiswa: </label>
          <div class="col-sm-5">
            <input type="text" class="form-control required" name="_nm" value="<?php echo $take['nm_mahasiswa']; ?>" readonly="readonly">
            <input type="text" class="form-control required" name="_mail" value="<?php echo $take2['email']; ?>" readonly="readonly" style="display:none;">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Judul Skripsi lama: </label>
          <div class="col-sm-5">
            <textarea class="form-control required" name="_jdul_lama" readonly="readonly"><?php echo $take['judul_skripsi_lama']; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Judul Skripsi Baru: </label>
          <div class="col-sm-5">
            <textarea class="form-control required" name="_baru" readonly="readonly"><?php echo $take['jdul_skripsi_baru']; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Alasan Diubah: </label>
          <div class="col-sm-5">
            <textarea class="form-control required" name="_alasan" readonly="readonly"><?php echo $take['alasan_diubah']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Status Proposal</label>
          <div class="col-sm-5">
            <select class="form-control required" name="_status" id="status" onchange="cek_status(this)">
                <option hidden value="">Pilih Status</option>
                <option value="terima">Diterima</option>
                <option value="revisi">Revisi</option>
            </select>
          </div>
          <button class="btn btn-success" type="submit" name="simpan" value="konf"><i class= "fa fa-check-square fa-fw"></i> Konfirmasi Data</button>

        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" id="lbl_revisi" style="display:none;">Judul yang diusulkan: </label>
          <div class="col-sm-5">
            <textarea class="form-control required" name="_usul" id="bagian_revisi" style="display:none;"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" id="ala" style="display:none;">Alasan Judul direvisi: </label>
          <div class="col-sm-5">
            <textarea class="form-control required" name="_alasanubah" id="alas" style="display:none;"></textarea>
            <br />
          </div>
        </div>
      <?php }} ?>
    </form>

  </div>
