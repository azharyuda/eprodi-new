<?php
error_reporting(E_ALL ^ (E_NOTICE));
 include "dist/koneksi.php";
 include "email/email.php";

    $kode=addslashes($_POST['_daftar']);
     $NIM=addslashes($_POST['_NIM']);
     $hslpi=addslashes($_POST['_hasil_seminarPI']);
     $tanggal_maju=addslashes($_POST['_tanggal_maju']);
     $email=addslashes($_POST['_email']);
     $dosenuji1=addslashes($_POST['_dosenuji1']);
     $dosenuji2=addslashes($_POST['_dosenuji2']);
     $nilaiwali=addslashes($_POST['_nilai_dosenwali']);
     $nilaiuji1=addslashes($_POST['_nilai_penguji1']);
     $nilaiuji2=addslashes($_POST['_nilai_penguji2']);
     $akhir=addslashes($_POST['_nilai_akhir']);

     $qry=$link->query("SELECT * FROM tblseminar_pi WHERE NIM='$NIM' AND hasil_seminarpi='Tidak Lulus'");
     if(mysqli_num_rows($qry)>0){
       if(empty($hslpi) || empty($kode) || empty($NIM)){
         echo "<script>window.alert('Data Kosong!')
        window.location='index2.php?ke=P1_hsl&kode=$kode'</script>";
      }else{
       $qry=$link->query("UPDATE tblseminar_pi SET
         nilai_dosenwali='$nilaiwali',
         nilai_penguji1='$nilaiuji1',
         nilai_penguji2='$nilaiuji2',
         nilai_akhir='$akhir',
         hasil_seminarpi='$hslpi'
       WHERE NIM='$NIM'") or die(mysqli_error());
       $qry=$link->query("DELETE FROM tblseminar_pi WHERE kode_daftar='$kode'");
       $mail->addAddress("$email");
       $mail->Subject = 'Hasil Seminar PI';
       if($hslpi=='Tidak Lulus'){
       $mail->Body=
     "Berdasarkan penilaian dari seminar PI yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar $hslpi anda adalah:

     $hslpi

     Tetap semangat dan jangan menyerah!

     Tertanda

     -$_SESSION[level] Sistem Informasi";
     }elseif($hslpi=='Lulus'){
     $mail->Body=
     "Berdasarkan penilaian dari seminar PI yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar PI anda adalah:

     $hslpi

     dengan nilai: $akhir

     Selamat untuk Anda!

     Tertanda

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
     echo "<script>window.alert('Berhasil input Hasil!')
     window.location='index2.php?ke=P1_sudahmaju'</script>";
     $qry=$link->query("DELETE FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");}
   }
     else{
     if(empty($kode) || empty($NIM) || empty($hslpi) || empty($dosenuji1) || empty($dosenuji2)){
       echo "<script>window.alert('Data Kosong!')
      window.location='../admin_page/index2.php?ke=P1_hsl&kode=$kode'</script>";
    }else{
     $qry=$link->query("UPDATE tblseminar_pi SET
       nilai_dosenwali='$nilaiwali',
       nilai_penguji1='$nilaiuji1',
       nilai_penguji2='$nilaiuji2',
       nilai_akhir='$akhir',
       hasil_seminarpi='$hslpi'
     WHERE kode_daftar='$kode'") or die(mysqli_error());
     $qry=$link->query("DELETE FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");
}


    $mail->addAddress("$email");
    $mail->Subject = 'Hasil Seminar PI';
    if($hslpi=='Tidak Lulus'){
    $mail->Body=
"Berdasarkan penilaian dari seminar PI yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar PI anda adalah:

$hslpi

Tetap semangat dan jangan menyerah!

Tertanda

-$_SESSION[level] Sistem Informasi";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->send();
}elseif($hslpi=='Lulus'){
  $mail->Body=
  "Berdasarkan penilaian dari seminar PI yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar PI anda adalah:

  $hslpi

  Dengan nilai: $akhir

  Selamat untuk Anda!

  Tertanda

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

  $qry=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$dosenuji1'");
  $take=$qry->fetch_array();
  $kuotauji1=$take['NIDN'];
  $qry=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$dosenuji2'");
  $take2=$qry->fetch_array();
  $kuotauji2=$take2['NIDN'];

  $qry=$link->query("UPDATE tbldosen SET kuotapenguji1_kkpi=kuotapenguji1_kkpi + 1
  WHERE NIDN='$kuotauji1'");
  $qry=$link->query("UPDATE tbldosen SET kuotapenguji2_kkpi=kuotapenguji2_kkpi + 1
  WHERE NIDN='$kuotauji2'");
}
  echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
  window.location='../admin_page/index2.php?ke=P1_sdhmju'</script>";
  $qry=$link->query("DELETE FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");
}
 ?>
