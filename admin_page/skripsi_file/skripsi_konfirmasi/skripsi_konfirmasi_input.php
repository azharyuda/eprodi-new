<?php error_reporting(E_ALL ^ (E_NOTICE)); ?>

<section class="main page-header">
  <h4>Halaman Konfirmasi Proposal Mahasiswa</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw">&nbsp;</i><a href="index2.php?ke=home">Dashboard</a></li>
    <li><a href="index2.php?ke=pr0p">Daftar Pengaju Proposal</a></li>
    <li class="active">
      Konfirmasi Proposal Skripsi
    </li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
       <b><center>Konfirmasi Proposal Skripsi</center></b>
    </div>
    <br />

    <?php
      include "dist/koneksi.php";
      $rut=htmlspecialchars(addslashes(trim($_GET['urut'])));

      $qry=$link->query("SELECT no_urut, tblpengajuan_proposal.NIM, tblpengajuan_proposal.id_topik, tblpengajuan_proposal.judul_skripsi,
        tblpengajuan_proposal.dosbing1, tblmahasiswa.email, tblpengajuan_proposal.dosbing2, nama_file, url_file,
        tgl_input, status_proposal, tblmahasiswa.nm_mahasiswa, tbltopik_skripsi.topik_skripsi
        FROM tblpengajuan_proposal JOIN tblmahasiswa ON tblpengajuan_proposal.NIM=tblmahasiswa.NIM
        JOIN tbltopik_skripsi ON tblpengajuan_proposal.id_topik=tbltopik_skripsi.id_topik WHERE no_urut='$rut'") or die (mysqli_error());
        $data=$qry->fetch_array();
        if(empty($data)){
          echo "<meta http-equiv='refresh' content='0; url=index2.php?ke=error' />";
        }
      ?>
    <form class="form-horizontal required" action="index2.php?ke=konf_smpn" method="POST" id="frm-konfprop">
      <div class="form-group">
        <label class="control-label col-sm-2">NIM</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_NIM" value="<?php echo $data['NIM']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_urut" value="<?php echo $data['no_urut']; ?>" style="display:none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Nama Mahasiswa</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_nm_mahasiswa" value="<?php echo $data['nm_mahasiswa']; ?>" readonly="readonly">
          <input type="text" class="form-control required" name="_email" value="<?php echo $data['email']; ?>"  style="display:none;">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_id_topik" value="<?php echo $data['id_topik']; ?>" readonly="readonly" style="display:none;">
          <input type="text" class="form-control required" name="_topik_skripsi" value="<?php echo $data['topik_skripsi']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Judul Skripsi</label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="_judul_skripsi" readonly="readonly"><?php echo $data['judul_skripsi']; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Usulan Dosen Pembimbing 1</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_dosbing1" value="<?php echo $data['dosbing1']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Usulan Dosen Pembimbing 2</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_dosbing2" value="<?php echo $data['dosbing2']; ?>" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Status Proposal</label>
        <div class="col-sm-5">
          <select class="form-control required" name="_status_prop" id="status" onchange="cek_status(this)">
              <option hidden value="">Pilih Status</option>
              <option value="terima">Diterima</option>
              <option value="revisi">Diterima dengan Revisi</option>
              <option value="tidak">Tidak Diterima</option>
          </select>
        </div>
        <button type="submit" class="btn btn-success" value="simpan_hasil"><i class="fa fa-floppy-o fa-fw"></i> Simpan Konfirmasi</button>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" id="lbl_revisi" style="display:none;">Bagian yang direvisi</label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="_bagian_revisi" id="bagian_revisi" style="display:none;" placeholder="masukkan bagian yang direvisi"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" id="lbl_alasan" style="display:none;">Alasan Tidak Diterima</label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="_alasan" id="alasan" style="display:none;" placeholder="masukkan alasan"></textarea>
        </div>
      </div>

          <div class="form-group">
            <label class="control-label col-sm-2" style="display:none;" id='lbldos'>Apakah Pembimbing ingin diubah?</label>
            <div class="col-sm-5">
              <select class="form-control required" name="_ubahdosen" onchange="cekdos(this)" style="display:none;"  id="dos" >
                  <option hidden value="">Pilih Status</option>
                  <option value="ubah">Diubah</option>
                  <option value="gausah">Tidak Diubah</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" style="display:none;" id='lblbing1'>Dosen Pembimbing 1 yang disetujui: </label>
            <div class="col-sm-5">
              <select class="form-control required" name="_bimbing1" style="display:none;" id='bing1'>
                  <option hidden value="">Pilih Status</option>
                  <?php
                  $qry=$link->query("SELECT nm_dosen FROM tbldosen WHERE kuota_pembimbing1>0 order by nm_dosen");
                  while($bimbing1=$qry->fetch_array()){
                 echo "<option value='$bimbing1[nm_dosen]'>$bimbing1[nm_dosen]</option>";} ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" style="display:none;" id='lblbing2'>Dosen Pembimbing 2 yang disetujui: </label>
            <div class="col-sm-5">
              <select class="form-control required" name="_bimbing2" style="display:none;" id='bing2'>
                  <option hidden value="">Pilih Status</option>

                  <?php
                  $bimbing1=$_POST['_bimbing1'];
                  $qry=$link->query("SELECT nm_dosen FROM tbldosen WHERE kuota_pembimbing2>0 order by nm_dosen");
                  while($bimbing2=$qry->fetch_array()){
                  echo "<option value='$bimbing2[nm_dosen]'>$bimbing2[nm_dosen]</option>";}
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" id="dosalas" style="display:none;">Alasan Pengubahan Dosen</label>
            <div class="col-sm-5">
              <textarea class="form-control required" name="_alasan_ubahdosen" id="ubahdosalas" style="display:none;" placeholder="masukkan alasan"></textarea>
            </div>
          </div>
        </div>
  </form>

</div>
