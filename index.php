<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kennel Master</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">Kennel Master</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Dogs</a></li>
              <li><a href="#">Lineage</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <h1>Dogs:</h1>
      <?php include('m_dogs.php'); ?>

      <h1>Breeds:</h1>
      <?php include('m_breeds.php'); ?>
    </div>
  </body>
</html> 
