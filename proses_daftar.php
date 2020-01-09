<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

  include "dist/koneksi.php";

  $nim=addslashes($_POST['_nim']);


  $nm=addslashes($_POST['_nm_mahasiswa']);
  $wali=addslashes($_POST['_dosen_wali']);

  $pass=addslashes(password_hash($_POST['_passw'], PASSWORD_DEFAULT));

  $mail=addslashes($_POST['_email']);


  $allow_ext=array('jpg');
  $nama=$_FILES['_file']['name'];
  $x=explode('.', $nama);
  $ext=strtolower(end($x));
  $size=$_FILES['_file']['size'];
  $tmp=$_FILES['_file']['tmp_name'];


  if(in_array($ext, $allow_ext) === false){
    echo "<script>window.alert('ektensi file salah(yang diizinkan hanya JPEG dan JPG)!')
   window.location='index.php'</script>";
  }else{
    if($size > 1044070){
      echo "<script>window.alert('File terlalu besar (maksimal 1 mb)!')
     window.location='daftar.php'</script>";
    }else{

        $keyfoto='f0to4ndA';
        $enkripfile=md5($nama.$keyfoto);
        $namefile=$enkripfile.'.jpg';

          move_uploaded_file($tmp, 'admin_page/files_upload/mahasiswa_file/photo_files/'.$namefile);
          $cek=$link->query("SELECT * from tblmahasiswa WHERE NIM='$nim' and email='$mail'");
          $ada=mysqli_num_rows($cek);
          if($ada>0){
            echo "<script>window.alert('Data Ada yang sama!!')
           window.location='daftar.php'</script>";
          }else{
            $ceknim=substr($nim, 2, 2);

            if($ceknim!='41'){
              echo "<script>window.alert('Tidak dapat menyimpan data karena NIM bukan NIM Mahasiswa Prodi Sistem Informasi!')
             window.location='index.php'</script>";
           }else{
            if($nim=="" || $nm=="" || $pass=="" ||
              $mail=="" ||
              $nama==""){
                echo "<script>window.alert('Data ada yang kosong!')
               window.location='daftar.php'</script>";
              }else{
            $qry=$link->query("INSERT INTO tblmahasiswa VALUES(
              '',
              '$nim',
              '$nm',
              '$mail',
              '$wali',
              'Belum Ada',
              'Belum Ada',
              'Belum Ada',
              'Belum Ada',
              'Belum Ada',
              'Belum Ada',
              '$pass',
              'Menunggu Konfirmasi',
              '$namefile'
            )");
            if($qry){
              echo "<script>window.alert('Data berhasil diinput!  ')
             window.location='index.php'</script>";
          }}
    }
  }
}
}


 ?>
