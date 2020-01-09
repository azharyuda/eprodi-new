<?php
error_reporting(E_ALL ^ (E_NOTICE));
 include "dist/koneksi.php";
 include "email/email.php";
    $kode=addslashes($_POST['_daftar']);
     $NIM=addslashes($_POST['_NIM']);
     $sem2=addslashes($_POST['_hasil_seminar2']);
     $tanggal_maju=addslashes($_POST['_tanggal_maju']);
     $email=addslashes($_POST['_email']);
     $nilaidosbing1=addslashes($_POST['_nilai_dosbing1']);
     $nilaidosbing2=addslashes($_POST['_nilai_dosbing2']);
     $nilaiuji1=addslashes($_POST['_nilai_penguji1']);
     $nilaiuji2=addslashes($_POST['_nilai_penguji2']);
     $akhir=addslashes($_POST['_nilai_akhir']);

     $qry=$link->query("SELECT * FROM tblseminar_2 WHERE NIM='$NIM' AND hasil_seminar2='Tidak Lulus'");
     if(mysqli_num_rows($qry)>0){
       if(empty($sem2) || empty($kode) || empty($NIM)){
         echo "<script>window.alert('Data Kosong!')
        window.location='index2.php?ke=semh4s_hsl&kd=$kode'</script>";
      }else{
       $qry=$link->query("UPDATE tblseminar_2 SET
         nilai_dosbing1=$nilaidosbing1,
         nilai_dosbing2=$nilaidosbing2,
         nilai_penguji1=$nilaiuji1,
         nilai_penguji2=$nilaiuji2,
         nilai_akhir=$akhir,
         hasil_seminar2='$sem2'
       WHERE NIM='$NIM'") or die(mysqli_error());
       $qry=$link->query("DELETE FROM tblseminar_2 WHERE kode_daftar='$kode'");
       $mail->addAddress("$email");
       $mail->Subject = 'Hasil Seminar Hasil';
       if($sem2=='Tidak Lulus'){
       $mail->Body=
   "Berdasarkan penilaian dari seminar Hasil yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Hasil anda adalah:

   $sem2

   Tetap semangat dan jangan menyerah!

   Tertanda

   -$_SESSION[level] Sistem Informasi";
   }elseif($sem2=='Lulus'){
     $mail->Body=
     "Berdasarkan penilaian dari seminar Hasil yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Hasil anda adalah:

     $sem2

     Dengan nilai: $akhir

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
   window.location='index2.php?ke=semh4s_sudahmaju'</script>";
  $qry=$link->query("DELETE FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kode'");
}
     }else{
     if(empty($sem2) || empty($kode) || empty($NIM)){
       echo "<script>window.alert('Data Kosong!')
      window.location='index2.php?ke=semh4s_hsl&kd=$kode'</script>";
    }else{
     $qry=$link->query("UPDATE tblseminar_2 SET
       nilai_dosbing1=$nilaidosbing1,
       nilai_dosbing2=$nilaidosbing2,
       nilai_penguji1=$nilaiuji1,
       nilai_penguji2=$nilaiuji2,
       nilai_akhir=$akhir,
       hasil_seminar2='$sem2'
     WHERE kode_daftar='$kode'") or die(mysqli_error());

     $qry2=$link->query("DELETE FROM tbldaftarseminar_skripsi WHERE NIM='$NIM'") or die(mysqli_error());

         $mail->addAddress("$email");
         $mail->Subject = 'Hasil Seminar Hasil';
         if($sem2=='Tidak Lulus'){
         $mail->Body=
     "Berdasarkan penilaian dari seminar Hasil yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Hasil anda adalah:

     $sem2

     Tetap semangat dan jangan menyerah!

     Tertanda

     -$_SESSION[level] Sistem Informasi";
     }elseif($sem2=='Lulus'){
       $mail->Body=
       "Berdasarkan penilaian dari seminar Hasil yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Hasil anda adalah:

       $sem2

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
     window.location='index2.php?ke=semh4s_sudahmaju'</script>";
     /* Kode Email
     -------------
     */
     $qry=$link->query("DELETE FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kode'");
   }
}
 ?>
