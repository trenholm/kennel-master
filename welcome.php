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
      <div class="container-fluid">
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
        <div class="">
          <h3>Sign In or Register</h3>
        </div>
        <form class="form-horizontal" id="signInForm" name="signInForm" action="signin.php" method="post">
          <div class="control-group" id="inputUsernameField" name="inputUsernameField">
            <label class="control-label" for="inputUsername">Username</label>
            <div class="controls">
              <input type="text" id="inputUsername" name="inputUsername" placeholder="Username">
            </div>
          </div>
          <div class="control-group" id="inputPasswordField" name="inputPasswordField">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" onKeyPress="return submitForm(event)">
            </div>
          </div>
          <div class="control-group" id="inputConfirmPasswordField" name="inputConfirmPasswordField" style="display: none;">
            <label class="control-label" for="inputConfirmPassword">Confirm Password</label>
            <div class="controls">
              <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
            </div>
          </div>
          <div class="control-group" id="inputEmailField" name="inputEmailField" style="display: none;">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input type="email" id="inputEmail" name="inputEmail" placeholder="Email">
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
              <select class="chzn-select chz-default" multiple="multiple" type="text" id="inputBreeds[]" name="inputBreeds[]" data-placeholder="Dog Breeds">
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
              <button type="button" class="btn" id="cancelBtn" name="cancelBtn" onClick="resetForm();">Cancel</button>
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
