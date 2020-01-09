 <?php
 error_reporting(E_ALL ^ (E_NOTICE));
    include "dist/koneksi.php";


   $nim= addslashes($_POST['_NIM']);
   $nm= addslashes($_POST['_nm_mhs']);
   $tpk= addslashes($_POST['_tpk']);
   $jdl= addslashes($_POST['_judul']);
  $cek=$link->query("SELECT NIM from tblskripsi_dulu WHERE NIM='$nim'") or die (mysqli_error());
   if(mysqli_num_rows($cek) >0){
     echo "<script>window.alert('NIM sudah ada!')
    window.location='index2.php?ke=inpt_skrp'</script>";
   }else{
     $qry="INSERT INTO tblskripsi_dulu VALUES(
       '',
       '$nim',
       '$nm',
       '$tpk',
       '$jdl')";
     $link->query($qry);
   }
     if(empty($nim) || empty($nm) || empty($tpk) || empty($jdl)){
       echo "<script>window.alert('Data ada yang kosong!')
      window.location='index2.php?ke=inpt_skrp'</script>";
     }else{
       echo "<script>window.alert('Berhasil Simpan!')
      window.location='index2.php?ke=skrP'</script>";
   }

  ?>
