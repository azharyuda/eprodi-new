<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";
?>

<section class="main page-header">
    <h2><i class="fa fa-pencil-square" aria-hidden="true" style="color: #9150B4;"></i> Pengajuan Proposal Skripsi Mahasiswa</h2>
</section>


<?php
$qry=$link->query("SELECT * from tblpengajuan_proposal WHERE NIM=$_SESSION[NIM]");
$take=$qry->fetch_array();
if($take['status_proposal']=='Menunggu Konfirmasi'){
  echo "Mohon maaf, pengajuan anda belum dikonfirmasi. Silahkan menunggu konfirmasi dari Kaprodi paling lambat 1x24 jam. Konfirmasi akan dikirim ke email anda";
}else{
  $qry=$link->query("SELECT * from tblproposal_diterima WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();

  if(!empty($take)){
    echo "Anda sudah memiliki proposal! Silahkan Cek E-Mail anda untuk informasi mengenai proposal anda";
  }else{

    $qry=$link->query("SELECT judul_skripsi from tblmahasiswa WHERE NIM=$_SESSION[NIM]");
    $take=$qry->fetch_array();

    if($take['judul_skripsi'] !=='Belum Ada'){
      echo "Anda sudah memiliki judul skripsi! Silahkan daftarkan diri untuk melaksanakan seminar proposal, hasil, atau pendadaran";
    }else{

 ?>
<div class="panel panel-primary">
    <div class="panel-heading">
       <b><center>Pengajuan Proposal Skripsi Mahasiswa</center></b>
    </div>
    <div class="panel-body">
      <form class="form required" action="index.php?ke=proposal-smpn" method="POST" id="frm-prop" enctype="multipart/form-data">
        <div class="form-group">
          <label>Topik Skripsi: </label>
          <select class="form-control required" name="_topik">
            <option hidden value="">
               Pilih
            </option>
            <?php
              $prop=$link->query("SELECT * from tbltopik_skripsi");
              while ($ambil=$prop->fetch_array()){
             ?>
            <option value="<?php echo $ambil['id_topik']; ?>"><?php echo $ambil['topik_skripsi']; }?></option>
          </select>
        </div><br />
        <div class="form group">
          <label>Judul Yang Diajukan: </label>
          <textarea class=" form-control required" name="_judul" placeholder="Isi Judul Skripsi Anda" maxlength="400"></textarea>
        </div><br />
        <div class="form-group">
          <label>Usulan Nama Dosen Pembimbing 1 (Nama Dosen dapat berubah sesuai dengan yang disetujui oleh Kaprodi): </label>
          <select class="form-control required" name="_dosbing1" id="bimbing1">
            <option hidden value="">Pilih</option>
            <?php
              $qry = $link->query("SELECT  nm_dosen from tbldosen where kuota_pembimbing1>0 order by nm_dosen");
              while ($data = $qry->fetch_array())
              {
              echo "<option value='$data[nm_dosen]'>$data[nm_dosen]</option>";
              }
            ?>
          </select>
        </div><br />
        <div class="form-group">
          <label>Usulan Nama Dosen Pembimbing 2 (Nama Dosen dapat berubah sesuai dengan yang disetujui oleh Kaprodi): </label>
          <select class="form-control required" name="_dosbing2" id="bimbing2">
            <option hidden value="">Pilih</option>
            <?php
              $qry = $link->query("SELECT  nm_dosen from tbldosen where kuota_pembimbing2>0 order by nm_dosen");
              while ($data = $qry->fetch_array())
              {
              echo "<option value='$data[nm_dosen]'>$data[nm_dosen]</option>";
              }
            ?>
          </select><br />
        <div class="form-group">
          <label>Upload File Proposal yang ingin diajukan:  </label>
          <input type="file" class="form-control required" name="_file_proposal" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/zip" /><br>
        </div>

        <h5 style="color: red;">Harap Periksa Kembali semua data yang telah diinputkan sebelum menyimpan!</h5>
        <button type="submit" value="simpan" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
    </div>
  <?php }} }?>
  </form>
</div>
