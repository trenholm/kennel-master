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
        <!--Upcoming Alerts-->
        <div class="span4">
        <?php include('dashboard-alerts.php'); ?>
        </div>
        <div class="span8">
          <!--Quick Actions-->
          <h4>Quick Actions</h4>
          <div class="row-fluid">
            <div class="span12">
              <div class="row-fluid">
                <div class="span6 quick">
                  <button class="btn btn-block btn-success quick-link">add new dog</button>
                </div>
                <div class="span6 quick">
                  <button class="btn btn-block btn-info quick-link">add new alert</button>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span6 quick">
                  <button class="btn btn-block btn-primary quick-link">add new litter</button>
                </div>
                <div class="span6 quick">
                  <button class="btn btn-block btn-warning quick-link">view pedigree</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
  </body>
</html> 
