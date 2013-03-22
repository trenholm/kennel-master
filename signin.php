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
        <div class="modal-header">
          <h3>Sign In or Register</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputUsername">Username</label>
              <div class="controls">
                <input type="text" id="inputUsername" placeholder="Username">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-success">Sign in</button>
                <button type="submit" class="btn btn-primary">Register now!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
  </body>
</html> 
