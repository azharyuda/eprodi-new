  <!DOCTYPE html>
<?php
  error_reporting(E_ALL);
   ?>
<html>
  <head>
    <!-- important tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../photo/favicon-16x16.png" sizes="16x16" />
      <title>E-Prodi Admin Panel</title>

      <!-- bootstrap dan font-awesome css area-->
      <link rel="stylesheet" href="bstrap/css/bootstrap.css" />
      <link rel="stylesheet" href="bstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.css" />
      <link rel="stylesheet" href="dist/js/datatables/datatables.css"/>
      <link rel="stylesheet" href="dist/css/magnific-popup.css" />


      <!-- custom css untuk admin panel -->
      <link rel="stylesheet" href="dist/css/admin-css.css" />
      <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption" rel="stylesheet">
  </head>
  <body>
      <!-- bagian navbar -->
        <?php include "core/navbar.php" ?>

      <!-- bagian sidebar -->
      <div class="container-fluid">
        <div class="row">
          <?php include "core/sidebar.php" ?>

      <!--bagian content -->
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="main">
        <?php include "core/content.php";?>
      </div>
    </div>
  </div>


    <!-- Javascript -->
    <!-- Javascript main file -->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/JQueryValidation/jquery.validate.js"></script>
    <script src="dist/js/JQueryValidation/additional-methods.js"></script>
    <script src="bstrap/js/bootstrap.js"></script>
    <script src="dist/js/datatables/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

    <!--external javascript files -->
    <script src="dist/js/sidebartoggle.js"></script>
    <script src="dist/js/table.js"></script>
    <script src="dist/js/validation.js"></script>
    <script src="dist/js/hps_konf.js"></script>
    <script src="dist/js/skripsi_dropdown.js"></script>
    <script src="dist/js/kkp_dropdown.js"></script>
    <script src="dist/js/seminar_dropdown.js"></script>
    <script src="dist/js/konf_dropdown.js"></script>
    <script src="dist/js/mhs_dropdown.js"></script>
    <script src="dist/js/prop_dropdown.js"></script>
    <script src="dist/js/jquery.magnific-popup.js"></script>
    <script>
      $(document).ready(function(){
      $('.image-link').magnificPopup({type:'image'});
        });
    </script>

    <script>
    function ubahprop(obj){
        var value=obj.value;
        if(value=="boleh"){
         $("#takboleh").css('display','none');
         $("#alasan_takboleh").css('display','none');
       }
       else if(value=="ga"){
         $("#takboleh").css('display','block');
         $("#alasan_takboleh").css('display','block');
       }
    }
    </script>
    <script>
    function sar(obj){
        var value=obj.value;
        if(value=="yak"){
         $("#doslbl").css('display','block');
         $("#dosub").css('display','block');
         $("#dosen_ubah").css('display','block');
         $("#ub").css('display','block');
         $("#syarat").css('display','none');
         $("#sarat").css('display','none');
       }
       else if(value=="nope"){
         $("#doslbl").css('display','none');
         $("#dosub").css('display','none');
         $("#ub").css('display','none');
         $("#dosen_ubah").css('display','none');
         $("#syarat").css('display','block');
         $("#sarat").css('display','block');
       }
    }
    </script>

    <script>
    function cekdos(obj){
        var value=obj.value;
        if(value=="ubah"){
          $('#lblbing1').css('display','block');
          $('#bing1').css('display','block');
          $('#lblbing2').css('display','block');
          $('#bing2').css('display','block');
          $('#dosalas').css('display','block');
          $('#ubahdosalas').css('display','block');
        }else if(value=="gausah"){
          $('#lblbing1').css('display','none');
          $('#bing1').css('display','none');
          $('#lblbing2').css('display','none');
          $('#bing2').css('display','none');
          $('#dosalas').css('display','none');
          $('#ubahdosalas').css('display','none');
        }else{
            $('#lblbing1').css('display','none');
            $('#bing1').css('display','none');
            $('#lblbing2').css('display','none');
            $('#bing2').css('display','none');
            $('#dosalas').css('display','none');
            $('#ubahdosalas').css('display','none');
        }
      }
    </script>
  </body>
</html>
