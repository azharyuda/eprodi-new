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
  $dosenuji1=addslashes($_POST['_dosenuji1']); /* Dosen Penguji 1 yang diubah */
  $dosenuji2=addslashes($_POST['_dosenuji2']); /* Dosen Penguji 2 yang diubah  */
  $ubah=addslashes($_POST['_dosen_ubah']); /* Pengecekan apakah dosen penguji dirubah apa tidak  */
  $alasan_ubah=addslashes($_POST['_alasan_ubah']);  /*alasan merubah dosen penguji */
  $status="Sudah Dikonfirmasi";
  $syarat=addslashes($_POST['_syarat']); /* Persyaratan yang kurang */
  $cek=addslashes($_POST['_cek']); /* Pengecekan persyaratan */
  $email=addslashes($_POST['_email']);
  $nm=addslashes($_POST['_nm_mahasiswa']);

  $qry=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$usulandosen1'");
  $take=$qry->fetch_array();
  $kuotausulan1=$take['NIDN'];
  $qry2=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$usulandosen2'");
  $take2=$qry2->fetch_array();
  $kuotausulan2=$take2['NIDN'];
  $qry3=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$dosenuji1'");
  $take3=$qry3->fetch_array();
  $kuotauji1=$take3['NIDN'];
  $qry4=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$dosenuji2'");
  $take4=$qry4->fetch_array();
  $kuotauji2=$take4['NIDN'];
  /*Cek Kelengkapan Persyaratan */
  /*Jika persyaratan tidak lengkap */
  if($cek=='nope'){
    /* Jika ada data yang kosong */
    if(empty($kode)  || empty($nim) || empty($syarat)){
      echo "<script>window.alert('Data Kosong!')
     window.location='../admin_page/index2.php?ke=P1_konf&kode=$kode'</script>";
   }else{
     /*Jika tidak ada data yang kosong */
           $ambil=$link->query("SELECT file_persyaratan2, file_persyaratan FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");
    $take=$ambil->fetch_array();
    $syarat2=$take['file_persyaratan'];

    $loc2='../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/';
    unlink($loc2.$syarat2);
    $qry=$link->query("DELETE FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'") or die (mysqli_error());

    /* Script Kirim Email Pendaftaran Tidak Diterima */
    $mail->addAddress("$email");
    $mail->Subject = 'Status Pendaftaran Seminar PI';
    $mail->Body=
"Pendaftaran Seminar PI anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

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
   window.location='../admin_page/index2.php?ke=P1_dftr'</script>";
 }
/*-------------------------------------------*/




 /*Kelengkapan Persyaratan End */
 /*jika persyaratan lengkap */
 }else{
   /*Cek apakah Dosen Dirubah atau tidak */
  if($ubah=='gaada'){
    if(empty($kode)  || empty($nim) || empty($doswal) || empty($usulandosen1) || empty($usulandosen2)){
      echo "<script>window.alert('Data ada yang kosong!')
     window.location='../admin_page/index2.php?ke=P1_konf&kode=$kode'</script>";
   }else{
  $qry=$link->query("UPDATE tbldaftarseminar_kkporpi SET
    rekom_dosenuji1='$usulandosen1',
    rekom_dosenuji2='$usulandosen2',
    status='$status'
  WHERE kode_daftar='$kode'") or die (mysqli_error());

  $qry=$link->query("UPDATE tbldosen SET kuotapenguji1_kkpi=kuotapenguji1_kkpi - 1
  WHERE NIDN='$kuotausulan1'");
  $qry=$link->query("UPDATE tbldosen SET kuotapenguji2_kkpi=kuotapenguji2_kkpi - 1
  WHERE NIDN='$kuotausulan2'");


/*Bagian Email Pendaftaran Diterima tanpa perubahan Dosen */
    $mail->addAddress("$email");
    $mail->Subject = 'Status Pendaftaran Seminar PI';
    $mail->Body=
"Pendaftaran Seminar PI anda telah diterima dengan detail sebagai berikut:

NIM                               : $nim
Nama Mahasiswa         : $nm
Pilihan yang diambil   : $pilihan
Judul Laporan          : $jdl
Dosen Wali/Pembimbing        : $doswal
Dosen Penguji 1           : $usulandosen1
Dosen Penguji 2           : $usulandosen2

Tidak ada perubahan Dosen Penguji. Silahkan segera mendaftarkan tanggal dan waktu seminar agar segera mendapatkan ruangan Seminar

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
  window.location='../admin_page/index2.php?ke=P1_dftr'</script>";
/*-------------------------------------------------- */


}
}elseif($ubah=='ada'){

  /*Jika ada dosen yang dirubah */
  if(empty($kode)  || empty($nim) || empty($doswal) || empty($dosenuji1) || empty($dosenuji1) || empty($alasan_ubah)){
    echo "<script>window.alert('Data ada yang kosong!')
    window.location='../admin_page/index2.php?ke=P1_konf&kode=$kode'</script>";
  }elseif($dosenuji1===$usulandosen1 && $dosenuji2===$usulandosen2){
    echo "<script>window.alert('Data dosen yang diinputkan tidak berubah!!')
    window.location='../admin_page/index2.php?ke=kkP_konf&kode=$kode'</script>";
  }else{
  $qry=$link->query("UPDATE tbldaftarseminar_kkporpi SET
    rekom_dosenuji1='$dosenuji1',
    rekom_dosenuji2='$dosenuji2',
    status='$status'
    WHERE kode_daftar='$kode' ") or die (mysqli_error());

    $qry=$link->query("UPDATE tbldosen SET kuotapenguji1_kkpi=kuotapenguji1_kkpi - 1
    WHERE NIDN='$kuotauji1'");
    $qry=$link->query("UPDATE tbldosen SET kuotapenguji2_kkpi=kuotapenguji2_kkpi - 1
    WHERE NIDN='$kuotauji2'");

    /*Script email untuk pendaftaran yang ada perubahan dosen */
    $mail->addAddress("$email");
    $mail->Subject = 'Status Pendaftaran Seminar PI';
    $mail->Body=
"Pendaftaran Seminar PI Anda telah diterima dengan penggantian pada dosen penguji yang anda usulkan, yaitu:

NIM                               : $nim
Nama Mahasiswa         : $nm
Judul PI               : $jdl

Dosen Wali/Pembimbing        : $doswal
Dosen Penguji 1           : $dosenuji1
Dosen Penguji 2           : $dosenuji2

Dosen Penguji yang Anda usulkan diubah dikarenakan: $alasan_ubah.

Silahkan segera mendaftarkan tanggal dan waktu seminar agar segera mendapatkan ruangan Seminar

Tertanda:
$_SESSION[level] Sistem Informasi";
  //passing the SSL Certificate
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );
  $mail->send();
  echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
  window.location='../admin_page/index2.php?ke=P1_dftr'</script>";

  }
}
}
 ?>
