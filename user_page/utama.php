<!DOCTYPE html>

<html>
<head>
  <!-- important tag -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa | E-Prodi Sistem Informasi</title>

    <!-- bootstrap dan font-awesome css area-->
    <link rel="stylesheet" href="bstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="bstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="dist/js/datatables/datatables.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



    <!-- custom css untuk admin panel -->
    <link rel="stylesheet" href="dist/css/style.css" />
    <link rel="stylesheet" href="dist/timeline-css/css/timeline.css" />
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
</head>
<body>
    <!-- bagian navbar -->
      <?php include "core/navbar.php" ?>
    <!-- bagian sidebar -->
      <div class="container">
        <div class="col-md-12" id="main">
          <?php include "core/content.php";?>
      </div>
    </div>
    </div>
  </div>
</div>




  <!-- Javascript -->
  <!-- Javascript main file -->
  <script src="dist/js/jquery.min.js"></script>
  <script src="bstrap/js/bootstrap.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="dist/js/JQueryValidation/jquery.validate.js"></script>
<script src="dist/js/JQueryValidation/additional-methods.js"></script>
  <script src="dist/js/datatables/datatables.js"></script>

  <script src="dist/js/table.js"></script>
  <script src="dist/js/dtpicker.js"></script>
  <script src="dist/js/validation.js"></script>

  <script>$(document).ready(function(){
    $('#table-data').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"

      },
      "order": []

    });

  });
</script>
</body>
</html>
