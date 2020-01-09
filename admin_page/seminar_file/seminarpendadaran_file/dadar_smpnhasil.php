<?php
error_reporting(E_ALL ^ (E_NOTICE));
 include "dist/koneksi.php";
 include "email/email.php";
    $kode=addslashes($_POST['_daftar']);
     $NIM=addslashes($_POST['_NIM']);
     $dadar=addslashes($_POST['_hasil_dadar']);
     $tanggal_maju=addslashes($_POST['_tanggal_maju']);
     $email=addslashes($_POST['_email']);
     $nilaidosbing1=addslashes($_POST['_nilai_dosbing1']);
     $nilaidosbing2=addslashes($_POST['_nilai_dosbing2']);
     $nilaiuji1=addslashes($_POST['_nilai_penguji1']);
     $nilaiuji2=addslashes($_POST['_nilai_penguji2']);
     $nilaidadar=addslashes($_POST['_nilai_dadar']);
     $akhir=addslashes($_POST['_nilai_akhir']);

     $qry=$link->query("SELECT * FROM tblseminar_pendadaran WHERE NIM='$NIM' AND hasil_pendadaran='Tidak Lulus'");
     if(mysqli_num_rows($qry)>0){
       if(empty($dadar) || empty($kode) || empty($NIM)){
         echo "<script>window.alert('Data Kosong!')
        window.location='index2.php?ke=d4r_hsl&kd=$kode'</script>";
      }else{
       $qry=$link->query("UPDATE tblseminar_pendadaran SET
         nilai_dosbing1=$nilaidosbing1,
         nilai_dosbing2=$nilaidosbing2,
         nilai_penguji1=$nilaiuji1,
         nilai_penguji2=$nilaiuji2,
         nilai_dadar=$nilaidadar,
         nilai_akhir=$akhir,
         hasil_pendadaran='$dadar'
       WHERE NIM='$NIM'") or die(mysqli_error());
       $qry=$link->query("DELETE FROM tblseminar_pendadaran WHERE kode_daftar='$kode'");
       $mail->addAddress("$email");
       $mail->Subject = 'Hasil Seminar Pendadaran';
       if($dadar=='Tidak Lulus'){
       $mail->Body=
     "Berdasarkan penilaian dari seminar Pendadaran yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Pendadaran anda adalah:

     $dadar

     Tetap semangat dan jangan menyerah!

     Tertanda

     -$_SESSION[level] Sistem Informasi";
     }elseif($dadar=='Lulus'){
     $mail->Body=
     "Berdasarkan penilaian dari seminar Pendadaran yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Pendadaran anda adalah:

     $dadar

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
     window.location='index2.php?ke=d4r_sudahmaju'</script>";
     $qry=$link->query("DELETE FROM tbldaftar_pendadaran WHERE kode_daftar='$kode'");}
   }
     else{
     if(empty($dadar) || empty($kode) || empty($NIM)){
       echo "<script>window.alert('Data Kosong!')
      window.location='index2.php?ke=d4r_hsl&kd=$kode'</script>";
    }else{
     $qry=$link->query("UPDATE tblseminar_pendadaran SET
       nilai_dosbing1=$nilaidosbing1,
       nilai_dosbing2=$nilaidosbing2,
       nilai_penguji1=$nilaiuji1,
       nilai_penguji2=$nilaiuji2,
       nilai_dadar=$nilaidadar,
       nilai_akhir=$akhir,
       hasil_pendadaran='$dadar'
     WHERE kode_daftar='$kode'") or die(mysqli_error());
     $mail->addAddress("$email");
     $mail->Subject = 'Hasil Pendadaran';
     if($dadar=='Tidak Lulus'){
     $mail->Body=
"Berdasarkan penilaian dari Pendadaran yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil Pendadaran anda adalah:

$dadar

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
echo "<script>window.alert('Berhasil input Hasil!')
window.location='index2.php?ke=d4r_sudahmaju'</script>";
}elseif($dadar=='Lulus'){
$mail->Body=
"Berdasarkan penilaian dari seminar Pendadaran yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil Pendadaran anda adalah:

$dadar

dengan nilai: $akhir

Selamat untuk Anda yang baru saja menyelesaikan studi Strata 1 pada Program Studi Sistem Informasi STMIK Widya Cipta Dharma.
Semoga ilmu yang didapat dapat bermanfaat bagi masyarakat umum.
Segera selesaikan persyaratan yang dibutuhkan untuk mengikuti yudisium.

Selamat!

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
          $dlete=$link->query("DELETE FROM tbldaftar_pendadaran WHERE kode_daftar='$kode'");
     echo "<script>window.alert('Berhasil input Hasil!')
     window.location='index2.php?ke=d4r_sudahmaju'</script>";

     $qry=$link->query("SELECT dosbing1, dosbing2, dosen_penguji1, dosen_penguji2 FROM tblmahasiswa
     WHERE NIM='$NIM'");
     $take=$qry->fetch_array();
     $dosbing1=$take['dosbing1'];
     $dosbing2=$take['dosbing2'];
     $uji1=$take['dosen_penguji1'];
     $uji2=$take['dosen_penguji2'];

     $query=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$dosbing1'");
     $ambil=$query->fetch_array();
     $bimbing1=$ambil['NIDN'];
     $query2=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$dosbing2'");
     $ambil2=$query2->fetch_array();
     $bimbing2=$ambil2['NIDN'];
     $query3=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$uji1'");
     $ambil3=$query3->fetch_array();
     $penguji1=$ambil3['NIDN'];
     $query4=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$uji2'");
     $ambil4=$query4->fetch_array();
     $penguji2=$ambil4['NIDN'];

     $qry=$link->query("UPDATE tbldosen SET kuota_pembimbing1=kuota_pembimbing1 + 1
     WHERE NIDN='$bimbing1'");
     $qry=$link->query("UPDATE tbldosen SET kuota_pembimbing2=kuota_pembimbing2 + 1
     WHERE NIDN='$bimbing2'");
     $qry=$link->query("UPDATE tbldosen SET kuota_penguji1=kuota_penguji1 + 1
     WHERE NIDN='$penguji1'");
     $qry=$link->query("UPDATE tbldosen SET kuota_penguji2=kuota_penguji2 + 1
     WHERE NIDN='$penguji2'");


     /* Kode Email
     -------------
     */
   }
 }
}
          $dlete=$link->query("DELETE FROM tbldaftar_pendadaran WHERE kode_daftar='$kode'");
 ?>
