<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  include "email/email.php";

  $kd=addslashes($_POST['_kode']);
  $nim=addslashes($_POST['_NIM']);
  $nm=addslashes($_POST['_nm_mahasiswa']);
  $email=addslashes($_POST['_email']);
  $dosbing1=addslashes($_POST['_dosbing1']);
  $dosbing2=addslashes($_POST['_dosbing2']);
  $uji1=addslashes($_POST['_dosenuji1']);
  $uji2=addslashes($_POST['_dosenuji2']);
  $jdl=addslashes($_POST['_judul_skripsi']);
  $status="Sudah Dikonfirmasi";

  $pilihan=addslashes($_POST['_cek']); /*cek perubahan dosen */
  $syarat=addslashes($_POST['_syarat_kurang']); /*syarat yang tidka lengkap */

  if(empty($pilihan)){
    echo "<script>window.alert('Data Kosong!')
   window.location='index2.php?ke=d4r_konfdaftar&kd=$kd'</script>";
 }elseif($pilihan=='yes'){
   if(empty($syarat) || empty($kd) || empty($nim)){
     echo "<script>window.alert('Data Kosong!')
    window.location='index2.php?ke=d4r_konfdaftar&kd=$kd'</script>";
  }else{
    $ambil=$link->query("SELECT file_persyaratan, file_persyaratan2 FROM tbldaftar_pendadaran WHERE kode_daftar='$kd'");
$take5=$ambil->fetch_array();
$sarat=$take5['file_persyaratan'];
$loc='../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_kaprodi/';
unlink($loc.$sarat);

    $qry=$link->query("DELETE FROM tbldaftar_pendadaran
    WHERE kode_daftar='$kd' ") or die (mysqli_error());
    $mail->addAddress("$email");
    $mail->Subject = 'Status Pendaftaran Pendadaran';
    $mail->Body=
"Pendaftaran Pendadaran anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

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

  echo "<script>window.alert('Data Berhasil dihapus dan email berhasil dikirim!!')
  window.location='index2.php?ke=home'</script>";

 }
  }elseif($pilihan=='no'){
    if(empty($kd) || empty($nim)){
      echo "<script>window.alert('Data Kosong!')
     window.location='index2.php?ke=d4r_konfdaftar&kd=$kd'</script>";
   }else{
    $qry=$link->query("UPDATE tbldaftar_pendadaran SET
      status='$status'
    WHERE kode_daftar='$kd' ") or die (mysqli_error());

                    $mail->addAddress("$email");
                    $mail->Subject = 'Status Pendaftaran Pendadaran';
                    $mail->Body=
"Pendaftaran Seminar Pendadaran anda telah diterima dengan detail sebagai berikut:

-NIM                               : $nim
-Nama Mahasiswa         : $nm
-Judul Skripsi          : $jdl

-Dosen Pembimbing 1        : $dosbing1
-Dosen Pembimbing 2        : $dosbing2
-Dosen Penguji 1           : $uji1
-Dosen Penguji 2           : $uji2

Silahkan lakukan pengajuan tanggal dan waktu pendadaran agar segera mendapat ruangan.

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


              }
              echo "<script>window.alert('Data Berhasil tersimpan!!')
              window.location='index2.php?ke=home'</script>";
  }else{
    echo "<script>window.alert('Pilihan Tidak Tersedia!')
   window.location='index2.php?ke=home'</script>";
  }
 ?>
