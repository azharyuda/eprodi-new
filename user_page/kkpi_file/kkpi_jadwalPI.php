<?php
  error_reporting(E_ALL);
 ?>
 <section class="main page-header">
     <h2><i class="fa fa-calendar fa-fw" aria-hidden="true" style="color: #9150B4;"></i> Jadwal Seminar Penulisan Ilmiah Mahasiswa SI STMIK Widya Cipta Dharma Samarinda</h2>
 </section>

<div class="panel panel-primary">
    <div class="panel-heading">
      <center>
        Jadwal Seminar PI Mahasiswa:
      </center>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table-data" >
          <thead>
          <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Judul PI</th>
            <th>Dosen Penguji 1</th>
            <th>Dosen Penguji 2</th>
            <th>Tanggal Seminar</th>
            <th>Waktu</th>
            <th>Ruangan</th>
          </tr>
        </thead>
          <tbody>
            <?php
                include "dist/koneksi.php";

                $ambil = $link->query("SELECT *, tblmahasiswa.nm_mahasiswa FROM tblseminar_pi
                  JOIN tblmahasiswa ON tblseminar_pi.NIM=tblmahasiswa.NIM
                where hasil_seminarpi='Menunggu selesai seminar'") or die (mysqli_error());
                while ($tampil = $ambil->fetch_array()){
              ?>
            <tr>
              <td class="text-center"><?php echo $tampil['NIM']; ?></td>
              <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
              <td class="text-center"><?php echo $tampil['judul_pi']; ?></td>
              <td class="text-center"><?php echo $tampil['dosen_uji1']; ?></td>
              <td class="text-center"><?php echo $tampil['dosen_uji2']; ?></td>
              <td class="text-center"><?php echo $tampil['tanggal_maju']; ?></td>
              <td class="text-center"><?php echo $tampil['waktu']; ?></td>
              <td class="text-center"><?php echo $tampil['ruangan']; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
