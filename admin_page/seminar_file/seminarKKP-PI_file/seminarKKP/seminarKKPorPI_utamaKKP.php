<?php error_reporting(E_ALL); ?>

<section class="main page-header">
  <h4><i class="fa fa-check-circle fa-fw" style="color: #9150B4;"></i> Halaman Konfirmasi Seminar KKP</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li class="active">Halaman Konfirmasi Seminar KKP</li>
  </ol>
</section>


<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>
       Daftar Data Pendaftar Seminar KKP</center></b>
    </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table-data">
        <thead>
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Judul KKP</th>
          <th>Dosen Wali (Pembimbing)</th>
          <th>Rekomendasi Dosen Penguji 1</th>
          <th>Rekomendasi Dosen Penguji 2</th>
          <th>Tanggal Input Data</th>
          <th>Status</th>
          <th>Download Persyaratan</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <?php
            include "dist/koneksi.php";

            $ambil = $link->query("SELECT tbldaftarseminar_kkporpi.kode_daftar, tbldaftarseminar_kkporpi.NIM, tblmahasiswa.nm_mahasiswa,
                                    pilihan_KKPorPI, judul_KKPorPI, rekom_dosenuji1, rekom_dosenuji2, tgl_input, status, file_persyaratan,
                                    dir_persyaratan, tblmahasiswa.dosen_wali
                                    FROM tbldaftarseminar_kkporpi JOIN tblmahasiswa ON tbldaftarseminar_kkporpi.NIM=tblmahasiswa.NIM
                                    WHERE pilihan_KKPorPI='KKP' and status='Menunggu Konfirmasi'
                                     ORDER BY tgl_input")
                                    or die (mysqli_error());

            while ($tampil = $ambil->fetch_array()){
              $tgl=date('d F Y', strtotime($tampil['tgl_input']));
          ?>
          <td class="text-center"><?php echo $tampil['NIM']; ?></td>
          <td class="text-center"><?php echo $tampil['nm_mahasiswa']; ?></td>
          <td class="text-center"><?php echo $tampil['judul_KKPorPI']; ?></td>
          <td class="text-center"><?php echo $tampil['dosen_wali']; ?></td>
          <td class="text-center"><?php echo $tampil['rekom_dosenuji1']; ?></td>
          <td class="text-center"><?php echo $tampil['rekom_dosenuji2']; ?></td>
          <td class="text-center"><?php echo $tgl; ?></td>
          <td class="text-center"><?php echo $tampil['status']; ?></td>
          <td class="text-center"><a class="btn btn-primary" data-toggle="tooltip" title="Download Persyaratan" href="<?php echo $tampil['dir_persyaratan'], 'untuk_kaprodi/', $tampil['file_persyaratan'];?> "><i class="fa fa-file-word-o fa-fw"> </i></a>
          <td><a class="btn btn-success" data-toggle="tooltip" title="Konfirmasi Pendaftaran" href="index2.php?ke=kkP_konf&kode=<?php echo $tampil['kode_daftar']; ?>"><i class="fa fa-check fa-fw"> </i>Konfirmasi</a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
  </div>
