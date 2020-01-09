<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Tanggal dan Input Ruanga Seminar Proposal</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Halaman Konfirmasi Seminar Proposal</li>
  </ol>
</section>


<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Data Pendaftar Seminar Proposal Skripsi</center></b>
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
          <th>Tanggal Maju</th>
          <th>Waktu</th>
          <th>Tanggal Input Data</th>
          <th>Status</th>
          <th>Persyaratan</th>
          <th>Konfirmasi Pendaftaran</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tblseminar_proposal.kode_daftar,
              tbldaftarseminar_skripsi.NIM,
              tblmahasiswa.nm_mahasiswa,
              tblmahasiswa.judul_skripsi,
                                    tanggal_maju,
                                    waktu,
                                    tgl_input,
                                    tbldaftarseminar_skripsi.persyaratan2,
                                    hasil_seminarproposal,
                                    tbldaftarseminar_skripsi.dir_persyaratan,
                                    tblmahasiswa.dosbing1,
                                    tblmahasiswa.dosbing2,
                                    tblmahasiswa.dosen_penguji1
                                    FROM tblseminar_proposal JOIN tblmahasiswa ON tblseminar_proposal.NIM=tblmahasiswa.NIM
                                    JOIN tbldaftarseminar_skripsi ON tblseminar_proposal.kode_daftar=tbldaftarseminar_skripsi.kode_daftar
                                    WHERE hasil_seminarproposal='Menunggu ruangan seminar' ORDER BY tgl_input")
                                    or die (mysqli_error());

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
          <td class="text-center"><?php echo $tampil['tgl_input']; ?></td>
          <td class="text-center"><?php echo $tampil['hasil_seminarproposal']; ?></td>
          <td><a class="btn btn-primary" data-toggle="tooltip" title="Download Persyaratan" href="<?php echo $tampil['dir_persyaratan'],'untuk_sekprodi/',$tampil['persyaratan2']; ?>"><i class="fa fa-file-word-o fa-fw"> </i></a>
          <td><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Pendaftaran" href="index2.php?ke=sempr0_konf&kd=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i></a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
