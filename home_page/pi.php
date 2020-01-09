<div class="panel panel-default">
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-bordered table-striped" id="table-dataPI">
      <thead>
      <tr>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Judul PI</th>
        <th>Dosen Wali</th>
        <th>Dosen Penguji 1</th>
        <th>Dosen Penguji 2</th>
        <th>Tanggal Maju</th>
        <th>Waktu</th>
        <th>Ruangan</th>
      </tr>
    </thead>
      <?php
          include "dist/koneksi.php";

          $ambil = $link->query("SELECT tblseminar_pi.kode_daftar, tblseminar_pi.NIM, tblmahasiswa.nm_mahasiswa, judul_pi, dosen_uji1, dosen_uji2,
                                  tanggal_maju, waktu, ruangan, tblmahasiswa.dosen_wali
                                  FROM tblseminar_pi JOIN tblmahasiswa ON tblseminar_pi.NIM=tblmahasiswa.NIM WHERE hasil_seminarpi='Menunggu selesai seminar' ORDER BY tanggal_maju")
                                  or die (mysqli_error());

          while ($tampil = $ambil->fetch_array()){
            $tgl=date('d F Y', strtotime($tampil['tanggal_maju']));
        ?>

      <tr>
        <td class="text-center"><?php echo $tampil['NIM']; ?></td>
        <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
        <td class="text-center"><?php echo $tampil['judul_pi']; ?></td>
        <td class="text-center"><?php echo $tampil['dosen_wali']; ?></td>
        <td class="text-center"><?php echo $tampil['dosen_uji1']; ?></td>
        <td class="text-center"><?php echo $tampil['dosen_uji2']; ?></td>
        <td class="text-center"><?php echo $tgl; ?></td>
        <td class="text-center"><?php echo $tampil['waktu']; ?></td>
        <td class="text-center"><?php echo $tampil['ruangan']; ?></td>
      </tr>
    <?php } ?>
    </table>
  </div>
</div>
</div>
