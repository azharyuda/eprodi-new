<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  include "email/email.php";

$urut=$_GET['urut'];
$qry=$link->query("SELECT * FROM tblubah_proposal WHERE no_urut='$urut'");
$take=$qry->fetch_array();
$nim=$take['NIM'];

$qry=$link->query("SELECT email, id_topik, judul_skripsi, dosbing1, dosbing2, dosen_penguji1 FROM tblmahasiswa WHERE NIM='$nim'");
$ambil=$qry->fetch_array();
$email=$ambil['email'];
$tpk=$ambil['id_topik'];
$jdl=$ambil['judul_skripsi'];
$bing1=$ambil['dosbing1'];
$bing2=$ambil['dosbing2'];
$uji1=$ambil['dosen_penguji1'];

$ambil1=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$bing1'");
$ambil2=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$bing2'");
$ambil3=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$uji1'");
$dosbing1=$ambil1->fetch_array();
$dosbing2=$ambil2->fetch_array();
$penguji1=$ambil3->fetch_array();

$updatedosbing1=$link->query("UPDATE tbldosen SET kuota_pembimbing1=kuota_pembimbing1+1 WHERE NIDN='$dosbing1[NIDN]'");
$updatedosbing2=$link->query("UPDATE tbldosen SET kuota_pembimbing2=kuota_pembimbing2+1 WHERE NIDN='$dosbing2[NIDN]'");
$updatepenguji1=$link->query("UPDATE tbldosen SET kuota_penguji1=kuota_penguji1+1 WHERE NIDN='$penguji1[NIDN]'");

$qry=$link->query("SELECT topik_skripsi FROM tbltopik_skripsi WHERE id_topik='$tpk'");
$tampil=$qry->fetch_array();
$topik=$tampil['topik_skripsi'];


    $qry=$link->query("DELETE FROM tblubah_proposal WHERE no_urut='$urut'")or die(mysqli_error());
    $qry=$link->query("UPDATE tblmahasiswa SET
      judul_skripsi='Belum Ada',
      dosbing1='Belum Ada',
      dosbing2='Belum Ada',
      dosen_penguji1='Belum Ada',
      dosen_penguji2='Belum Ada',
      id_topik='Belum Ada'
      WHERE NIM='$nim'") or die(mysqli_error());
      $qry=$link->query("DELETE from tblproposal_diterima WHERE NIM='$nim'")or die(mysqli_error());

      $cek=$link->query("SELECT * FROM tblseminar_proposal WHERE NIM='$nim'");
      $take=$cek->fetch_array();

      if(!empty($take)){
        $del=$link->query("DELETE FROM tblseminar_proposal WHERE NIM='$nim'");
      }

      $mail->addAddress("$email");
      $mail->Subject = 'Status Perubahan Skripsi Keseluruhan';
      $mail->Body=
"Pengajuan Perubahan Skripsi anda secara keseluruhan dengan detail sebagai berikut:

-Topik Skripsi yang dibahas: $topik

-Judul Skripsi yang dibahas: $jdl

Sudah diterima dan disetujui. Silahkan lakukan pengajuan proposal skripsi yang baru.

-$_SESSION[level] Sistem Informasi";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
  $mail->send();
     echo "<script>window.alert('Data Berhasil Dihapus dan email berhasil dikirim')
     window.location='../admin_page/index2.php?ke=home'</script>";


?>
