<?php
  error_reporting()
 ?>
 <section class="main page-header">
     <h2><i class="fa fa-calendar fa-fw" aria-hidden="true" style="color: #9150B4;"></i> Jadwal Seminar Hasil Mahasiswa STMIK Widya Cipta Dharma Samarinda</h2>
 </section>

<div class="panel panel-primary">
    <div class="panel-heading">
      <center>
        Jadwal Seminar Hasil Mahasiswa:
      </center>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table-data" >
          <thead>
          <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Topik Skripsi</th>
            <th>Judul Skripsi</th>
            <th>Tanggal Seminar</th>
            <th>Waktu</th>
            <th>Ruangan</th>
          </tr>
        </thead>
          <tbody>
            <?php
                include "dist/koneksi.php";

                $ambil = $link->query("SELECT *, tblmahasiswa.nm_mahasiswa, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
                  tblmahasiswa.dosen_penguji1,
                  tblmahasiswa.dosen_penguji2,
                  tblmahasiswa.judul_skripsi,
                  tblmahasiswa.id_topik,
                  tbltopik_skripsi.topik_skripsi
                FROM tblseminar_2 JOIN tblmahasiswa ON tblseminar_2.NIM=tblmahasiswa.NIM
                JOIN tbltopik_skripsi ON tblmahasiswa.id_topik=tbltopik_skripsi.id_topik
                WHERE hasil_seminar2='Menunggu selesai seminar'") or die (mysqli_error($link));
                while ($tampil = $ambil->fetch_array()){
              ?>
            <tr>
              <td class="text-center"><?php echo $tampil['NIM']; ?></td>
              <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
              <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
              <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
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
