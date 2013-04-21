<?php include('security.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('requiredMETA.php'); ?>
    <?php include('requiredCSS.php'); ?>
  </head>

  <body>
    <!--Navigation-->
    <?php include('navigation.php'); ?>

    <!--Container-->
    <div class="container-fluid">

      <div class="row-fluid">
        <!--Quick Actions-->
        <div class="span2">
          <?php include('quick-links.php'); ?>
        </div>
        <!--Content-->
        <div class="span10">
          <span class="label">Alpha Centauri <i class="icon-plus"></i></span>

          <span class="label">Alpha Centauri <i class="icon-plus-sign"></i></span>

          <span class="label">Alpha Centauri <i class="icon-minus"></i></span>

          <span class="label">Alpha Centauri <i class="icon-minus-sign"></i></span>

        </div>
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
  </body>
</html> 
