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

      <div class="row-fluid">
        <!--Quick Actions-->
        <div class="span2">
          <?php include('quick-links.php'); ?>
        </div>
        
        <!--Content-->
        <div class="span10">
	        <?php include('dog-list.php'); ?>
        </div>
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
    <script src="js/details.js"></script>
  </body>
</html> 
