<section class="main page-header">
  <h4><i class="fa fa-inbox fa-fw" style="color: #9150B4;"></i> Daftar Pengajuan Perubahan Judul Skripsi</h4>
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
       Daftar Mahasiswa Yang Ingin Mengganti Proposal Skripsi</center></b>
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
          <th>Dosen Pembimbing 1</th>
          <th>Dosen Pembimbing 2</th>
          <th>Tanggal Acc Skripsi</th>
          <th>Alasan Ubah Proposal</th>
          <th>Status</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>
        <?php
            include "dist\koneksi.php";

            $ambil = mysqli_query($link, "SELECT tblubah_proposal.no_urut, tblubah_proposal.NIM,
              tblubah_proposal.id_topik,
              tblmahasiswa.judul_skripsi,
              tblmahasiswa.nm_mahasiswa,
              tblubah_proposal.dosbing1,
              tblubah_proposal.dosbing2,
              tblubah_proposal.alasan_ubah,
              tbltopik_skripsi.topik_skripsi,
              tblproposal_diterima.tgl_diterima,
              status
              FROM tblubah_proposal JOIN tblproposal_diterima ON tblubah_proposal.no_urut=tblproposal_diterima.no_urut
              JOIN tbltopik_skripsi ON tblubah_proposal.id_topik=tbltopik_skripsi.id_topik
              JOIN tblmahasiswa ON tblubah_proposal.NIM=tblmahasiswa.NIM") or die (mysqli_error());
            while ($tampil = mysqli_fetch_array($ambil)){
          ?>

        <tr>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['topik_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_skripsi']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing1']; ?></td>
          <td class="text-center"><?php echo $tampil['dosbing2']; ?></td>
          <td class="text-center"><?php echo $tampil['tgl_diterima']; ?></td>
          <td class="text-center"><?php echo $tampil['alasan_ubah']; ?></td>
          <td class="text-center"><?php echo $tampil['status']; ?></td>
          <td class="text-center"><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Perubahan Proposal" href="index2.php?ke=mh5_ubhprop&urt=<?php echo $tampil['no_urut']; ?>"><i class="fa fa-check fa-fw"> </i></a>
          </td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
