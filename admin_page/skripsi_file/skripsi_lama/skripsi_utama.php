<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>
<section class="main page-header">
  <h4><i class="fa fa-mortar-board fa-fw" style="color:#9150B4;"></i> Halaman Skripsi Terdahulu</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Menu Skripsi Terdahulu</li>
  </ol>
</section>
<?php
if ( isset($_GET['success']) && $_GET['success'] == 1)
{
    // treat the succes case ex:
    echo "<div class='alert alert-success alert-dismissable' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    Data Berhasil Disimpan!
    </div>";
  }

 else if ( isset($_GET['success']) && $_GET['success'] == 2 )
 {
     // treat the succes case ex:
     echo "<div class='alert alert-success alert-dismissable' role='alert'>
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
     Data Berhasil Dihapus!
     </div>";
   }
?>
<div class="panel panel-warning">
    <div class="panel-heading">
      <a class="btn btn-success" href="index2.php?ke=inpt_skrp"><i class="fa fa-plus-square fa-fw">&nbsp; </i>Tambah Data</a>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>Daftar Data Skripsi Terdahulu</b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIM</th>
          <th class="text-center">Nama Mahasiswa</th>
          <th class="text-center">Topik Skripsi</th>
          <th class="text-center">Judul Skripsi</th>
          <th class="text-center">Aksi</th>
        </tr>
</thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT *, tbltopik_skripsi.topik_skripsi FROM tblskripsi_dulu JOIN tbltopik_skripsi ON tblskripsi_dulu.id_topik=tbltopik_skripsi.id_topik ORDER BY NIM");
            while ($tampil=$ambil->fetch_array()){
          ?>
        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><a class="btn btn-success" href="index2.php?ke=ubh_skrp&id=<?php echo $tampil['id']; ?>"><i class="fa fa-edit fa-fw"></i> Ubah</a>
            <hr />
              <a class="btn btn-danger" href="index2.php?ke=hps_skrp&id=<?php echo $tampil['id']; ?>" onclick='return konf()'><i class="fa fa-trash fa-fw"></i> Hapus
          </td>

        </tr>
      <?php }  ?>
      </table>
    </div>
  </div>
