<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Proposal Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=pr0p">Daftar Pengaju Proposal</a></li>
    <li class="active">
      Konfirmasi Proposal Skripsi
    </li>
  </ol>
</section>

<?php

  if(isset($_GET['num'])==1){echo "<div class='alert alert-danger' role='alert' aria-label='close'>Data Gagal tersimpan</div>";}
  else if(isset($_GET['num'])==2){ echo "<div class='alert alert-danger' role='alert' aria-label='close'>Email Gagal dikirim</div>";}
  else if(isset($_GET['num'])==3){ echo "<div class='alert alert-danger' role='alert' aria-label='close'>Data gagal tersimpan dan Email Gagal dikirim</div>";}

?>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Konfirmasi Proposal Skripsi</center></b>
    </div>
    <br />

    <?php
      include "dist\koneksi.php";
      $urt=$_GET['urt'];
      $qry=mysql_query("SELECT * FROM tblubah_proposal WHERE no_urut='$urt'") or die(mysql_error());
      while ($data=mysql_fetch_array($qry))
      {
    ?>



    <form class="form-horizontal required" action="index2.php?ke=mh5_smpnubh" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_urt" value="<?php echo $data['no_urut']; ?>" readonly="readonly" style="display: none;">
        </div>
      </div>

      <?php
        $qr2=mysql_query("SELECT nm_mahasiswa, email FROM tblmahasiswa WHERE NIM='$data[NIM]'") or die(mysql_error());
        while ($data2=mysql_fetch_array($qr2))
        {
      ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data2['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data2['email']; ?>"  style="display:none;">
        </div>
      </div>

    <?php } ?>

    <?php
      $qr3=mysql_query("SELECT topik_skripsi FROM tbltopik_skripsi WHERE id_topik='$data[id_topik]'") or die(mysql_error());
      while ($data3=mysql_fetch_array($qr3))
      {
    ?>
      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_tema_skripsi" value="<?php echo $data3['topik_skripsi']; ?>" readonly="readonly">
        </div>
      </div>
    <?php } ?>
      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_judul_skripsi" value="<?php echo $data['judul_skripsi']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Pembimbing 1</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_dosbing1" value="<?php echo $data['dosbing1']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Pembimbing 2</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_dosbing2" value="<?php echo $data['dosbing2']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Alasan Proposal Diubah</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_alasan_ubah" value="<?php echo $data['alasan_ubah']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Keputusan Prodi</label>
        <div class="col-sm-5">
          <select class="form-control" name="_status_prop" id="status" onchange="cek_stat(this)">
              <option hidden>Pilih Status</option>
              <option value="terima">Perubahan dapat dilakukan</option>
              <option value="tidak">Perubahan tidak dapat dilakukan</option>
          </select>
        </div>
          <button class="btn btn-success" type="submit" name="simpan" value="konf"><i class= "fa fa-check-square fa-fw"></i> Konfirmasi Data</button>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" id="lbl_alasan" style="display:none;">Alasan Perubahan Tak Dapat Dilakukan</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_alasan" id="alasan" style="display:none;">
          <br />
        </div>
      </div>

    <?php } ?>

  </form>

</div>
