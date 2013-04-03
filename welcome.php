<?php
session_start();

// If the user is already logged in, ALWAYS redirect to the index page
if ( isset($_SESSION['username']) ) {
  header("Cache-Control: no-cache");
  header('Location: index.php', true, 302);
}

// Check if the user attempted to sign in but had an error
if ( isset($_SESSION['error']) ) {
  // Rereieve message
  $message = $_SESSION['error']['message'];
  $username = $_SESSION['error']['username'];
  // Build error message notification
  $errorMsg = '<div class="alert alert-error" id="notification" name="notification">' . 
        '<button type="button" class="close" data-dismiss="alert">x</button>' . 
        '<strong>Warning</strong> ' . $message . '</div>';

  unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('requiredMETA.php'); ?>
    <?php include('requiredCSS.php'); ?>
  </head>

  <body>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">Kennel Master</a>
        </div>
      </div>
    </div>

    <!--Content-->
    <div class="container-fluid">

      <!--Welcome Banner-->
      <div class="row-fluid">
        <h1 style="background:#C3FDB8;">Large banner??</h1>
      </div>

      <!--Notification Message-->
      <?php echo $errorMsg; ?>

      <!--Log-in Section-->
      <div class="row-fluid" id="sign-in-section" name="sign-in-section">
        <div class="">
          <h3>Sign In or Register</h3>
        </div>
        <form class="form-horizontal" id="signInForm" name="signInForm" action="signin.php" method="post">
          <div class="control-group" id="inputUsernameField" name="inputUsernameField">
            <label class="control-label" for="inputUsername">Username</label>
            <div class="controls">
              <?php 
              if ( $username ) {
                echo '<input type="text" id="inputUsername" name="inputUsername" placeholder="Username" value="'. $username .'">';
              } 
              else {
                echo '<input type="text" id="inputUsername" name="inputUsername" placeholder="Username">';
              }
              ?>
              
              <span class="label label-important help-inline" style="display: none;">required</span>
            </div>
          </div>
          <div class="control-group" id="inputPasswordField" name="inputPasswordField">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" onKeyPress="return submitForm(event)">
              <span class="label label-important help-inline" style="display: none;">required</span>
            </div>
          </div>
          <div class="control-group" id="inputConfirmPasswordField" name="inputConfirmPasswordField" style="display: none;">
            <label class="control-label" for="inputConfirmPassword">Confirm Password</label>
            <div class="controls">
              <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
              <span class="label label-important help-inline" style="display: none;">required</span>
            </div>
          </div>
          <div class="control-group" id="inputEmailField" name="inputEmailField" style="display: none;">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input type="email" id="inputEmail" name="inputEmail" placeholder="Email">
              <span class="label label-important help-inline" style="display: none;">required</span>
            </div>
          </div>
          <div class="control-group" id="inputCreditCardField" name="inputCreditCardField" style="display: none;">
            <label class="control-label" for="inputCreditCard">Credit Card</label>
            <div class="controls">
              <input type="password" id="inputCreditCard" name="inputCreditCard" placeholder="Password">
            </div>
          </div>
          <div class="control-group" id="inputKennelNameField" name="inputKennelNameField" style="display: none;">
            <label class="control-label" for="inputKennelName">Kennel Name</label>
            <div class="controls">
              <input type="text" id="inputKennelName" name="inputKennelName"placeholder="Kennel Name">
            </div>
          </div>
          <div class="control-group" id="inputAddressField" name="inputAddressField" style="display: none;">
            <label class="control-label" for="inputAddress">Address</label>
            <div class="controls">
              <input type="text" id="inputAddress" name="inputAddress" placeholder="Address">
            </div>
          </div>
          <div class="control-group" id="inputBreedsField" name="inputBreedsField" style="display: none;">
            <label class="control-label" for="inputBreeds">Breeds</label>
            <div class="controls">
              <select class="chzn-select" multiple="multiple" type="text" id="inputBreeds[]" name="inputBreeds[]" data-placeholder="Dog Breeds">
                <?php 
                // Retrieve the list from the database and build the option list
                include('db/getBreeds.php');
                
                echo '<option value=""></option>\n';
                foreach ($breeds as $document) {
                        echo '<option value="' . $document['name'] . '">' . $document['name'] . '</option>\n';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-success" id="mainBtn" name="mainBtn">Sign in</button>
              <button type="reset" class="btn" id="cancelBtn" name="cancelBtn" onClick="resetForm();">Cancel</button>
            </div>
          </div>
        </form>
        <div id="registerNowSection" name="registerNowSection">
          <hr />
          <h4>Need an account?</h4>
          <button class="btn btn-primary offset1" id="registerBtn" name="registerBtn" onClick="toggleRegistrationOptions()">Register now!</button>
        </div>
      </div>

      <!--Footer-->
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('requiredJS.php'); ?>
    <script src="js/signin.js"></script>
  </body>
</html> 
