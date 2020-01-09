<?php
  error_reporting(E_ALL);
 ?>
 <section class="main page-header">
     <h2><i class="fa fa-calendar fa-fw" aria-hidden="true" style="color: #9150B4;"></i> Jadwal Seminar Pendadaran Mahasiswa STMIK Widya Cipta Dharma Samarinda</h2>
 </section>

<div class="panel panel-primary">
    <div class="panel-heading">
      <center>
        Jadwal Seminar Proposal Mahasiswa:
      </center>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table-data" >
          <thead>
          <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Judul Skripsi</th>
            <th>Dosen Pembimbing 1</th>
            <th>Dosen Pembimbing 2</th>
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

                $ambil = $link->query("SELECT *, tblmahasiswa.nm_mahasiswa, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
                  tblmahasiswa.dosen_penguji1,
                  tblmahasiswa.dosen_penguji2,
                  tblmahasiswa.judul_skripsi,
                  tblmahasiswa.id_topik,
                  tbltopik_skripsi.topik_skripsi
                FROM tblseminar_pendadaran JOIN tblmahasiswa ON tblseminar_pendadaran.NIM=tblmahasiswa.NIM
                JOIN tbltopik_skripsi ON tblmahasiswa.id_topik=tbltopik_skripsi.id_topik
                WHERE hasil_pendadaran='Menunggu selesai seminar'") or die (mysqli_error($link));
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
              <td class="text-center"><?php echo $tampil['waktu']; ?></td>
              <td class="text-center"><?php echo $tampil['ruangan']; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
