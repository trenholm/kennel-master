<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6" id="info-section" name="info-section">
      <h3 id="kennel-info" name="kennel-info">Kennel Information</h3>
      <table class="table table-striped" id="kennel-section" name="kennel-section">
        <tbody>
          <tr>
            <th>Kennel Name:</th>
            <td id="kennelName" name="kennelName"></td>
          </tr>
          <tr>
            <th>Address:</th>
            <td id="address" name="address"></td>
          </tr>
          <tr>
            <th>Breeds:</th>
            <td id="breeds" name="breeds">
            </td>
          </tr>
        </tbody>
      </table>
      <h3 id="account-info" name="account-info">Account Information</h3>
      <table class="table table-striped" id="account-section" name="account-section">
        <tbody>
          <tr>
            <th>Username:</th>
            <td id="username" name="username"></td>
          </tr>
          <tr>
            <th>Email:</th>
            <td id="email" name="email"></td>
          </tr>
          <tr>
            <th>Credit Card:</th>
            <td id="creditcard" name="creditcard"></td>
          </tr>
          <tr>
            <th>Password:</th>
            <td id="password" name="password"></td>
          </tr>
          <tr>
            <th>Confirm Password:</th>
            <td id="dateOfBirth" name="dateOfBirth"></td>
          </tr>
        </tbody>
      </table>

      <div class="control-group">
        <div class="controls">
          <button class="btn btn-info" id="btn-edit" name="btn-edit"><i class="icon-edit"></i> Edit Account</button>
          <button class="btn btn-warning" id="btn-cancel" name="btn-cancel" style="display:none;"><i class="icon-remove"></i> Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <form id="update-account" name="update-account" class="form-horizontal" action="db/updateAccount.php" method="post"  enctype="multipart/form-data">
      <div class="control-group">
        <div class="controls">
          <h3 class="span12 pull-left">Kennel Information</h3>
        </div>
      </div>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>
              <div class="control-group" id="inputKennelNameField" name="inputKennelNameField">
                <label class="control-label" for="inputKennelName"><strong>Kennel Name</strong></label>
                <div class="controls">
                  <input type="text" id="inputKennelName" name="inputKennelName"placeholder="Kennel Name">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="control-group" id="inputAddressField" name="inputAddressField">
                <label class="control-label" for="inputAddress"><strong>Address</strong></label>
                <div class="controls">
                  <input type="text" id="inputAddress" name="inputAddress" placeholder="Address">
                </div>
              </div>
            </td>
          </tr>
          <tr>
              <td>
              <div class="control-group" id="inputBreedsField" name="inputBreedsField">
                <label class="control-label" for="inputBreeds"><strong>Breeds</strong></label>
                <div class="controls">
                  <select class="chzn-select" multiple="multiple" type="text" id="inputBreeds[]" name="inputBreeds[]" data-placeholder="Dog Breeds">
                  </select>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="control-group">
        <div class="controls">
          <h3 class="span12 pull-left">Account Information</h3>
        </div>
      </div>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>
              <div class="control-group" id="inputUsernameField" name="inputUsernameField">
                <label class="control-label" for="inputUsername"><strong>Username</strong></label>
                <div class="controls">
                  <input type="text" id="inputUsername" name="inputUsername" placeholder="Username">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="control-group" id="inputEmailField" name="inputEmailField">
                <label class="control-label" for="inputEmail"><strong>Email</strong></label>
                <div class="controls">
                  <input type="email" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="control-group" id="inputCreditCardField" name="inputCreditCardField">
                <label class="control-label" for="inputCreditCard"><strong>Credit Card</strong></label>
                <div class="controls">
                  <input type="password" id="inputCreditCard" name="inputCreditCard" placeholder="Credit Card">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="control-group" id="inputPasswordField" name="inputPasswordField">
                <label class="control-label" for="inputPassword"><strong>Password</strong></label>
                <div class="controls">
                  <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" onKeyPress="return submitForm(event)">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="control-group" id="inputConfirmPasswordField" name="inputConfirmPasswordField">
                <label class="control-label" for="inputConfirmPassword"><strong>Confirm Password</strong></label>
                <div class="controls">
                  <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="control-group">
        <div class="controls">
          <button form="update-account" type="submit" class="btn btn-success">Edit account</button>
          <button form="update-account" type="reset" class="btn" style="display: none;">Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>