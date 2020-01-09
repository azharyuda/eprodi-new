<?php
error_reporting(E_ALL ^ (E_NOTICE));
 include "dist/koneksi.php";
 include "email/email.php";

    $urt=addslashes($_POST['_urut']);
    $NIM=addslashes($_POST['_NIM']);
    $nm_mahasiswa=addslashes($_POST['_nm_mahasiswa']);
    $email=addslashes($_POST['_email']);
    $dosbing1=addslashes($_POST['_dosbing1']);
    $dosbing2=addslashes($_POST['_dosbing2']);
    $judul_skripsi=addslashes($_POST['_judul_skripsi']);
    $status_prop=addslashes($_POST['_status_prop']);
    $bagian_revisi=addslashes($_POST['_bagian_revisi']);
    $tpk=addslashes($_POST['_id_topik']);
    $statdosen=addslashes($_POST['_ubahdosen']);
    $bimbing1=addslashes($_POST['_bimbing1']);
    $bimbing2=addslashes($_POST['_bimbing2']);
    $alasandosen=addslashes($_POST['_alasan_ubahdosen']);
    if($dosbing1==$bimbing1 && $dosbing2==$bimbing2){
      echo "<script>window.alert('Data dosen sama!')
     window.location='../admin_page/index2.php?ke=prop_konf&urut=$urt'</script>";
   }else{

    $qry=$link->query("SELECT topik_skripsi FROM tbltopik_skripsi WHERE id_topik='$tpk'");
    $take=$qry->fetch_array();
    $topik=$take['topik_skripsi'];

    if(($status_prop=='terima') || ($status_prop=='revisi')){
      if(empty($urt) || empty($NIM) || empty($tpk) || empty($judul_skripsi)){
        echo "<script>window.alert('Ada data yang kosong')
       window.location='../admin_page/index2.php?ke=prop_konf&urut=$urt'</script>";
     }else{
      $tgl_diterima=date('Y-m-d');
      $qry=$link->query("INSERT INTO tblproposal_diterima VALUES(
        '$urt',
        '$NIM',
        '$tpk',
        '$judul_skripsi',
        '$tgl_diterima'
      )") or die (mysqli_error());

      if($statdosen=='ubah'){

        $ambil=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$bimbing1'");
        $ambil2=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$bimbing2'");
        $take=$ambil->fetch_array();
        $take2=$ambil2->fetch_array();
        $nidn=$take['NIDN'];
        $nidn2=$take2['NIDN'];
        $qry2=$link->query("UPDATE tblmahasiswa SET
          id_topik='$tpk',
          dosbing1='$bimbing1',
          dosbing2='$bimbing2',
          judul_skripsi='$judul_skripsi'
          WHERE NIM='$NIM'") or die (mysqli_error());
          $qry=$link->query("UPDATE tbldosen SET kuota_pembimbing1=kuota_pembimbing1 - 1 where NIDN='$nidn'");
          $qry=$link->query("UPDATE tbldosen SET kuota_pembimbing2=kuota_pembimbing2 - 1 where NIDN='$nidn2'");


    }elseif($statdosen=='gausah'){

      $ambil=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$dosbing1'");
      $ambil2=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$dosbing2'");
      $take=$ambil->fetch_array();
      $take2=$ambil2->fetch_array();
      $nidn=$take['NIDN'];
      $nidn2=$take2['NIDN'];
      $qry2=$link->query("UPDATE tblmahasiswa SET
        id_topik='$tpk',
        dosbing1='$dosbing1',
        dosbing2='$dosbing2',
        judul_skripsi='$judul_skripsi'
        WHERE NIM='$NIM'") or die (mysqli_error());
        $qry=$link->query("UPDATE tbldosen SET kuota_pembimbing1=kuota_pembimbing1 - 1 where NIDN='$nidn'");
        $qry=$link->query("UPDATE tbldosen SET kuota_pembimbing2=kuota_pembimbing2 - 1 where NIDN='$nidn2'");

}else{
  echo "<script>window.alert('Status konfirmasi dosen pembimbing salah!')
  window.location='../admin_page/index2.php?ke=prop_konf&urut=$urt'</script>";}

   $mail->addAddress("$email");
   $mail->Subject = 'Status Proposal';
   if($status_prop=='terima' && $statdosen=='ubah'){
   $mail->Body=
  "Proposal yang anda ajukan dengan detail sebagai berikut:

  -Topik yang dibahas: $topik
  -Judul yang dibahas: $judul_skripsi

  Telah mendapat ACC oleh Kaprodi tanpa revisi. Adapun dosen pembimbing yang diusulkan harus diubah, dan dosen pembimbing yang disetujui adalah:

  -Dosen Pembimbing 1: $bimbing1
  -Dosen Pembimbing 2: $bimbing2

  Alasan perubahan dosen pembimbing ini adalah: $alasandosen

  Demikian pemberitahuan mengenai status proposal Anda. Selamat berjuang, pejuang skripsi!

-$_SESSION[level] Sistem Informasi";
}elseif($status_prop=='terima' && $statdosen=='gausah'){
   $mail->Body=
  "Proposal yang anda ajukan dengan detail sebagai berikut:

  -Topik yang dibahas: $topik
  -Judul yang dibahas: $judul_skripsi

  Telah mendapat ACC oleh Kaprodi tanpa revisi. Dan dosen pembimbing yang anda usulkan disetujui, yaitu:

  -Dosen Pembimbing 1: $dosbing1
  -Dosen Pembimbing 2: $dosbing2

  Demikian pemberitahuan mengenai status proposal Anda. Selamat berjuang, pejuang skripsi!

-$_SESSION[level] Sistem Informasi";
}elseif($status_prop=='revisi' && $statdosen=='ubah'){
  $mail->Body=
  "Proposal yang anda ajukan dengan detail sebagai berikut:

  -Topik yang dibahas: $topik
  -Judul yang dibahas: $judul_skripsi

  Telah mendapat ACC oleh Kaprodi dengan beberapa revisi yaitu:
  -Revisi: $bagian_revisi

  Adapun dosen pembimbing yang diusulkan harus diubah, dan dosen pembimbing yang disetujui adalah:

  -Dosen Pembimbing 1: $bimbing1
  -Dosen Pembimbing 2: $bimbing2

  Alasan perubahan dosen pembimbing ini adalah: $alasandosen

  Demikian pemberitahuan mengenai status proposal Anda. Selamat berjuang, pejuang skripsi!

-$_SESSION[level] Sistem Informasi";
}elseif($status_prop=='revisi' && $statdosen=='gausah'){
  $mail->Body=
  "Proposal yang anda ajukan dengan detail sebagai berikut:

  -Topik yang dibahas: $topik
  -Judul yang dibahas: $judul_skripsi

  Telah mendapat ACC oleh Kaprodi dengan beberapa revisi yaitu:
  -Revisi: $bagian_revisi

  Dan dosen pembimbing yang anda usulkan disetujui, yaitu:

  -Dosen Pembimbing 1: $dosbing1
  -Dosen Pembimbing 2: $dosbing2

  Demikian pemberitahuan mengenai status proposal Anda. Selamat berjuang, pejuang skripsi!

-$_SESSION[level] Sistem Informasi";
}
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
    echo "<script>window.alert('Data Berhasil Disimpan dan Email berhasil dikirim!')
   window.location='../admin_page/index2.php?ke=prop_ok'</script>";
  }
    else{
      $alasan=addslashes($_POST['_alasan']);
      $tgl_ditolak=date('Y-m-d');
      if(empty($urt) || empty($NIM) || empty($tpk) || empty($judul_skripsi) || empty($alasan)){
        echo "<script>window.alert('Ada data yang kosong')
       window.location='../admin_page/index2.php?ke=prop_konf&urut=$urt'</script>";
     }else{
      $qry=$link->query("INSERT INTO tblproposal_ditolak VALUES(
      '$urt',
      '$NIM',
      '$tpk',
      '$judul_skripsi',
      '$alasan',
      '$tgl_ditolak')") or die (mysqli_error());

$mail->addAddress("$email");
$mail->Subject = 'Status Proposal';
$mail->Body=
  "Proposal yang Anda ajukan dengan detail sebagai berikut:

  -Topik yang dibahas: $topik
  -Judul yang dibahas: $judul_skripsi

  Belum dapat diterima untuk diangkat menjadi skripsi Anda. Adapun alasan yang melatarbelakangi itu adalah:

  -$alasan

  Silahkan untuk mengajukan topik dan judul skripsi yang lain.

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
  echo "<script>window.alert('Data Berhasil Disimpan dan Email berhasil dikirim!')
 window.location='../admin_page/index2.php?ke=prop_no'</script>";
      }
    }
    $ambil5=$link->query("SELECT nama_file FROM tblpengajuan_proposal WHERE no_urut='$urt'");
    $take5=$ambil5->fetch_array();
    $syarat=$take5['nama_file'];
    $loc='../admin_page/files_upload/proposal_file/';
    unlink($loc.$syarat);
$qry=$link->query("DELETE from tblpengajuan_proposal WHERE no_urut='$urt'");
}
?>
