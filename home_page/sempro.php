<div class="panel panel-default">
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-bordered table-striped" id="table-dataSEMPRO">
      <thead>
      <tr>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
                <th>Judul Skripsi</th>
        <th>Dosen Pembimbing 1</th>
        <th>Dosen Pembimbing 2</th>
        <th>Dosen Penguji 1</th>
        <th>Tanggal Seminar</th>
        <th>Waktu</th>
        <th>Ruangan</th>
      </tr>
      </thead>
      <tbody>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT *, tblmahasiswa.nm_mahasiswa, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
              tblmahasiswa.judul_skripsi,
              tblmahasiswa.id_topik,
              tbltopik_skripsi.topik_skripsi
            FROM tblseminar_proposal JOIN tblmahasiswa ON tblseminar_proposal.NIM=tblmahasiswa.NIM
            JOIN tbltopik_skripsi ON tblmahasiswa.id_topik=tbltopik_skripsi.id_topik
            WHERE tblseminar_proposal.hasil_seminarproposal='Menunggu selesai seminar'") or die (mysqli_error());
            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tanggal_maju']));
          ?>
        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing2']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_penguji1']; ?></td>
          <td class="text-center"><?php echo $tgl; ?></td>
          <td class="text-center"><?php echo $tampil['waktu']; ?></td>
          <td class="text-center"><?php echo $tampil['ruangan']; ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>
</div>
