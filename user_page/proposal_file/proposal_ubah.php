<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Halaman Perubahan Proposal Skripsi Mahasiswa</h2>
</section>

<?php
  $qry=$link->query("SELECT * FROM tblubah_proposal WHERE NIM='$_SESSION[NIM]'");
  $take=$qry->fetch_array();
  if($take['status']=='Menunggu konfirmasi'){
    echo "Mohon maaf, perubahan proposal anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
  }else{
    $qry=$link->query("SELECT tblmahasiswa.id_topik, tbltopik_skripsi.topik_skripsi, judul_skripsi, dosbing1, dosbing2
      FROM tblmahasiswa JOIN tbltopik_skripsi ON tblmahasiswa.id_topik=tbltopik_skripsi.id_topik WHERE NIM='$_SESSION[NIM]'");
    $take=$qry->fetch_array();
    $jdl=$take['judul_skripsi'];
    $dosbing=$take['dosbing1'];
    $dosbing2=$take['dosbing2'];
    $topik=$take['topik_skripsi'];
    if(empty($jdl)){
      echo "Anda tidak dapat merubah judul skripsi karena anda belum memiliki judul skripsi. Silahkan ajukan proposal skripsi terlebih dahulu";
  }else{

      $qry=$link->query("SELECT * FROM tblseminar_proposal WHERE NIM='$_SESSION[NIM]'");
      $hslprop=$qry->fetch_array();
      if($hslprop['hasil_seminarproposal']=='Menunggu selesai seminar' || $hslprop['hasil_seminarproposal']=='Menunggu ruangan seminar'){
        echo "Anda tidak dapat mengubah proposal saat ini dikarenakan sudah mendaftar seminar proposal";
      }else{
        $qry=$link->query("SELECT * FROM tblseminar_2 WHERE NIM='$_SESSION[NIM]'");
        $hsl=$qry->fetch_array();
        if($hsl['hasil_seminar2']=='Lulus'){
          echo "Anda tidak dapat mengubah proposal karena sudah melaksanakan seminar 2 dan lulus!";
        }elseif($hsl['hasil_seminar2']=='Menunggu selesai seminar'){
          echo "Anda tidak dapat mengubah proposal saat ini dikarenakan sudah mendaftar seminar 2";
        }else{

?>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Perubahan Proposal Skripsi</center></b>
    </div>
    <div class="panel-body">
      <h5>Topik Skripsi anda saat ini: <b><?php echo $topik; ?></b></h5>
      <h5>Judul Skripsi Anda saat ini: <b><?php echo $jdl; ?></b></h5>
      <h5>Dosen Pembimbing 1: <b><?php echo $dosbing; ?></b></h5>
      <h5>Dosen Pembimbing 2: <b><?php echo $dosbing2; ?></b></h5>
      <hr />
      <form class="form required" action="../user_page/proposal_file/proposal_smpn.php" method="POST" id="frm-ubah" enctype="multipart/form-data">
        <div class="form-group">
          <label>Alasan Ingin Merubah Proposal: </label>
          <textarea name="_alasan" class="form-control required" placeholder="Masukkan Alasan Anda"></textarea>
        </div>
        <h5 style="color: red;">*Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
      </form>
    </div>
</div>
<?php }}}} ?>
