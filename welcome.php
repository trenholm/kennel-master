<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('requiredMETA.php'); ?>
    <?php include('requiredCSS.php'); ?>
  </head>

  <body>
    <?php 
      // MAYBE IF LOGGED IN< REDIRECT TO THE DASHBOARD?!
    ?>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#">Kennel Master</a>
    </div>
  </div>
</div>
    <!--Content-->
    <div class="container-fluid">

      <!--Welcome Banner-->
      <div class="row-fluid">
        <h1>Large banner??</h1>
      </div>
      
      <!--Log-in Section-->
      <div class="row-fluid" id="sign-in-section" name="sign-in-section">
       <div class="modal-header">
          <h3>Sign In or Register</h3>
        </div>
        <form class="form-horizontal" id="signInForm" name="signInForm" action="signin.php" method="post">
          <div class="control-group">
            <label class="control-label" for="inputUsername">Username</label>
            <div class="controls">
              <input type="text" id="inputUsername" name="inputUsername" placeholder="Username">
            </div>
          </div>
          <div class="control-group" name="inputPasswordField">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="control-group" name="inputPasswordField">
            <label class="control-label" for="inputConfirmPassword">Confirm Password</label>
            <div class="controls">
              <input type="password" id="inputConfirmPassword" placeholder="Confirm Password" onKeyPress="return submitForm(event)">
            </div>
          </div>
          <div class="control-group" name="inputEmailField">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input type="email" id="inputEmail" placeholder="Email">
            </div>
          </div>
          <div class="control-group" name="inputCreditCardField">
            <label class="control-label" for="inputCreditCard">Credit Card</label>
            <div class="controls">
              <input type="password" id="inputCreditCard" placeholder="Password">
            </div>
          </div>
          <div class="control-group" name="inputAddressField">
            <label class="control-label" for="inputAddress">Address</label>
            <div class="controls">
              <input type="text" id="inputAddress" placeholder="Address">
            </div>
          </div>
          <hr />
          <div class="control-group" id="inputKennelNameField" name="inputKennelNameField">
            <label class="control-label" for="inputKennelName">Kennel Name</label>
            <div class="controls">
              <input type="text" id="inputKennelName" placeholder="Kennel Name">
            </div>
          </div>
          <div class="control-group" id="inputBreedsField" name="inputBreedsField">
            <label class="control-label" for="inputBreeds">Breeds</label>
            <div class="controls">
              <input type="text" id="inputBreeds" placeholder="DROPDOWN LIST">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-success" id="main" name="main">Sign in</button>
              <button type="button" class="btn" id="cancel" name="cancel">Cancel</button>
            </div>
          </div>
        </form>
        <hr />
        <h3>Need an account?</h3>
        <button class="btn btn-primary" onClick="toggleRegistrationOptions()">Register now!</button>
     
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
    <script src="js/signin.js"></script>
  </body>
</html> 
