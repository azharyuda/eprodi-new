<section class="main page-header">
  <h4><i class="fa fa-clipboard fa-fw" style="color: #9150B4;"></i> Halaman Daftar Mahasiswa yang telah melaksanakan Seminar Hasil</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">Halaman Hasil Seminar Hasil / Seminar 2</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Mahasiswa yang telah melaksanakan seminar Hasil Skripsi</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul Skripsi</th>
          <th>Dosen Pembimbing 1</th>
          <th>Dosen Pembimbing 2</th>
          <th>Dosen Penguji 1</th>
          <th>Dosen Penguji 2</th>
          <th>Tanggal Maju</th>
          <th>Hasil</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil =  $link->query("SELECT tblseminar_2.NIM, tblmahasiswa.nm_mahasiswa, tblmahasiswa.judul_skripsi,
                                    tanggal_maju, hasil_seminar2, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
                                    tblmahasiswa.dosen_penguji1, tblmahasiswa.dosen_penguji2
                                    FROM tblseminar_2 JOIN tblmahasiswa ON tblseminar_2.NIM=tblmahasiswa.NIM WHERE hasil_seminar2='Lulus' or hasil_seminar2='Tidak Lulus' ORDER BY NIM ASC")
                                    or die (mysql_error());
            while ($tampil = $ambil->fetch_array()){
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing2']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_penguji1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_penguji2']; ?></td>
          <td class="text-center"><?php echo $tampil['tanggal_maju']; ?></td>
          <?php
            if($tampil['hasil_seminar2']=='Lulus'){
          ?>
            <td class="text-center success"><?php echo $tampil['hasil_seminar2']; ?></td>
          <?php } else { ?>
            <td class="text-center danger"><?php echo $tampil['hasil_seminar2']; ?></td>
          <?php } ?>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
