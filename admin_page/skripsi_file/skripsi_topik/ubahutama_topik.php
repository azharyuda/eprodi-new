<section class="main page-header">
  <h4><i class="fa fa-edit fa-fw" style="color: #9150B4;"></i> Halaman Ubah Data Topik</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=d5n">Menu Topik Skripsi</a>
    <li class="active">Menu Ubah Data Topik</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Ubah Data Topik Skripsi
      </center>
    </div>
    <br />

    <?php
    include "dist/koneksi.php";
    $tpk = htmlspecialchars(addslashes(trim($_GET['topik'])));
    $qry=$link->query("SELECT * FROM tbltopik_skripsi WHERE id_topik='$tpk'") or die (mysql_error());
    while ($data=$qry->fetch_array())
    {
     ?>
    <form class="form-horizontal required" action="index2.php?ke=smpn_ubhtpK" method="POST" id="frm-top">
      <div class="form-group">
        <label class="control-label col-sm-2" style="display: none;">ID Topik</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_idtopik" value="<?php echo $data['id_topik'] ?>" readonly="readonly" style="display: none;">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" name="_topik" value="<?php echo $data['topik_skripsi'] ?>">
          <br />
          <button type="submit" class="btn btn-success" name="update"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>

      </div>
      <?php } ?>
    </form>
  </div>
