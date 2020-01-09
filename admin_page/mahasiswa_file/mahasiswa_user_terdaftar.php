<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Akun Mahasiswa yang telah aktif</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Daftar Akun Mahasiswa
    </li>
  </ol>
</section>
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Data Akun Mahasiswa</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th class="text-center">NIM</th>
          <th class="text-center">Nama Mahasiswa</th>
          <th class="text-center">E-Mail</th>
          <th class="text-center">Status Proposal</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query ("SELECT *from tblmahasiswa
               where tblmahasiswa.status_akun='Aktif'");
            while ($tampil = $ambil->fetch_array()){

          ?>

        <tr>

          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['email']; ?></td>
          <?php
          if($tampil['judul_skripsi']=='Belum Ada'){
            echo "<td class='text-center'>Belum Mengajukan Propsosal</td>";
          }
          else{
            echo "<td class='text-center'>Sudah Mengajukan Proposal<br />($tampil[judul_skripsi])</td>";
          }

           ?>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
