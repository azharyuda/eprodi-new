<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
 ?>

<section class="main page-header">
  <h4><i class="fa fa-plus-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Perubahan Proposal</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=pr0p_ubahutama">Menu Ubah Proposal</a>
    <li class="active">Konfirmasi Ubah proposal</li>
  </ol>
</section>
<?php
$urut=htmlspecialchars(addslashes(trim($_GET['urut'])));
  $qry=$link->query("SELECT
    no_urut,
    tblubah_proposal.NIM,
    tblmahasiswa.nm_mahasiswa,
    tblubah_proposal.id_topik,
    tbltopik_skripsi.topik_skripsi,
    tblubah_proposal.judul_skripsi,
    alasan_ubah,
    tblubah_proposal.tgl_input,
    tblubah_proposal.status

    FROM tblubah_proposal JOIN tblmahasiswa ON tblubah_proposal.NIM=tblmahasiswa.NIM JOIN tbltopik_skripsi
    ON tblubah_proposal.id_topik=tbltopik_skripsi.id_topik WHERE no_urut='$urut'
    ") OR die(mysqli_Error());
    $tampil=$qry->fetch_array();
 ?>
<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        <b>Input Konfirmasi Perubahan Proposal Skripsi Mahasiswa</b>
      </center>
    </div>
    <br />
    <form class="form-horizontal required" action="index2.php?ke=pr0p_smpnubah" method="POST" id="frm-dsn">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" value='<?php echo $tampil['NIM']; ?>' name="_nim" placeholder="Masukkan Kode Topik" readonly>
          <input type="text" style='display: none;' class="form-control required" value='<?php echo $tampil['no_urut']; ?>' name="_urut" placeholder="Masukkan Kode Topik" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" value='<?php echo $tampil['nm_mahasiswa']; ?>' name="_nm" placeholder="Masukkan Kode Topik" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" value='<?php echo $tampil['topik_skripsi']; ?>' name="_topik" placeholder="Masukkan Kode Topik" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi: </label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="_judul" placeholder="Masukkan Kode Topik" readonly><?php echo $tampil['judul_skripsi']; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Alasan Ingin mengubah proposal skripsi: </label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="_alasan" placeholder="Masukkan Kode Topik" readonly><?php echo $tampil['alasan_ubah']; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Status: </label>
        <div class="col-sm-5">
          <select class="form-control" name="_status" id="status" onchange="ubahprop(this)">
              <option hidden>Pilih Status</option>
              <option value="boleh">Perubahan Diperbolehkan</option>
              <option value="ga">Tidak Diperbolehkan</option>
          </select>
        </div>
        <button class="btn btn-success" type="submit" name="simpan" value="konf"><i class= "fa fa-check-square fa-fw"></i> Konfirmasi Data</button>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" id="takboleh" style="display:none;">Alasan tidak diperbolehkan: </label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="_tdkboleh" id="alasan_takboleh" style="display:none;"></textarea>
        </div>
      </div>
