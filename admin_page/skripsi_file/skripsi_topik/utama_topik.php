<section class="main page-header">
  <h4><i class="fa fa-clipboard fa-fw" style="color: #9150B4;"></i> Halaman Topik Skripsi</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Halaman Topik Proposal Skripsi
    </li>
  </ol>
</section>

<!-- alert messages -->
<?php

  if(isset($_GET['num'])==1){echo "<div class='alert alert-success' role='alert' aria-label='close'>Data berhasil tersimpan dan Email berhasil dikirim</div>
                                  <meta http-equiv='refresh' content='1; url=index2.php?ke=pr0p' />";}
 ?>

<div class="panel panel-warning">
  <div class="panel-heading">
    <a class="btn btn-success" href="index2.php?ke=inpt_tpK"><i class="fa fa-plus-square fa-fw">&nbsp; </i>Tambah Data</a>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Daftar Data Topik Skripsi</b>
  </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center" style="width:150px;">ID Topik Skripsi</th>
          <th class="text-center" style="width:500px;">Topik Topik</th>
          <th class="text-center" style="width:150px;">Aksi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT * FROM tbltopik_skripsi") or die(mysqli_error());
            while ($tampil = $ambil->fetch_array()){
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['id_topik']; ?></td>
          <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
          <td class="text-center"><a class="btn btn-success" href="index2.php?ke=ubh_tpK&topik=<?php echo $tampil['id_topik']; ?>"><i class="fa fa-edit fa-fw">&nbsp;</i> Edit</a>
              <a class="btn btn-danger" href="index2.php?ke=hps_tpK&topik=<?php echo $tampil['id_topik']; ?>" onclick='return konf()'><i class="fa fa-trash fa-fw">&nbsp;</i> Hapus
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
