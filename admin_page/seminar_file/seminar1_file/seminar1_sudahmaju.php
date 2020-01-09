<section class="main page-header">
  <h4><i class="fa fa-clipboard fa-fw" style="color: #9150B4;"></i> Halaman Daftar Mahasiswa yang telah melaksanakan Seminar Proposal</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">Hasil Seminar Proposal</a></li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Mahasiswa yang telah melaksanakan seminar Proposal Skripsi</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Tanggal Maju</th>
          <th>Hasil</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_proposal.NIM, tblmahasiswa.nm_mahasiswa, tblmahasiswa.judul_skripsi,
                                    tanggal_maju, hasil_seminarproposal, tblmahasiswa.dosbing1, tblmahasiswa.dosbing2,
                                    tblmahasiswa.dosen_penguji1, tblmahasiswa.dosen_penguji2
                                    FROM tblseminar_proposal JOIN tblmahasiswa ON tblseminar_proposal.NIM=tblmahasiswa.NIM
                                     WHERE hasil_seminarproposal='Lulus'
                                      or hasil_seminarproposal='Tidak Lulus'
                                      or hasil_seminarproposal='Ulang' ORDER BY NIM ASC");

            while ($tampil = $ambil->fetch_array()){
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['tanggal_maju']; ?></td>
          <?php
            if($tampil['hasil_seminarproposal']=='Lulus'){
          ?>
            <td class="text-center success"><?php echo $tampil['hasil_seminarproposal']; ?></td>
          <?php } elseif($tampil['hasil_seminarproposal']=='Tidak Lulus') { ?>
            <td class="text-center danger"><?php echo $tampil['hasil_seminarproposal']; ?></td>
        <?php } elseif($tampil['hasil_seminarproposal']=='Ulang') { ?>
          <td class="text-center warning"><?php echo $tampil['hasil_seminarproposal']; ?></td>
        <?php } ?>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
