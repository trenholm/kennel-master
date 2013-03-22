<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('requiredMETA.php'); ?>
    <?php include('requiredCSS.php'); ?>
  </head>

  <body>
    <!--Navigation-->
    <?php include('navigation.php'); ?>

    <?php 
      // MAYBE IF LOGGED IN< REDIRECT TO THE DASHBOARD?!
    ?>

    <!--Content-->
    <div class="container-fluid">

      <!--Welcome Banner-->
      <div class="row-fluid">
        <h1>Large welcome banner??</h1>
      </div>
      
      <!--Log-in Section-->
      <div class="row-fluid">
        <div class="modal-header">
          <h3>Sign In or Register</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" name="signInForm" action="signin.php" method="post">
            <div class="control-group">
              <label class="control-label" for="inputUsername">Username</label>
              <div class="controls">
                <input type="text" id="inputUsername" name="inputUsername" placeholder="Username">
              </div>
            </div>
            <div class="control-group" name="inputPasswordField">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password" onKeyPress="return submitForm(event)">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-success">Sign in</button>
                <button type="button" class="btn btn-primary">Register now!</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
    <script src="js/signin.js"></script>
  </body>
</html> 
