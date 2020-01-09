<section class="main page-header">
  <h4><i class="fa fa-edit fa-fw" style="color:#9150B4;"></i> Halaman Ubah Data Skripsi</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=skrP">Menu Skripsi Terdahulu</a>
    <li class="active">Menu Ubah Data Skripsi</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Ubah Data Skripsi Terdahulu
      </center>
    </div>
    <br />

    <?php
    include "dist/koneksi.php";
    $id = htmlspecialchars(addslashes(trim($_GET['id'])));
    $qry=mysqli_query($link, "SELECT *,tbltopik_skripsi.id_topik FROM
      tblskripsi_dulu JOIN tbltopik_skripsi ON tblskripsi_dulu.id_topik=tbltopik_skripsi.id_topik
      WHERE id='$id'");
    while ($data=mysqli_fetch_array($qry))
    {
     ?>
    <form class="form-horizontal required" action="index2.php?ke=smpn_ubhskrp" method="POST" id="skrip-lama">
      <div class="form-group">
        <label class="control-label col-sm-2" style="display:none;">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_id" value="<?php echo $data['id'] ?>"style="display:none;" readonly>
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM'] ?>"style="display:none;" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" name="_nm_mhs" value="<?php echo $data['nm_mahasiswa'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-xs-3">
          <select class="form-control required" name="_tpk">
              <option hidden value=""><?php echo $data['topik_skripsi']; ?></option>
              <?php
              $ambil=$link->query("SELECT * from tbltopik_skripsi");
              while($tampil=$ambil->fetch_array()){
                echo "<option value='$tampil[id_topik]'>
                $tampil[topik_skripsi]
                </option>";
              }
               ?>
              </option>
          </select></div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-xs-8">
        <textarea class="form-control required" name="_judul" placeholder="Masukkan Judul Skripsi"><?php echo $data['judul_skripsi']; ?></textarea>
      <br />
          <button type="submit" class="btn btn-success" name="update"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>

      </div>
      <?php } ?>
    </form>
  </div>
