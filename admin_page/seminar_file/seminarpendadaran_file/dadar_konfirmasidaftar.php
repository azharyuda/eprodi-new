<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Pendaftaran Seminar Pendadaran</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=d4r">Seminar Pendadaran</a></li>
    <li class="active">
      Konfirmasi Pendaftaran Seminar Pendadaran
    </li>
  </ol>
</section>
<?php
  if(isset($_GET['num'])==1){echo "<div class='alert alert-danger alert-dismissable' role='alert'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ruangan sudah terisi</div>";}

  else if(isset($_GET['num'])==2){ echo "<div class='alert alert-danger alert-dismissable' role='alert'>Email Gagal dikirim</div>";}
  else if(isset($_GET['num'])==3){ echo "<div class='alert alert-danger alert-dismissable' role='alert'>Data gagal tersimpan dan Email Gagal dikirim</div>";}
?>
<br />
<br />
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Konfirmasi Pendaftaran Seminar Pendadaran</center></b>
    </div>
    <br />

    <?php
      include "dist/koneksi.php";
      $kode=htmlspecialchars(addslashes(trim($_GET['kd'])));
      $qry=$link->query("SELECT *  FROM tbldaftar_pendadaran WHERE kode_daftar='$kode'") or die(mysqli_error());
      while ($data=$qry->fetch_array())
      {
    ?>

    <form class="form-horizontal required" action="index2.php?ke=d4r_smpndaftar" method="POST" id="frm-sem">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_kode" value="<?php echo $data['kode_daftar']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
        </div>
      </div>

      <?php
      $qry=$link->query("SELECT *, tbltopik_skripsi.topik_skripsi
        FROM  tblmahasiswa JOIN tbltopik_skripsi
        ON tblmahasiswa.id_topik=tbltopik_skripsi.id_topik AND NIM=$data[NIM]") or die(mysqli_error());
      while ($data2=$qry->fetch_array())
      {
       ?>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data2['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data2['email']; ?>"  style="display:none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_topik_skripsi" value="<?php echo $data2['topik_skripsi']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-sm-5">
          <textarea name="_judul_skripsi" class="form-control required" readonly="readonly"><?php echo $data2['judul_skripsi']; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Pembimbing 1</label>
        <div class="col-sm-5">
          <input type="text" name="_dosbing1" class="form-control required" readonly="readonly" value="<?php echo $data2['dosbing1']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Pembimbing 2</label>
        <div class="col-sm-5">
          <input type="text" name="_dosbing2" class="form-control required" readonly="readonly" value="<?php echo $data2['dosbing2']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Penguji 1</label>
        <div class="col-sm-5">
          <input type="text" name="_dosenuji1" class="form-control required" readonly="readonly" value="<?php echo $data2['dosen_penguji1']; ?>">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2">Dosen Penguji 2</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_dosenuji2" value="<?php echo $data2['dosen_penguji2']; ?>" readonly="readonly">
        </div>
      </div>
    <?php } ?>
      <div class="form-group">
        <label class="control-label col-sm-2">Apakah Persyaratan Sudah Lengkap?</label>
        <div class="col-sm-5">
          <select class="form-control required" name="_cek" onchange="cek_seminar(this)">
              <option hidden value="">Pilih</option>
              <option value="yes">Tidak Lengkap</option>
              <option value="no">Sudah Lengkap</option>
          </select>

        </div>
        <button type="submit" class="btn btn-success" value="update"><i class="fa fa-check-square fa-fw"></i> Konfirmasi</button>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" id="alasan" style="display:none;">Persyaratan yang kurang lengkap: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_syarat_kurang" id="alasan_ubah" style="display:none;">
        </div>
      </div>
    <?php } ?>
  </form>
</div>
