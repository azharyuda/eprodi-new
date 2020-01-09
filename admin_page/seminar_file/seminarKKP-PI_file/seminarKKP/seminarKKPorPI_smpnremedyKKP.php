<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  include "email/email.php";

  $kode=addslashes($_POST['_kode']);
  $nim=addslashes($_POST['_NIM']);
  $doswal=addslashes($_POST['_dosen_wali']);
  $pilihan=addslashes($_POST['_pilihan_KKPorPI']);
  $jdl=addslashes($_POST['_judul_KKPorPI']);
  $usulandosen1=addslashes($_POST['_rekom_dosenuji1']); /* Dosen Penguji 1 yang diusulkan  */
  $usulandosen2=addslashes($_POST['_rekom_dosenuji2']); /* Dosen Penguji 2 yang diusulkan  */
  $status="Sudah Dikonfirmasi";
  $syarat=addslashes($_POST['_syarat']); /* Persyaratan yang kurang */
  $cek=addslashes($_POST['_cek']); /* Pengecekan persyaratan */
  $email=addslashes($_POST['_email']);
  $nm=addslashes($_POST['_nm_mahasiswa']);


  /*Cek Kelengkapan Persyaratan */
  /*Jika persyaratan tidak lengkap */
  if($cek=='nope'){
    /* Jika ada data yang kosong */
    if(empty($kode)  || empty($nim) || empty($syarat)){
      echo "<script>window.alert('Data Kosong!')
     window.location='../admin_page/index2.php?ke=kkP_konf&kode=$kode'</script>";
   }else{
     /*Jika tidak ada data yang kosong */
    $ambil=$link->query("SELECT file_persyaratan, file_persyaratan2 FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");
    $take5=$ambil->fetch_array();
    $sarat=$take5['file_persyaratan'];
    $loc='../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/';
    unlink($loc.$sarat);
    $qry=$link->query("DELETE FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'") or die (mysqli_error());

    /* Script Kirim Email Pendaftaran Tidak Diterima */
    $mail->addAddress("$email");
    $mail->Subject = 'Status Pendaftaran Ujian Ulang Seminar KKP';
    $mail->Body=
"Pendaftaran Seminar KKP anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

- $syarat

Silahkan segera melakukan pendaftaran kembali dengan persyaratan yang sudah lengkap.

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
  /* End Email dan cek kelengkapan*/

  echo "<script>window.alert('Data berhasil dikonfirmasi dan Email berhasil dikirim!')
   window.location='../admin_page/index2.php?ke=kkP_remed'</script>";
 }
/*-------------------------------------------*/

/*Kelengkapan Persyaratan End */
/*jika persyaratan lengkap */
}else{
  $qry=$link->query("UPDATE tbldaftarseminar_kkporpi SET
    rekom_dosenuji1='$usulandosen1',
    rekom_dosenuji2='$usulandosen2',
    status='$status'
  WHERE kode_daftar='$kode' ");
  $mail->addAddress("$email");
  $mail->Subject = 'Status Pendaftaran Ujian Ulang Seminar KKP';
  $mail->Body=
"Pendaftaran Ujian Ulang SeminarKKP anda telah diterima dengan detail sebagai berikut:

NIM                               : $nim
Nama Mahasiswa         : $nm
Judul KKP                              : $jdl

Dosen Wali/Pembimbing        : $doswal
Dosen Penguji 1                     : $usulandosen1
Dosen Penguji 2                     : $usulandosen2

Silahkan segera mendaftarkan tanggal dan waktu seminar agar segera mendapatkan ruangan Seminar

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
/* End Email dan cek dosen */
echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
window.location='../admin_page/index2.php?ke=kkP_remed'</script>";
  }
