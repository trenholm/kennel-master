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

    <!--Content-->
    <div class="container-fluid">

      <!--Dashboard-->
      <div class="row-fluid dashboard">
        <!--Quick Actions-->
        <div class="span3">
        <?php include('quick-links.php'); ?>
        </div>
        <!--Upcoming Alerts-->
        <div class="span9">
        <?php include('dashboard-alerts.php'); ?>
        </div>
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
  </body>
</html> 
