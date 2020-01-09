<?php
error_reporting(E_ALL ^ (E_NOTICE));
include "dist/koneksi.php";
include "email/email.php";
$kod=$_GET['kode'];
$ambil = $link->query("SELECT id, tblmahasiswa.email, tblproposal_diterima.NIM,  tblmahasiswa.nm_mahasiswa, tblproposal_diterima.judul_skripsi,tgl_diterima,
DATE_ADD(tgl_diterima, INTERVAL 31 DAY) AS tgl_seminar1,
DATE_ADD(tgl_diterima, INTERVAL 93 DAY) AS tgl_seminar2,
DATE_ADD(tgl_diterima, INTERVAL 124 DAY) AS tgl_pendadaran
FROM tblproposal_diterima JOIN tblmahasiswa ON tblmahasiswa.NIM=tblproposal_diterima.NIM WHERE id='$kod'") or die (mysqli_error($link));
  while($tampil = $ambil->fetch_array()){
  $tglterima=date('d F Y', strtotime($tampil['tgl_diterima']));
  $sem1=date('d F Y', strtotime($tampil['tgl_seminar1']));
  $sem2=date('d F Y', strtotime($tampil['tgl_seminar2']));
  $dadar=date('d F Y', strtotime($tampil['tgl_pendadaran']));
  $email=$tampil['email'];
  $nm=$tampil['nm_mahasiswa'];
  $jdl=$tampil['judul_skripsi'];
  $nim=$tampil['NIM'];

  $mail->addAddress("$email");
  $mail->Subject = 'Tanggal Prediksi Seminar Skripsi';
  $mail->Body=
  "Berikut ini adalah tanggal prediksi seminar skripsi anda:

  -NIM: $nim
  -Nama Mahasiswa: $nm
  -Judul Skripsi: $jdl
  -Tanggal Skripsi Diterima: $tglterima

  -Prediksi Tanggal Seminar Proposal/Seminar 1: $sem1
  -Prediksi Tanggal Seminar Hasil/Seminar 2: $sem2
  -Prediksi Tanggal Seminar Pendadaran: $dadar


  -$_SESSION[level] Sistem Informasi";
  //passing the SSL Certificate
  $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
  );
  $mail->send();
  echo "<script>window.alert('Peringatan Berhasil Dikirim!')
  window.location='../admin_page/index2.php?ke=home'</script>";
}
?>
