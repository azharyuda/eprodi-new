<section class="main page-header">
  <h4><i class="fa fa-clipboard fa-fw" style="color: #9150B4;"></i> Daftar Pengajuan Proposal Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li class="active">
      Daftar Pengaju Proposal Skripsi
    </li>
  </ol>
</section>
<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Data Proposal Skripsi</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Topik Skripsi</th>
          <th>Judul Skripsi</th>
          <th>Usulan Dosen Pembimbing 1</th>
          <th>Usulan Dosen Pembimbing 2</th>
          <th>Tanggal Input</th>
          <th>Status</th>
          <th>Download Proposal</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT no_urut, tblpengajuan_proposal.NIM, tblpengajuan_proposal.id_topik, tblpengajuan_proposal.judul_skripsi,
              tblpengajuan_proposal.dosbing1, tblpengajuan_proposal.dosbing2, nama_file, url_file,
              tgl_input, status_proposal, tblmahasiswa.nm_mahasiswa, tbltopik_skripsi.topik_skripsi
              FROM tblpengajuan_proposal JOIN tblmahasiswa ON tblpengajuan_proposal.NIM=tblmahasiswa.NIM
              JOIN tbltopik_skripsi ON tblpengajuan_proposal.id_topik=tbltopik_skripsi.id_topik") or die(mysqli_error());
            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tgl_input']));
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing2']; ?></td>
          <td class="text-center"><?php echo $tgl; ?></td>
          <td class="text-center"><?php echo $tampil['status_proposal']; ?></td>
          <td><a class="btn btn-primary" data-toggle="tooltip" title="Download Proposal" href="<?php echo $tampil['url_file']; ?>"><i class="fa fa-file-word-o fa-fw"> </i></a>
          <td><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Proposal" href="index2.php?ke=prop_konf&urut=<?php echo $tampil['no_urut']; ?>"><i class="fa fa-check fa-fw"></i></a>
          </td>
          <?php } ?>
        </tr>

      </table>
    </div>
  </div>
