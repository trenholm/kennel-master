<div class="container span9" id="addDogPanel" name="addDogPanel" style="display:none;">
  <div class="row-fluid">
    <form class="form-horizontal" id="addDog" name="addDog" action="db/addDog.php" method="post">
      <div class="control-group">
        <div class="controls">
          <h3 class="span12 pull-left">Add New Dog</h3>
        </div>
      </div>
      <div class="control-group" id="inputRegistrationField" name="inputRegistrationField">
        <label class="control-label" for="inputRegistration">Registration Number</label>
        <div class="controls">
          <input type="text" id="inputRegistration" name="inputRegistration" placeholder="Registration Number">
        </div>
      </div>
      <div class="control-group" id="inputNameField" name="inputNameField">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
          <input type="text" id="inputName" name="inputName" placeholder="Name">
        </div>
      </div>
      <div class="control-group" id="inputCallnameField" name="inputCallnameField">
        <label class="control-label" for="inputCallname">Callname</label>
        <div class="controls">
          <input type="text" id="inputCallname" name="inputCallname" placeholder="Callname">
        </div>
      </div>
      <div class="control-group" id="inputGenderField" name="inputGenderField">
        <label class="control-label" for="inputGender">Gender</label>
        <div class="controls">
          <input type="text" id="inputGender" name="inputGender" placeholder="Gender">
        </div>
      </div>
      <div class="control-group" id="inputSireField" name="inputSireField">
        <label class="control-label" for="inputSire">Sire</label>
        <div class="controls">
          <input type="text" id="inputSire" name="inputSire" placeholder="Sire">
        </div>
      </div>
      <div class="control-group" id="inputDameField" name="inputDameField">
        <label class="control-label" for="inputDame">Dame</label>
        <div class="controls">
          <input type="text" id="inputDame" name="inputDame" placeholder="Dame">
        </div>
      </div>
      <div class="control-group" id="inputDateOfBirthField" name="inputDateOfBirthField">
        <label class="control-label" for="inputDateOfBirth">Date of Birth</label>
        <div class="controls">
          <input type="date" id="inputDateOfBirth" name="inputDateOfBirth" placeholder="Date of Birth">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-success">Add dog</button>
          <button type="button" class="btn btn-danger" id="cancelBtn" name="cancelBtn" onClick="hideDogPanel();">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>